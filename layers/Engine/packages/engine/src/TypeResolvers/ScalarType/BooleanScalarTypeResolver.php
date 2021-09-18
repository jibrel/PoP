<?php

declare(strict_types=1);

namespace PoP\Engine\TypeResolvers\ScalarType;

use CastToType;
use PoP\ComponentModel\TypeResolvers\ScalarType\AbstractScalarTypeResolver;

/**
 * GraphQL Built-in Scalar
 *
 * @see https://spec.graphql.org/draft/#sec-Scalars.Built-in-Scalars
 */
class BooleanScalarTypeResolver extends AbstractScalarTypeResolver
{
    public function getTypeName(): string
    {
        return 'Boolean';
    }

    public function coerceValue(mixed $inputValue): mixed
    {
        if ($error = $this->validateIsNotArrayOrObject($inputValue)) {
            return $error;
        }

        /**
         * Watch out! In Library CastToType, an empty string is not false, but it's NULL
         * But for us it must be false, since calling query ?query=and([true,false]) gets transformed to the $field string "[1,]"
         */
        if ($inputValue === '') {
            return false;
        }

        $castInputValue = CastToType::_bool($inputValue);
        if ($castInputValue === null) {
            return $this->getError($this->getDefaultErrorMessage($inputValue));
        }
        return (bool) $castInputValue;
    }
}