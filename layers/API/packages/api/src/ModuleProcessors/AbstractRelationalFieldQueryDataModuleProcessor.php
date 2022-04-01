<?php

declare(strict_types=1);

namespace PoPAPI\API\ModuleProcessors;

use PoP\ComponentModel\App;
use PoP\ComponentModel\GraphQLEngine\Model\ComponentModelSpec\ConditionalLeafModuleField;
use PoP\ComponentModel\GraphQLEngine\Model\ComponentModelSpec\ConditionalRelationalModuleField;
use PoP\ComponentModel\GraphQLEngine\Model\ComponentModelSpec\LeafModuleField;
use PoP\ComponentModel\GraphQLEngine\Model\ComponentModelSpec\RelationalModuleField;
use PoP\ComponentModel\GraphQLEngine\Model\FieldFragmentModelsTuple;
use PoP\ComponentModel\ModuleProcessors\AbstractQueryDataModuleProcessor;
use PoP\GraphQLParser\ExtendedSpec\Execution\ExecutableDocument;
use PoP\GraphQLParser\Spec\Parser\Ast\Argument;
use PoP\GraphQLParser\Spec\Parser\Ast\ArgumentValue\Literal;
use PoP\GraphQLParser\Spec\Parser\Ast\FieldInterface;
use PoP\GraphQLParser\Spec\Parser\Ast\Fragment;
use PoP\GraphQLParser\Spec\Parser\Ast\FragmentReference;
use PoP\GraphQLParser\Spec\Parser\Ast\InlineFragment;
use PoP\GraphQLParser\Spec\Parser\Ast\LeafField;
use PoP\GraphQLParser\Spec\Parser\Ast\RelationalField;
use PoP\GraphQLParser\StaticHelpers\LocationHelper;

abstract class AbstractRelationalFieldQueryDataModuleProcessor extends AbstractQueryDataModuleProcessor
{
    protected const MODULE_ATTS_FIELD_IDS = 'fieldIDs';
    protected const MODULE_ATTS_IGNORE_CONDITIONAL_FIELDS = 'ignoreConditionalFields';

    /**
     * @return FieldFragmentModelsTuple[]
     */
    protected function getFieldFragmentModelsTuples(?array $moduleAtts): array
    {
        if ($moduleAtts === null) {
            /**
             * There are not virtual module atts when loading the module
             * the first time (i.e. for the fields at the root level).
             */
            $executableDocument = App::getState('executable-document-ast');
            
            // Make sure the GraphQL query exists and was parsed properly into an AST
            if ($executableDocument === null) {
                return [];
            }
            /** @var ExecutableDocument $executableDocument */

            /**
             * Because moduleAtts are serialized/unserialized,
             * cannot pass the Field object directly in them.
             *
             * Instead, first generate a dictionary with all the Fields
             * in the GraphQL query, and place them under a unique ID.
             * Then this "fieldID" will be passed in the moduleAtts
             */
            $this->maybeStoreAstFieldFragmentModelsTuplesInAppState($executableDocument);

            /**
             * Return the root level Fields
             */
            return $this->getFieldFragmentModelsTuplesFromExecutableDocument($executableDocument, false);
        }

        /**
         * When the virtual module has atts, the field IDs are coded within.
         */
        return $this->retrieveAstFieldFragmentModelsTuplesFromAppState($moduleAtts[self::MODULE_ATTS_FIELD_IDS]);
    }

    /**
     * Retrieve the Fields stored in the AppState from the passed "fieldIDs".
     *
     * @param string[] $fieldIDs
     * @return FieldFragmentModelsTuple[]
     */
    protected function retrieveAstFieldFragmentModelsTuplesFromAppState(array $fieldIDs): array
    {
        $appStateFieldFragmentModelsTuples = App::getState('executable-document-ast-field-fragmentmodels-tuples');
        $query = App::getState('query');
        $fieldFragmentModelsTuples = [];
        foreach ($fieldIDs as $fieldID) {
            $fieldFragmentModelsTuples[] = $appStateFieldFragmentModelsTuples[$query][$fieldID];
        }
        return $fieldFragmentModelsTuples;
    }

