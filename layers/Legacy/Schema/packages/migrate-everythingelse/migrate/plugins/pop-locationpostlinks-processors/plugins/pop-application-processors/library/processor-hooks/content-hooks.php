<?php
use PoP\ComponentModel\State\ApplicationState;
use PoPCMSSchema\CustomPosts\Facades\CustomPostTypeAPIFacade;
use PoPCMSSchema\PostCategories\Facades\PostCategoryTypeAPIFacade;
use PoPCMSSchema\Posts\Facades\PostTypeAPIFacade;

class PoPTheme_LocationPostLinks_ContentHooks
{
    public function __construct()
    {
        \PoP\Root\App::addFilter(
            'PoP_Module_Processor_Contents:inner_module',
            $this->contentInner(...),
            10,
            2
        );
    }

    public function contentInner($inner, array $module)
    {
        if ($module == [PoP_Module_Processor_Contents::class, PoP_Module_Processor_Contents::MODULE_CONTENT_SINGLE]) {
            $postTypeAPI = PostTypeAPIFacade::getInstance();
            $customPostTypeAPI = CustomPostTypeAPIFacade::getInstance();
            $postCategoryTypeAPI = PostCategoryTypeAPIFacade::getInstance();
            $post_id = \PoP\Root\App::getState(['routing', 'queried-object-id']);
            if (
                $customPostTypeAPI->getCustomPostType($post_id) == $postTypeAPI->getPostCustomPostType()
                && defined('POP_LOCATIONPOSTLINKS_CAT_LOCATIONPOSTLINKS') && POP_LOCATIONPOSTLINKS_CAT_LOCATIONPOSTLINKS
                && $postCategoryTypeAPI->hasCategory(POP_LOCATIONPOSTLINKS_CAT_LOCATIONPOSTLINKS, $post_id)
            ) {
                return [PoP_ContentPostLinks_Module_Processor_SingleContentInners::class, PoP_ContentPostLinks_Module_Processor_SingleContentInners::MODULE_CONTENTINNER_LINKSINGLE];
            }
        }

        return $inner;
    }
}

/**
 * Initialization
 */
new PoPTheme_LocationPostLinks_ContentHooks();
