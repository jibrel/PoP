<?php

declare(strict_types=1);

namespace PoPSchema\Comments\TypeResolvers\ObjectType;

use PoP\ComponentModel\Engine\DataloadingEngineInterface;
use PoP\ComponentModel\AttachableExtensions\AttachableExtensionManagerInterface;
use PoP\ComponentModel\DirectivePipeline\DirectivePipelineServiceInterface;
use PoP\ComponentModel\RelationalTypeDataLoaders\RelationalTypeDataLoaderInterface;
use PoP\ComponentModel\ErrorHandling\ErrorProviderInterface;
use PoP\ComponentModel\Instances\InstanceManagerInterface;
use PoP\ComponentModel\Schema\FeedbackMessageStoreInterface;
use PoP\ComponentModel\Schema\FieldQueryInterpreterInterface;
use PoP\ComponentModel\Schema\SchemaDefinitionServiceInterface;
use PoP\ComponentModel\Schema\SchemaNamespacingServiceInterface;
use PoP\ComponentModel\TypeResolvers\ObjectType\AbstractObjectTypeResolver;
use PoP\Hooks\HooksAPIInterface;
use PoP\Translation\TranslationAPIInterface;
use PoPSchema\Comments\TypeAPIs\CommentTypeAPIInterface;
use PoPSchema\Comments\RelationalTypeDataLoaders\ObjectType\CommentTypeDataLoader;

class CommentObjectTypeResolver extends AbstractObjectTypeResolver
{
    protected CommentTypeAPIInterface $commentTypeAPI;
    protected CommentTypeDataLoader $commentTypeDataLoader;
    public function __construct(
        CommentTypeAPIInterface $commentTypeAPI,
        CommentTypeDataLoader $commentTypeDataLoader,
    ) {
        $this->commentTypeAPI = $commentTypeAPI;
        $this->commentTypeDataLoader = $commentTypeDataLoader;
        }

    public function getTypeName(): string
    {
        return 'Comment';
    }

    public function getSchemaTypeDescription(): ?string
    {
        return $this->translationAPI->__('Comments added to custom posts', 'comments');
    }

    public function getID(object $object): string | int | null
    {
        $comment = $object;
        return $this->commentTypeAPI->getCommentId($comment);
    }

    public function getRelationalTypeDataLoader(): RelationalTypeDataLoaderInterface
    {
        return $this->commentTypeDataLoader;
    }
}