    /**
     * Generate a dictionary with all the Fields
     * in the GraphQL query, placed under their unique ID,
     * and set it in the AppState
     */
    protected function maybeStoreAstFieldFragmentModelsTuplesInAppState(
        ExecutableDocument $executableDocument,
    ): void {
        // Only do it the first time the query is parsed
        $appStateManager = App::getAppStateManager();
        $appStateFieldFragmentModelsTuples = [];
        if ($appStateManager->has('executable-document-ast-field-fragmentmodels-tuples')) {
            $appStateFieldFragmentModelsTuples = $appStateManager->get('executable-document-ast-field-fragmentmodels-tuples');
        }
        $query = App::getState('query');
        if (isset($appStateFieldFragmentModelsTuples[$query])) {
            return;
        }
        
        $fieldFragmentModelsTuples = $this->getFieldFragmentModelsTuplesFromExecutableDocument($executableDocument, true);
        $appStateFieldFragmentModelsTuples[$query] = [];
        foreach ($fieldFragmentModelsTuples as $fieldFragmentModelsTuple) {
            $appStateFieldFragmentModelsTuples[$query][$this->getFieldUniqueID($fieldFragmentModelsTuple->getField())] = $fieldFragmentModelsTuple;
        }
        $appStateManager->override('executable-document-ast-field-fragmentmodels-tuples', $appStateFieldFragmentModelsTuples);
    }

    /**
     * @return FieldFragmentModelsTuple[]
     */
    protected function getFieldFragmentModelsTuplesFromExecutableDocument(
        ExecutableDocument $executableDocument,
        bool $recursive,
    ): array {
        $fragments = $executableDocument->getDocument()->getFragments();
        $fieldFragmentModelsTuples = [];
        foreach ($executableDocument->getRequestedOperations() as $operation) {
            $fieldFragmentModelsTuples = array_merge(
                $fieldFragmentModelsTuples,
                $this->getAllFieldFragmentModelsTuplesFromFieldsOrFragmentBonds(
                    $operation->getFieldsOrFragmentBonds(),
                    $fragments,
                    $recursive
                )
            );
        }
        return $fieldFragmentModelsTuples;
    }

    /**
     * ID to uniquely identify the AST element
     */
    protected function getFieldUniqueID(FieldInterface $field): string
    {
        return sprintf(
            '%s([%s,%s])',
            $field->getAlias() ?? $field->getName(),
            $field->getLocation()->getLine(),
            $field->getLocation()->getColumn()
        );
    }

    /**
     * @return LeafModuleField[]
     */
    public function getDataFields(array $module, array &$props): array
    {
        $moduleAtts = $module[2] ?? null;
        $leafFieldFragmentModelsTuples = $this->getLeafFieldFragmentModelsTuples($moduleAtts);
        
        if ($this->ignoreConditionalFields($moduleAtts)) {
            /**
             * Only retrieve fields not contained within fragments
             * (those will be handled via a conditional on the fragment model)
             */
            $leafFieldFragmentModelsTuples = array_filter(
                $leafFieldFragmentModelsTuples,
                fn (FieldFragmentModelsTuple $fieldFragmentModelsTuple) => $fieldFragmentModelsTuple->getFragmentModels() === []
            );
        }
        
        /** @var LeafField[] */
        $leafFields = array_map(
            fn (FieldFragmentModelsTuple $fieldFragmentModelsTuple) => $fieldFragmentModelsTuple->getField(),
            $leafFieldFragmentModelsTuples
        );
        
        return array_map(
            fn (LeafField $leafField) => LeafModuleField::fromLeafField($leafField),
            $leafFields
        );
    }

    /**
     * Flag used to process the conditional field from the module or not
     */
    public function ignoreConditionalFields(?array $moduleAtts): bool
    {
        return $moduleAtts === null ? true : $moduleAtts[self::MODULE_ATTS_IGNORE_CONDITIONAL_FIELDS] ?? true;
    }

    /**
     * @return FieldFragmentModelsTuple[]
     */
    protected function getLeafFieldFragmentModelsTuples(?array $moduleAtts): array
    {
        $fieldFragmentModelsTuples = $this->getFieldFragmentModelsTuples($moduleAtts);
        return array_filter(
            $fieldFragmentModelsTuples,
            fn (FieldFragmentModelsTuple $fieldFragmentModelsTuple) => $fieldFragmentModelsTuple->getField() instanceof LeafField
        );
    }

