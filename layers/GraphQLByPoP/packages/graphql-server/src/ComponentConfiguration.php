<?php

declare(strict_types=1);

namespace GraphQLByPoP\GraphQLServer;

use PoP\Root\App;
use PoP\Root\Component\AbstractComponentConfiguration;
use PoPAPI\API\Component as APIComponent;
use PoPAPI\API\ComponentConfiguration as APIComponentConfiguration;
use PoP\Root\Component\EnvironmentValueHelpers;

class ComponentConfiguration extends AbstractComponentConfiguration
{
    public function exposeSelfFieldForRootTypeInGraphQLSchema(): bool
    {
        $envVariable = Environment::EXPOSE_SELF_FIELD_FOR_ROOT_TYPE_IN_GRAPHQL_SCHEMA;
        $defaultValue = false;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function sortGraphQLSchemaAlphabetically(): bool
    {
        $envVariable = Environment::SORT_GRAPHQL_SCHEMA_ALPHABETICALLY;
        $defaultValue = true;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function enableProactiveFeedback(): bool
    {
        $envVariable = Environment::ENABLE_PROACTIVE_FEEDBACK;
        $defaultValue = true;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function enableProactiveFeedbackWarnings(): bool
    {
        $envVariable = Environment::ENABLE_PROACTIVE_FEEDBACK_WARNINGS;
        $defaultValue = true;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function enableProactiveFeedbackDeprecations(): bool
    {
        $envVariable = Environment::ENABLE_PROACTIVE_FEEDBACK_DEPRECATIONS;
        $defaultValue = true;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function enableProactiveFeedbackNotices(): bool
    {
        $envVariable = Environment::ENABLE_PROACTIVE_FEEDBACK_NOTICES;
        $defaultValue = true;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function enableProactiveFeedbackSuggestions(): bool
    {
        $envVariable = Environment::ENABLE_PROACTIVE_FEEDBACK_SUGGESTIONS;
        $defaultValue = true;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function enableProactiveFeedbackLogs(): bool
    {
        $envVariable = Environment::ENABLE_PROACTIVE_FEEDBACK_LOGS;
        $defaultValue = true;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function enableNestedMutations(): bool
    {
        $envVariable = Environment::ENABLE_NESTED_MUTATIONS;
        $defaultValue = false;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function enableGraphQLIntrospection(): ?bool
    {
        if (!Environment::enableEnablingGraphQLIntrospectionByURLParam()) {
            return null;
        }

        $envVariable = Environment::ENABLE_GRAPHQL_INTROSPECTION;
        $defaultValue = null;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function exposeSelfFieldInGraphQLSchema(): bool
    {
        $envVariable = Environment::EXPOSE_SELF_FIELD_IN_GRAPHQL_SCHEMA;
        $defaultValue = false;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function addVersionToGraphQLSchemaFieldDescription(): bool
    {
        $envVariable = Environment::ADD_VERSION_TO_GRAPHQL_SCHEMA_FIELD_DESCRIPTION;
        $defaultValue = false;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function addGraphQLIntrospectionPersistedQuery(): bool
    {
        $envVariable = Environment::ADD_GRAPHQL_INTROSPECTION_PERSISTED_QUERY;
        $defaultValue = false;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function addConnectionFromRootToQueryRootAndMutationRoot(): bool
    {
        $envVariable = Environment::ADD_CONNECTION_FROM_ROOT_TO_QUERYROOT_AND_MUTATIONROOT;
        $defaultValue = false;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function exposeSchemaIntrospectionFieldInSchema(): bool
    {
        $envVariable = Environment::EXPOSE_SCHEMA_INTROSPECTION_FIELD_IN_SCHEMA;
        $defaultValue = false;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }

    public function exposeGlobalFieldsInGraphQLSchema(): bool
    {
        /** @var APIComponentConfiguration */
        $componentConfiguration = App::getComponent(APIComponent::class)->getConfiguration();
        if ($componentConfiguration->skipExposingGlobalFieldsInFullSchema()) {
            return false;
        }

        $envVariable = Environment::EXPOSE_GLOBAL_FIELDS_IN_GRAPHQL_SCHEMA;
        $defaultValue = false;
        $callback = EnvironmentValueHelpers::toBool(...);

        return $this->retrieveConfigurationValueOrUseDefault(
            $envVariable,
            $defaultValue,
            $callback,
        );
    }
}
