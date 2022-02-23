<?php

declare(strict_types=1);

namespace PoP\ComponentModel\DirectiveResolvers;

use PoP\ComponentModel\Container\ServiceTags\MandatoryDirectiveServiceTagInterface;
use PoP\ComponentModel\Directives\DirectiveKinds;
use PoP\ComponentModel\Feedback\EngineIterationFeedbackStore;
use PoP\ComponentModel\Feedback\FeedbackItemResolution;
use PoP\ComponentModel\FeedbackItemProviders\GenericFeedbackItemProvider;
use PoP\ComponentModel\Feedback\SchemaFeedback;
use PoP\ComponentModel\TypeResolvers\ObjectType\ObjectTypeResolverInterface;
use PoP\ComponentModel\TypeResolvers\PipelinePositions;
use PoP\ComponentModel\TypeResolvers\RelationalTypeResolverInterface;
use PoP\ComponentModel\TypeResolvers\UnionType\UnionTypeResolverInterface;
use PoP\GraphQLParser\StaticHelpers\LocationHelper;

final class ValidateDirectiveResolver extends AbstractValidateDirectiveResolver implements MandatoryDirectiveServiceTagInterface
{
    public function getDirectiveName(): string
    {
        return 'validate';
    }

    /**
     * This is a system directive
     */
    public function getDirectiveKind(): string
    {
        return DirectiveKinds::SYSTEM;
    }

    /**
     * Execute only once
     */
    public function isRepeatable(): bool
    {
        return false;
    }

    /**
     * This directive must be the first one of the group at the middle
     */
    public function getPipelinePosition(): string
    {
        return PipelinePositions::AFTER_VALIDATE_BEFORE_RESOLVE;
    }

    protected function validateFields(
        RelationalTypeResolverInterface $relationalTypeResolver,
        array $dataFields,
        array &$variables,
        EngineIterationFeedbackStore $engineIterationFeedbackStore,
        array &$schemaErrors,
        array &$schemaWarnings,
        array &$schemaDeprecations,
        array &$failedDataFields,
    ): void {
        foreach ($dataFields as $field) {
            $success = $this->validateField($relationalTypeResolver, $field, $variables, $engineIterationFeedbackStore);
            if (!$success) {
                $failedDataFields[] = $field;
            }
        }
    }

    protected function validateField(
        RelationalTypeResolverInterface $relationalTypeResolver,
        string $field,
        array &$variables,
        EngineIterationFeedbackStore $engineIterationFeedbackStore,
    ): bool {
        /**
         * Because the UnionTypeResolver doesn't know yet which TypeResolver will be used
         * (that depends on each object), it can't resolve this functionality
         */
        if ($relationalTypeResolver instanceof UnionTypeResolverInterface) {
            return true;
        }

        /** @var ObjectTypeResolverInterface */
        $objectTypeResolver = $relationalTypeResolver;

        // Check for errors first, warnings and deprecations then
        $success = true;
        if ($schemaValidationErrors = $objectTypeResolver->resolveFieldValidationErrorQualifiedEntries($field, $variables)) {
            foreach ($schemaValidationErrors as $errorMessage) {
                $engineIterationFeedbackStore->schemaFeedbackStore->addError(
                    new SchemaFeedback(
                        new FeedbackItemResolution(
                            GenericFeedbackItemProvider::class,
                            GenericFeedbackItemProvider::E1,
                            [
                                $errorMessage,
                            ]
                        ),
                        LocationHelper::getNonSpecificLocation(),
                        $relationalTypeResolver,
                        $field,
                        $this->directive,
                    )
                );
            }
            $success = false;
        }
        if ($schemaValidationWarnings = $objectTypeResolver->resolveFieldValidationWarningQualifiedEntries($field, $variables)) {
            foreach ($schemaValidationWarnings as $warningMessage) {
                $engineIterationFeedbackStore->schemaFeedbackStore->addWarning(
                    new SchemaFeedback(
                        new FeedbackItemResolution(
                            GenericFeedbackItemProvider::class,
                            GenericFeedbackItemProvider::W1,
                            [
                                $warningMessage,
                            ]
                        ),
                        LocationHelper::getNonSpecificLocation(),
                        $relationalTypeResolver,
                        $field,
                        $this->directive,
                    )
                );
            }
        }
        if ($schemaValidationDeprecations = $objectTypeResolver->resolveFieldDeprecationQualifiedEntries($field, $variables)) {
            foreach ($schemaValidationDeprecations as $deprecationMessage) {
                $engineIterationFeedbackStore->schemaFeedbackStore->addDeprecation(
                    new SchemaFeedback(
                        new FeedbackItemResolution(
                            GenericFeedbackItemProvider::class,
                            GenericFeedbackItemProvider::D1,
                            [
                                $deprecationMessage,
                            ]
                        ),
                        LocationHelper::getNonSpecificLocation(),
                        $relationalTypeResolver,
                        $field,
                        $this->directive,
                    )
                );
            }
        }
        return $success;
    }

    public function getDirectiveDescription(RelationalTypeResolverInterface $relationalTypeResolver): ?string
    {
        return $this->__('It validates the field, filtering out those field arguments that raised a warning, or directly invalidating the field if any field argument raised an error. For instance, if a mandatory field argument is not provided, then it is an error and the field is invalidated and removed from the output; if a field argument can\'t be casted to its intended type, then it is a warning, the affected field argument is removed and the field is executed without it. This directive is already included by the engine, since its execution is mandatory', 'component-model');
    }
}
