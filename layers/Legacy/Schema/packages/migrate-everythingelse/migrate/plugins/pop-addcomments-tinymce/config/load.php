<?php
use PoP\Root\Facades\Hooks\HooksAPIFacade;

// High priority: allow the Theme and other plug-ins to set the values in advance.
\PoP\Root\App::getHookManager()->addAction(
    'popcms:init', 
    'popAddcommentstinymceInitConstants', 
    10000
);
function popAddcommentstinymceInitConstants()
{
    include_once 'constants.php';
}
