<?php
use PoPSchema\CustomPosts\Facades\CustomPostTypeAPIFacade;

class PoPTheme_Wassup_AE_NewsletterSpecialSinglePost extends PoPTheme_Wassup_AE_NewsletterRecipientsBase
{
    public function getRoute()
    {
        return POP_COMMONAUTOMATEDEMAILS_ROUTE_SINGLEPOST_SPECIAL;
    }

    protected function getSubject()
    {
        if (isset($_REQUEST[POP_INPUTNAME_POSTID])) {
            // The post id is passed through param pid
            $customPostTypeAPI = CustomPostTypeAPIFacade::getInstance();
            return $customPostTypeAPI->getTitle($_REQUEST[POP_INPUTNAME_POSTID]);
        }
        return '';
    }
}

/**
 * Initialization
 */
new PoPTheme_Wassup_AE_NewsletterSpecialSinglePost();
