<?php

declare(strict_types=1);

namespace PoPCMSSchema\CustomPostTagMutations\Hooks;

use PoP\Root\App;
use PoP\Root\Hooks\AbstractHookSet;
use PoPCMSSchema\CustomPostMutations\MutationResolvers\AbstractCreateUpdateCustomPostMutationResolver;
use PoPCMSSchema\CustomPosts\TypeAPIs\CustomPostTypeAPIInterface;
use PoPCMSSchema\CustomPostTagMutations\MutationResolvers\MutationInputProperties;
use PoPCMSSchema\CustomPostTagMutations\TypeAPIs\CustomPostTagTypeMutationAPIInterface;

abstract class AbstractMutationResolverHookSet extends AbstractHookSet
{
    private ?CustomPostTypeAPIInterface $customPostTypeAPI = null;

    final public function setCustomPostTypeAPI(CustomPostTypeAPIInterface $customPostTypeAPI): void
    {
        $this->customPostTypeAPI = $customPostTypeAPI;
    }
    final protected function getCustomPostTypeAPI(): CustomPostTypeAPIInterface
    {
        return $this->customPostTypeAPI ??= $this->instanceManager->getInstance(CustomPostTypeAPIInterface::class);
    }

    protected function init(): void
    {
        App::addAction(
            AbstractCreateUpdateCustomPostMutationResolver::HOOK_EXECUTE_CREATE_OR_UPDATE,
            $this->maybeSetTags(...),
            10,
            2
        );
    }

    public function maybeSetTags(int | string $customPostID, array $form_data): void
    {
        // Only for that specific CPT
        if ($this->getCustomPostTypeAPI()->getCustomPostType($customPostID) !== $this->getCustomPostType()) {
            return;
        }
        if (!isset($form_data[MutationInputProperties::TAGS])) {
            return;
        }
        $customPostTags = $form_data[MutationInputProperties::TAGS];
        $customPostTagTypeMutationAPI = $this->getCustomPostTagTypeMutationAPI();
        $customPostTagTypeMutationAPI->setTags($customPostID, $customPostTags, false);
    }

    abstract protected function getCustomPostType(): string;
    abstract protected function getCustomPostTagTypeMutationAPI(): CustomPostTagTypeMutationAPIInterface;
}