    /**
     * @return RelationalModuleField[]
     */
    public function getDomainSwitchingSubmodules(array $module): array
    {
        $moduleAtts = $module[2] ?? null;
        $relationalFieldFragmentModelsTuples = $this->getRelationalFieldFragmentModelsTuples($moduleAtts);
        
        if ($this->ignoreConditionalFields($moduleAtts)) {
            /**
             * Only retrieve fields not contained within fragments
             * (those will be handled via a conditional on the fragment model)
             */
            $relationalFieldFragmentModelsTuples = array_filter(
                $relationalFieldFragmentModelsTuples,
                fn (FieldFragmentModelsTuple $fieldFragmentModelsTuple) => $fieldFragmentModelsTuple->getFragmentModels() === []
            );
        }
        
        /** @var RelationalField[] */
        $relationalFields = array_map(
            fn (FieldFragmentModelsTuple $fieldFragmentModelsTuple) => $fieldFragmentModelsTuple->getField(),
            $relationalFieldFragmentModelsTuples
        );
        
        $executableDocument = App::getState('executable-document-ast');
        if ($executableDocument === null) {
            return [];
        }

        /** @var ExecutableDocument $executableDocument */
        $fragments = $executableDocument->getDocument()->getFragments();
        $ret = [];

        /**
         * Create a "virtual" module with the fields
         * corresponding to the next level module.
         */
        foreach ($relationalFields as $relationalField) {
            $allFieldFragmentModelsFromFieldsOrFragmentBonds = $this->getAllFieldFragmentModelsTuplesFromFieldsOrFragmentBonds(
                $relationalField->getFieldsOrFragmentBonds(),
                $fragments,
                false
            );
            $nestedFields = array_map(
                fn (FieldFragmentModelsTuple $fieldFragmentModelsTuple) => $fieldFragmentModelsTuple->getField(),
                $allFieldFragmentModelsFromFieldsOrFragmentBonds
            );
            $nestedFieldIDs = array_map(
                [$this, 'getFieldUniqueID'],
                $nestedFields
            );
            $nestedModule = [$module[0], $module[1], [self::MODULE_ATTS_FIELD_IDS => $nestedFieldIDs]];
            $ret[] = RelationalModuleField::fromRelationalField(
                $relationalField,
                [
                    $nestedModule,
                ]
            );
        }
        return $ret;
    }

    /**
     * @return FieldFragmentModelsTuple[]
     */
    protected function getRelationalFieldFragmentModelsTuples(?array $moduleAtts): array
    {
        $fieldFragmentModelsTuples = $this->getFieldFragmentModelsTuples($moduleAtts);
        return array_filter(
            $fieldFragmentModelsTuples,
            fn (FieldFragmentModelsTuple $fieldFragmentModelsTuple) => $fieldFragmentModelsTuple->getField() instanceof RelationalField
        );
    }

    /**
     * @return ConditionalLeafModuleField[]
     */
    public function getConditionalOnDataFieldSubmodules(array $module): array
    {
        $moduleAtts = $module[2] ?? null;
        if (!$this->ignoreConditionalFields($moduleAtts)) {
            return [];
        }

        $leafFieldFragmentModelsTuples = $this->getLeafFieldFragmentModelsTuples($moduleAtts);
        
        /**
         * Only retrieve fields contained within fragments
         */
        $leafFieldFragmentModelsTuples = array_filter(
            $leafFieldFragmentModelsTuples,
            fn (FieldFragmentModelsTuple $fieldFragmentModelsTuple) => $fieldFragmentModelsTuple->getFragmentModels() !== []
        );

        $conditionalLeafModuleFields = [];
        foreach ($leafFieldFragmentModelsTuples as $fieldFragmentModelsTuple) {
            $field = $fieldFragmentModelsTuple->getField();
            $location = $field->getLocation();
            $nestedModule = [
                $module[0],
                $module[1],
                [
                    self::MODULE_ATTS_FIELD_IDS => [$this->getFieldUniqueID($field)],
                    self::MODULE_ATTS_IGNORE_CONDITIONAL_FIELDS => false,
                ]
            ];
            /**
             * Create a new field that will evaluate if the fragment
             * must be applied or not. If applied, only then
             * the field within the fragment will be resolved
             */
            $conditionalLeafModuleFields[] = new ConditionalLeafModuleField(
                'isTypeOrImplements',
                [
                    $nestedModule
                ],
                // Create a unique alias to avoid conflicts
                sprintf(
                    '_isTypeOrImplements_%s_%s_',
                    $location->getLine(),
                    $location->getColumn()
                ),
                [
                    new Argument(
                        'typeOrInterface',
                        new Literal(
                            $fieldFragmentModelsTuple->getFragmentModels()[0],
                            LocationHelper::getNonSpecificLocation()
                        ),
                        LocationHelper::getNonSpecificLocation()
                    ),
                ]
            );
        }
        return $conditionalLeafModuleFields;
    }

    /**
     * @return ConditionalRelationalModuleField[]
     */
    public function getConditionalOnDataFieldDomainSwitchingSubmodules(array $module): array
    {
        return [];
    }

