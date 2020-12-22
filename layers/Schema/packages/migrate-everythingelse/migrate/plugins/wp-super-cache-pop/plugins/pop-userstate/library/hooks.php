<?php
use PoP\Hooks\Facades\HooksAPIFacade;

/**
 * Ignore files to cache: ?action=loaduserstate
 */
HooksAPIFacade::getInstance()->addFilter('pop_wp_cache_set_rejected_uri', 'gdWpCacheUserstateAddRejectedUris');
function gdWpCacheUserstateAddRejectedUris($rejected_uris)
{
    $rejected_uris[] = '?'.GD_URLPARAM_ACTIONS.'[]='.POP_ACTION_LOADUSERSTATE;
    $rejected_uris[] = '&'.GD_URLPARAM_ACTIONS.'[]='.POP_ACTION_LOADUSERSTATE;
    return $rejected_uris;
}
