<?php

/**
 * Create page on the initial user welcome email
 */
\PoP\Root\App::addFilter('sendemailUserwelcome:create_routes', 'popContentpostlinkscreationSendemailCreateRoutes');
function popContentpostlinkscreationSendemailCreateRoutes($routes)
{
    $routes = array_merge(
        $routes,
        array(
            POP_CONTENTPOSTLINKSCREATION_ROUTE_ADDCONTENTPOSTLINK,
        )
    );

    return $routes;
}
