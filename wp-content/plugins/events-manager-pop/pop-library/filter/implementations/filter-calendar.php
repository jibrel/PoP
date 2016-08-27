<?php

/**---------------------------------------------------------------------------------------------------------------
 *
 * Filter Events
 *
 * ---------------------------------------------------------------------------------------------------------------*/

define ('GD_FILTER_EVENTSCALENDAR', 'calendar');

class GD_Filter_EventsCalendar extends GD_Filter_EventsBase {

	function get_filtercomponents() {
	
		// Events: cannot filter by categories, since em_get_events() has no support for meta_query
		// Events: cannot filter by tags, since using arg "tag" searchs for its own post type for event tag, and not the standard post tag
		global $gd_filtercomponent_search, /*$gd_filtercomponent_hashtags, $gd_filtercomponent_categories, */$gd_filtercomponent_profiles;		
		$ret = array($gd_filtercomponent_search, /*$gd_filtercomponent_hashtags, $gd_filtercomponent_categories, */$gd_filtercomponent_profiles);
		$ret = apply_filters('gd_template:filter-eventscalendar:filtercomponents', $ret);
		$ret = apply_filters('gd_template:filter-posts:filtercomponents', $ret);
		return $ret;
	}
	
	function get_name() {
	
		return GD_FILTER_EVENTSCALENDAR;
	}
}

/**---------------------------------------------------------------------------------------------------------------
 * Initialize
 * ---------------------------------------------------------------------------------------------------------------*/
// $gd_filter_eventscalendar = new GD_Filter_EventsCalendar();		
new GD_Filter_EventsCalendar();		
