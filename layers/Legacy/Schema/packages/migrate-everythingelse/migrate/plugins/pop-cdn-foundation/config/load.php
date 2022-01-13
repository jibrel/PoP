<?php
use PoP\Root\Facades\Hooks\HooksAPIFacade;

// High priority: allow the Theme and other plug-ins to set the values in advance.
\PoP\Root\App::getHookManager()->addAction(
    'popcms:init', 
    'popCdnfoundationInitConstants', 
    10000
);
function popCdnfoundationInitConstants()
{
    include_once 'constants.php';
}
