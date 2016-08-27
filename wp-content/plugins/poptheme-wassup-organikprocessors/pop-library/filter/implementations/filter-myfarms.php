<?php

/**---------------------------------------------------------------------------------------------------------------
 *
 * Filter Action
 *
 * ---------------------------------------------------------------------------------------------------------------*/

define ('GD_FILTER_MYFARMS', 'myfarms');

class GD_Filter_MyFarms extends GD_FilterMyPosts {

	function get_filtercomponents() {
	
		global /*$gd_filtercomponent_moderatedstatus, */$gd_filtercomponent_search, $gd_filtercomponent_hashtags, /*$gd_filtercomponent_farmcategories, *//*$gd_filtercomponent_categories, */$gd_filtercomponent_volunteersneeded, $gd_filtercomponent_orderpost;		
		$status = $this->get_status_filtercomponent();
		$ret = array($status, $gd_filtercomponent_search, $gd_filtercomponent_hashtags, /*$gd_filtercomponent_categories, */$gd_filtercomponent_volunteersneeded, $gd_filtercomponent_orderpost);
		// if (PoPTheme_Wassup_Utils::add_appliesto()) {
		// 	global $gd_filtercomponent_appliesto;
		// 	array_splice($ret, array_search($gd_filtercomponent_categories, $ret)+1, 0, array($gd_filtercomponent_appliesto));
		// }
		$ret = apply_filters('gd_template:filter-myfarms:filtercomponents', $ret);
		$ret = apply_filters('gd_template:filter-myposts:filtercomponents', $ret);
		return $ret;
	}
	
	function get_name() {
	
		return GD_FILTER_MYFARMS;
	}
}

/**---------------------------------------------------------------------------------------------------------------
 * Initialize
 * ---------------------------------------------------------------------------------------------------------------*/
// $gd_filter_myfarms = new GD_Filter_MyFarms();		
new GD_Filter_MyFarms();		
