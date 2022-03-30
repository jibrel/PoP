<?php

declare(strict_types=1);

namespace PoP\GraphQLParser\Spec\Parser\Ast;

interface AstInterface
{
    public function asQueryString(): string;
    /**
     * ID to uniquely identify the AST element
     * from all other elements in the GraphQL query.
     *
     * In order to invoke this function,
     * `Document.setAncestorsInAST` must first be invoked.
     */
    public function getID(): string;
}
