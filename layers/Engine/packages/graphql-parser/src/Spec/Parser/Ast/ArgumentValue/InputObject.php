<?php

declare(strict_types=1);

namespace PoP\GraphQLParser\Spec\Parser\Ast\ArgumentValue;

use PoP\GraphQLParser\Spec\Parser\Ast\AbstractAst;
use PoP\GraphQLParser\Spec\Parser\Ast\WithAstValueInterface;
use PoP\GraphQLParser\Spec\Parser\Ast\WithValueInterface;
use PoP\GraphQLParser\Spec\Parser\Location;
use stdClass;

class InputObject extends AbstractAst implements WithValueInterface, WithAstValueInterface
{
    public function __construct(
        protected stdClass $object,
        Location $location,
    ) {
        parent::__construct($location);
    }

    /**
     * Transform from Ast to actual value.
     * Eg: replace VariableReferences with their value,
     * nested InputObjects with stdClass, etc
     *
     * @return stdClass
     */
    public function getValue(): mixed
    {
        $object = new stdClass();
        foreach ((array) $this->object as $key => $value) {
            if ($value instanceof WithValueInterface) {
                $object->$key = $value->getValue();
                continue;
            }
            $object->$key = $value;
        }
        return $object;
    }

    /**
     * @param stdClass $value
     */
    public function setValue(mixed $value): void
    {
        $this->object = $value;
    }

    /**
     * @return stdClass
     */
    public function getAstValue(): mixed
    {
        return $this->object;
    }
}