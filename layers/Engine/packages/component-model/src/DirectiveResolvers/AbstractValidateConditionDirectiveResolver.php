<?php

declare(strict_types=1);

namespace PoP\ComponentModel\DirectiveResolvers;

use PoP\ComponentModel\Feedback\EngineIterationFeedbackStore;
use PoP\ComponentModel\Feedback\FeedbackItemResolution;
use PoP\ComponentModel\Feedback\SchemaFeedback;
use PoP\ComponentModel\Feedback\Tokens;
use PoP\ComponentModel\FeedbackItemProviders\FeedbackItemProvider;
use PoP\ComponentModel\TypeResolvers\PipelinePositions;
use PoP\ComponentModel\TypeResolvers\RelationalTypeResolverInterface;
use PoP\GraphQLParser\StaticHelpers\LocationHelper;

abstract class AbstractValidateConditionDirectiveResolver extends AbstractValidateDirectiveResolver
{
    // /**
    //  * Validations are naturally added through code and not through the query, so no need to expose them in the schema
    //  */
    // public function skipExposingDirectiveInSchema(RelationalTypeResolverInterface $relationalTypeResolver): bool {
    //     return true;
    // }

    /**
     * If validating a directive, place it after resolveAndMerge
     * Otherwise, before
     */
    public function getPipelinePosition(): string
    {
        if ($this->isValidatingDirective()) {
            return PipelinePositions::AFTER_RESOLVE;
        }
        return PipelinePositions::AFTER_VALIDATE_BEFORE_RESOLVE;
    }

    /**
     * Validate a custom condition
     */
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
        if (!$this->validateCondition($relationalTypeResolver)) {
            // All fields failed
            $failedDataFields = array_merge(
                $failedDataFields,
                $dataFields
            );
            foreach ($dataFields as $field) {
                $engineIterationFeedbackStore->schemaFeedbackStore->addError(
                    new SchemaFeedback(
                        $this->getValidationFailedFeedbackItemResolution($relationalTypeResolver, $dataFields),
                        LocationHelper::getNonSpecificLocation(),
                        $relationalTypeResolver,
                        $field,
                        $this->directive,
                    )
                );
            }
        }
    }

    /**
     * Condition to validate. Return `true` for success, `false` for failure
     */
    abstract protected function validateCondition(RelationalTypeResolverInterface $relationalTypeResolver): bool;

    /**
     * Show a different error message depending on if we are validating the whole field, or a directive
     * By default, validate the whole field
     */
    protected function isValidatingDirective(): bool
    {
        return false;
    }

    protected function getValidationFailedFeedbackItemResolution(RelationalTypeResolverInterface $relationalTypeResolver, array $failedDataFields): FeedbackItemResolution
    {
        return new FeedbackItemResolution(
            FeedbackItemProvider::class,
            $this->isValidatingDirective() ? FeedbackItemProvider::E18 : FeedbackItemProvider::E19,
            [
                implode(
                    $this->__('\', \''),
                    $failedDataFields
                ),
            ]
        );
    }
}
