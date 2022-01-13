<?php
use PoP\Root\Facades\Hooks\HooksAPIFacade;

\PoP\Root\App::getHookManager()->addAction(
    'popcms:init', 
    'popAvatarAwsInitConstants', 
    10000
);
function popAvatarAwsInitConstants()
{
    include_once 'constants.php';
    include_once 'config.php';
}
