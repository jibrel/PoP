<?php
use PoP\Root\Facades\Hooks\HooksAPIFacade;

\PoP\Root\App::getHookManager()->addFilter('gd_jquery_constants', 'popUserplatformJqueryConstants');
function popUserplatformJqueryConstants($jqueryConstants)
{
    $jqueryConstants['USERATTRIBUTES'] = gdUserAttributes();
    return $jqueryConstants;
}
