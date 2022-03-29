<?php

declare(strict_types=1);

namespace PoP\ComponentModel\GraphQLModel\ComponentModelSpec\Ast;

use PoP\GraphQLParser\Spec\Parser\Ast\Argument;
use PoP\GraphQLParser\Spec\Parser\Ast\Directive;
use PoP\GraphQLParser\Spec\Parser\Ast\LeafField;
use PoP\GraphQLParser\StaticHelpers\LocationHelper;

class ConditionalRelationalModuleField extends LeafField implements ModuleFieldInterface
{
    /**
     * The condition must be satisfied on the implicit field.
     * When the value of the field is `true`, load the conditional
     * domain switching fields.
     *
     * @param RelationalModuleField[] $conditionalRelationalModuleFields
     * @param Argument[] $arguments
     * @param Directive[] $directives
     */
    public function __construct(
        string $name,
        protected array $conditionalRelationalModuleFields,
        ?string $alias = null,
        array $arguments = [],
        array $directives = [],
    ) {
        parent::__construct(
            $name,
            $alias,
            $arguments,
            $directives,
            LocationHelper::getNonSpecificLocation(),
        );
    }

    /**
     * @return RelationalModuleField[]
     */
    public function getConditionalRelationalModuleFields(): array
    {
        return $this->conditionalRelationalModuleFields;
    }
}