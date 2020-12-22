<?php

declare(strict_types=1);

namespace GraphQLAPI\GraphQLAPI\Blocks\AccessControlRuleBlocks;

use PoPSchema\UserStateAccessControl\ConfigurationEntries\UserStates;
use GraphQLAPI\GraphQLAPI\Blocks\GraphQLByPoPBlockTrait;

/**
 * Access Control Disable Access block
 */
class AccessControlUserStateBlock extends AbstractAccessControlRuleBlock
{
    use GraphQLByPoPBlockTrait;

    protected function getBlockName(): string
    {
        return 'access-control-user-state';
    }

    protected function isDynamicBlock(): bool
    {
        return true;
    }

    /**
     * @param array<string, mixed> $attributes
     */
    public function renderBlock(array $attributes, string $content): string
    {
        $label = isset($attributes[self::ATTRIBUTE_NAME_VALUE]) && $attributes[self::ATTRIBUTE_NAME_VALUE] == UserStates::IN ?
            __('Logged-in users', 'graphql-api') :
            __('Not logged-in users', 'graphql-api');
        return sprintf(
            '<ul class="%s"><li>%s</li></ul>',
            $this->getBlockClassName(),
            $label
        );
    }
}
