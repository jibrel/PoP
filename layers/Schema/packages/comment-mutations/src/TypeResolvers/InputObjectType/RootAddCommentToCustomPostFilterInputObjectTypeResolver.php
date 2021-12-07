<?php

declare(strict_types=1);

namespace PoPSchema\CommentMutations\TypeResolvers\InputObjectType;

class RootAddCommentToCustomPostFilterInputObjectTypeResolver extends AbstractAddCommentToCustomPostFilterInputObjectTypeResolver
{
    public function getTypeName(): string
    {
        return 'RootAddCommentToCustomPostFilterInput';
    }

    public function getTypeDescription(): ?string
    {
        return $this->getTranslationAPI()->__('Input to add a comment to a custom post', 'comment-mutations');
    }

    protected function addCustomPostInputField(): bool
    {
        return true;
    }

    protected function addParentCommentInputField(): bool
    {
        return true;
    }

    protected function isParentCommentInputFieldMandatory(): bool
    {
        return false;
    }
}