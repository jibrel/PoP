<?php
use PoP\Root\Facades\Translation\TranslationAPIFacade;

class PoP_UserPlatform_CheckpointHooks
{
    public function __construct()
    {
        \PoP\Root\App::addFilter(
            'GD_UserLogin_Module_Processor_UserCheckpointMessageLayouts:checkpoint-messages:loggedin',
            $this->getCheckpointMessages(...)
        );
    }

    public function getCheckpointMessages($checkpoint_messages)
    {
        $checkpoint_messages['usernoprofileaccess'] = TranslationAPIFacade::getInstance()->__('Your user account doesn\'t have the role needed to perform this operation.', 'poptheme-wassup');
        return $checkpoint_messages;
    }
}

/**
 * Initialization
 */
new PoP_UserPlatform_CheckpointHooks();
