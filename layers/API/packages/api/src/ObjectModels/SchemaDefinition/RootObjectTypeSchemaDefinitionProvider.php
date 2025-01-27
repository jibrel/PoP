<?php

declare(strict_types=1);

namespace PoPAPI\API\ObjectModels\SchemaDefinition;

use PoP\Root\App;
use PoPAPI\API\Component;
use PoPAPI\API\ComponentConfiguration;
use PoPAPI\API\Schema\SchemaDefinition;

/**
 * The RootObject has the special role of also calculating the
 * global fields, connections and directives
 */
class RootObjectTypeSchemaDefinitionProvider extends ObjectTypeSchemaDefinitionProvider
{
    public function getSchemaDefinition(): array
    {
        $schemaDefinition = parent::getSchemaDefinition();

        // The global directives are added always, since those are the "normal" directives in GraphQL
        $globalSchemaDefinition = [];
        $this->addDirectiveSchemaDefinitions($globalSchemaDefinition, true);
        $schemaDefinition[SchemaDefinition::GLOBAL_DIRECTIVES] = $globalSchemaDefinition[SchemaDefinition::DIRECTIVES];

        // Global fields are only added if enabled
        /** @var ComponentConfiguration */
        $componentConfiguration = App::getComponent(Component::class)->getConfiguration();
        if ($componentConfiguration->skipExposingGlobalFieldsInFullSchema()) {
            return $schemaDefinition;
        }
        $this->addFieldSchemaDefinitions($globalSchemaDefinition, true);
        return array_merge(
            $schemaDefinition,
            [
                SchemaDefinition::GLOBAL_FIELDS => $globalSchemaDefinition[SchemaDefinition::FIELDS],
            ]
        );
    }
}