    /**
     * @param FieldInterface[]|FragmentBondInterface[] $fieldsOrFragmentBonds
     * @param Fragment[] $fragments
     * @return FieldFragmentModelsTuple[] A list of the fields and what fragment "models" they need to satisfy to be resolved
     */
    protected function getAllFieldFragmentModelsTuplesFromFieldsOrFragmentBonds(
        array $fieldsOrFragmentBonds,
        array $fragments,
        bool $recursive
    ): array {
        /** @var FieldFragmentModelsTuple[] */
        $fieldFragmentModelsTuples = [];
        foreach ($fieldsOrFragmentBonds as $fieldOrFragmentBond) {
            if ($fieldOrFragmentBond instanceof FragmentReference) {
                /** @var FragmentReference */
                $fragmentReference = $fieldOrFragmentBond;
                $fragment = $this->getFragment($fragmentReference->getName(), $fragments);
                if ($fragment === null) {
                    continue;
                }
                $allFieldFragmentModelsFromFieldsOrFragmentBonds = $this->getAllFieldFragmentModelsTuplesFromFieldsOrFragmentBonds(
                    $fragment->getFieldsOrFragmentBonds(),
                    $fragments,
                    false // Fragments: Stop the recursion to avoid adding duplicate items
                );
                foreach ($allFieldFragmentModelsFromFieldsOrFragmentBonds as $fieldFragmentModelsTuple) {
                    $fieldFragmentModelsTuple->addFragmentModel($fragment->getModel());
                }
                $fieldFragmentModelsTuples = array_merge(
                    $fieldFragmentModelsTuples,
                    $allFieldFragmentModelsFromFieldsOrFragmentBonds
                );
                continue;
            }
            if ($fieldOrFragmentBond instanceof InlineFragment) {
                /** @var InlineFragment */
                $inlineFragment = $fieldOrFragmentBond;
                $allFieldFragmentModelsFromFieldsOrFragmentBonds = $this->getAllFieldFragmentModelsTuplesFromFieldsOrFragmentBonds(
                    $inlineFragment->getFieldsOrFragmentBonds(),
                    $fragments,
                    false // Fragments: Stop the recursion to avoid adding duplicate items
                );
                foreach ($allFieldFragmentModelsFromFieldsOrFragmentBonds as $fieldFragmentModelsTuple) {
                    $fieldFragmentModelsTuple->addFragmentModel($inlineFragment->getTypeName());
                }
                $fieldFragmentModelsTuples = array_merge(
                    $fieldFragmentModelsTuples,
                    $allFieldFragmentModelsFromFieldsOrFragmentBonds
                );
                continue;
            }
            /** @var FieldInterface */
            $field = $fieldOrFragmentBond;
            $fieldFragmentModelsTuples[] = new FieldFragmentModelsTuple($field);
        }
        if (!$recursive) {
            return $fieldFragmentModelsTuples;
        }

        /**
         * Recursive: also obtain the fields nested within the fields
         */
        $recursiveFieldFragmentModelsTuples = [];
        foreach ($fieldFragmentModelsTuples as $fieldFragmentModelsTuple) {
            $recursiveFieldFragmentModelsTuples[] = $fieldFragmentModelsTuple;
            if ($fieldFragmentModelsTuple->getField() instanceof LeafField) {
                continue;
            }
            /** @var RelationalField */
            $relationalField = $fieldFragmentModelsTuple->getField();
            $allFieldFragmentModelsTuplesFromFieldsOrFragmentBonds = $this->getAllFieldFragmentModelsTuplesFromFieldsOrFragmentBonds(
                $relationalField->getFieldsOrFragmentBonds(),
                $fragments,
                $recursive
            );
            // Append the fragment models to the relational members under the recursion
            foreach ($allFieldFragmentModelsTuplesFromFieldsOrFragmentBonds as $relationalFieldFragmentModelsTuple) {
                $relationalFieldFragmentModelsTuple->setFragmentModels(
                    array_merge(
                        $fieldFragmentModelsTuple->getFragmentModels(),
                        $relationalFieldFragmentModelsTuple->getFragmentModels()
                    )
                );
            }
            $recursiveFieldFragmentModelsTuples = array_merge(
                $recursiveFieldFragmentModelsTuples,
                $allFieldFragmentModelsTuplesFromFieldsOrFragmentBonds
            );
        }
        return $recursiveFieldFragmentModelsTuples;
    }

    /**
     * @param Fragment[] $fragments
     */
    protected function getFragment(
        string $fragmentName,
        array $fragments,
    ): ?Fragment {
        foreach ($fragments as $fragment) {
            if ($fragment->getName() === $fragmentName) {
                return $fragment;
            }
        }
        return null;
    }
}
