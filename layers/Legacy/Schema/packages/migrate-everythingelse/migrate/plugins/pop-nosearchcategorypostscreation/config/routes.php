<?php
use PoP\Root\Facades\Hooks\HooksAPIFacade;

// Routes
//--------------------------------------------------------
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS00')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS00', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS01')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS01', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS02')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS02', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS03')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS03', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS04')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS04', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS05')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS05', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS06')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS06', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS07')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS07', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS08')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS08', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS09')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS09', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS10')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS10', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS11')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS11', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS12')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS12', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS13')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS13', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS14')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS14', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS15')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS15', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS16')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS16', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS17')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS17', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS18')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS18', false);
}
if (!defined('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS19')) {
	define('POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS19', false);
}

\PoP\Root\App::getHookManager()->addFilter(
    \PoP\Routing\RouteHookNames::ROUTES,
    function($routes) {
    	return array_merge(
    		$routes,
    		array_filter([
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS00,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS01,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS02,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS03,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS04,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS05,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS06,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS07,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS08,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS09,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS10,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS11,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS12,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS13,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS14,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS15,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS16,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS17,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS18,
				POP_NOSEARCHCATEGORYPOSTSCREATION_ROUTE_MYNOSEARCHCATEGORYPOSTS19,
    		])
    	);
    }
);
