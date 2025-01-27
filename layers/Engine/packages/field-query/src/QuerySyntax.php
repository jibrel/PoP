<?php

declare(strict_types=1);

namespace PoP\FieldQuery;

class QuerySyntax
{
    const SYMBOL_OPERATIONS_SEPARATOR = ';';
    const SYMBOL_QUERYFIELDS_SEPARATOR = ',';
    const SYMBOL_FIELDPROPERTIES_SEPARATOR = '|';
    const SYMBOL_RELATIONALFIELDS_NEXTLEVEL = '.';
    const SYMBOL_FIELDARGS_OPENING = '(';
    const SYMBOL_FIELDARGS_CLOSING = ')';
    const SYMBOL_FIELDALIAS_PREFIX = '@';
    const SYMBOL_BOOKMARK_OPENING = '[';
    const SYMBOL_BOOKMARK_CLOSING = ']';
    const SYMBOL_SKIPOUTPUTIFNULL = '?';
    const SYMBOL_FIELDDIRECTIVE_OPENING = '<';
    const SYMBOL_FIELDDIRECTIVE_CLOSING = '>';
    const SYMBOL_FIELDDIRECTIVE_SEPARATOR = ',';
    const SYMBOL_FIELDARGS_ARGSEPARATOR = ',';
    const SYMBOL_FIELDARGS_ARGKEYVALUESEPARATOR = ':';
    const SYMBOL_VARIABLE_PREFIX = '$';
    const SYMBOL_FRAGMENT_PREFIX = '--';
    /**
     * Switched from "%{...}%" to "$__..."
     * @todo Convert expressions from "$__" to "$"
     */
    // const SYMBOL_EXPRESSION_OPENING = '%{';
    // const SYMBOL_EXPRESSION_CLOSING = '}%';
    const SYMBOL_FIELDARGS_ARGVALUESTRING_OPENING = '"';
    const SYMBOL_FIELDARGS_ARGVALUESTRING_CLOSING = '"';
    const SYMBOL_FIELDARGS_ARGVALUEARRAY_OPENING = '[';
    const SYMBOL_FIELDARGS_ARGVALUEARRAY_CLOSING = ']';
    const SYMBOL_FIELDARGS_ARGVALUEARRAY_SEPARATOR = ',';
    const SYMBOL_FIELDARGS_ARGVALUEARRAY_KEYVALUEDELIMITER = ':';
    const SYMBOL_FIELDARGS_ARGVALUEOBJECT_OPENING = '{';
    const SYMBOL_FIELDARGS_ARGVALUEOBJECT_CLOSING = '}';
    const SYMBOL_FIELDARGS_ARGVALUEOBJECT_SEPARATOR = ',';
    const SYMBOL_FIELDARGS_ARGVALUEOBJECT_KEYVALUEDELIMITER = ':';
}
