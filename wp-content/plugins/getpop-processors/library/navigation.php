<?php

/**---------------------------------------------------------------------------------------------------------------
 * navigation.php
 * ---------------------------------------------------------------------------------------------------------------*/
add_filter('gd_navigation_menu_item_icon', 'getpop_processors_navigation_menu_item_icon', 10, 3); 
function getpop_processors_navigation_menu_item_icon($icon, $menu_item_object_id, $html = true) {

	switch ($menu_item_object_id) {

		case GETPOP_PROCESSORS_PAGE_HOME:

			$fontawesome = 'fa-info-circle';
			break;

		case GETPOP_PROCESSORS_PAGE_CONTACTABOUTUS:

			$fontawesome = 'fa-smile-o';
			break;
	}

	// Important: do not replace the \' below for quotes, otherwise the "Share by email" and "Embed" buttons
	// don't work for pages (eg: http://m3l.localhost/become-a-featured-community/) since the fontawesome icons
	// screw up the data-header attr in the link
	if ($fontawesome) {

		if ($html) {
			return sprintf('<i class=\'fa fa-fw %s\'></i>', $fontawesome);
		}
		return $fontawesome;
	}
	
	return $icon;
}
