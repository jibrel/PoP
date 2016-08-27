<?php
/**---------------------------------------------------------------------------------------------------------------
 *
 * Template Manager (Handlebars)
 *
 * ---------------------------------------------------------------------------------------------------------------*/

define ('GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-searchusers-scrollmap'));
define ('GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-allusers-scrollmap'));

define ('GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-authorfollowers-scrollmap'));
define ('GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-authorfollowingusers-scrollmap'));

define ('GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-singleauthors-scrollmap'));
define ('GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-singlerecommendedby-scrollmap'));
define ('GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-singleupvotedby-scrollmap'));
define ('GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-singledownvotedby-scrollmap'));

define ('GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-events-scrollmap'));
define ('GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-pastevents-scrollmap'));

define ('GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-authorevents-scrollmap'));
define ('GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-authorpastevents-scrollmap'));

define ('GD_TEMPLATE_BLOCK_WHOWEARE_SCROLLMAP', PoP_ServerUtils::get_template_definition('block-whoweare-scrollmap'));

class GD_EM_Template_Processor_CustomScrollMapSectionBlocks extends GD_EM_Template_Processor_ScrollMapBlocksBase {

	function get_templates_to_process() {
	
		return array(
			GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP,
			GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP,
			GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_WHOWEARE_SCROLLMAP,
		);
	}

	protected function get_block_inner_template($template_id) {

		$inner_templates = array(
			GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP => GD_TEMPLATE_SCROLL_SEARCHUSERS_MAP,
			GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP => GD_TEMPLATE_SCROLL_ALLUSERS_MAP,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP => GD_TEMPLATE_SCROLL_AUTHORFOLLOWERS_MAP,		
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP => GD_TEMPLATE_SCROLL_AUTHORFOLLOWINGUSERS_MAP,		
			GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP => GD_TEMPLATE_SCROLL_ALLUSERS_MAP,
			GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP => GD_TEMPLATE_SCROLL_ALLUSERS_MAP,
			GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP => GD_TEMPLATE_SCROLL_ALLUSERS_MAP,
			GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP => GD_TEMPLATE_SCROLL_ALLUSERS_MAP,
			GD_TEMPLATE_BLOCK_WHOWEARE_SCROLLMAP => GD_TEMPLATE_SCROLL_WHOWEARE_MAP, 
			GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP => GD_TEMPLATE_SCROLL_EVENTS_MAP,
			GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP => GD_TEMPLATE_SCROLL_PASTEVENTS_MAP,
			GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP => GD_TEMPLATE_SCROLL_EVENTS_MAP,
			GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP => GD_TEMPLATE_SCROLL_PASTEVENTS_MAP,
		);

		return $inner_templates[$template_id];
	}

	protected function is_usermap_block($template_id) {

		switch ($template_id) {
			
			case GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_WHOWEARE_SCROLLMAP:

				return true;
		}

		return parent::is_usermap_block($template_id);
	}

	protected function is_postmap_block($template_id) {

		switch ($template_id) {
			
			case GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP:

				return true;
		}

		return parent::is_postmap_block($template_id);
	}

	function get_title($template_id) {
	
		switch ($template_id) {
			
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP:

				return GD_Template_Processor_CustomSectionBlocksUtils::get_author_title();

			case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:

				return GD_Template_Processor_CustomSectionBlocksUtils::get_single_title();
		}
		
		return parent::get_title($template_id);
	}

	function get_submenu($template_id) {

		// Do not add for the quickview
		$vars = GD_TemplateManager_Utils::get_vars();
		if (!$vars['fetching-json-quickview']) {

			switch ($template_id) {

				case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
				case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:
				case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:
				case GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP:

					return GD_TEMPLATE_SUBMENU_AUTHOR;

				case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:
				case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:
				case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:
				case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:

					if ($submenu = GD_Template_Processor_CustomSectionBlocksUtils::get_single_submenu()) {
						return $submenu;
					}
					break;
			}
		}
		
		return parent::get_submenu($template_id);
	}

	protected function show_fetchmore($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:
			
			case GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP:
			
			case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP:

			// case GD_TEMPLATE_BLOCK_WHOWEARE_SCROLLMAP:
			
				return true;
		}

		return parent::show_fetchmore($template_id);
	}

	function get_filter_template($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:

				return GD_TEMPLATE_FILTER_WILDCARDUSERS;

			case GD_TEMPLATE_BLOCK_EVENTS_TYPEAHEAD:

			case GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP:

				return GD_TEMPLATE_FILTER_EVENTS;

			case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP:

				return GD_TEMPLATE_FILTER_AUTHOREVENTS;
		}
		
		return parent::get_filter_template($template_id);
	}

	protected function get_iohandler($template_id) {

		return GD_DATALOAD_IOHANDLER_LIST;
	}

	function get_dataload_source($template_id, $atts) {

		global $gd_template_settingsmanager;
		
		switch ($template_id) {

			// These are the Profile Blocks, they will always be used inside an is_author() page
			// Then, point them not the is_page() page, but to the author url (mesym.com/p/mesym) and
			// an attr "tab" indicating this page through its path. This way, users can go straight to their 
			// information by typing their url: mesym.com/p/mesym?tab=events. Also good for future API
			case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:
			
				$ret = GD_Template_Processor_CustomSectionBlocksUtils::get_author_dataloadsource($template_id);
				break;

			case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:

				$ret = GD_Template_Processor_CustomSectionBlocksUtils::get_single_dataloadsource($template_id);
				break;

			default:

				$ret = parent::get_dataload_source($template_id, $atts);
				break;
		}

		$maps = array(
			GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP,

			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP,

			GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP,
			GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP,
			GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP,

			GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP,

			GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP,

			GD_TEMPLATE_BLOCK_WHOWEARE_SCROLLMAP,
		);
		if (in_array($template_id, $maps)) {
			
			$format = GD_TEMPLATEFORMAT_MAP;
		}

		if ($format) {

			$ret = add_query_arg(GD_URLPARAM_FORMAT, $format, $ret);
		}
	
		return $ret;
	}

	protected function get_block_page($template_id) {

		global $gd_template_settingsmanager;

		switch ($template_id) {

			// These are the Profile Blocks, they will always be used inside an is_author() page
			// Then, point them not the is_page() page, but to the author url (mesym.com/p/mesym) and
			// an attr "tab" indicating this page through its path. This way, users can go straight to their 
			// information by typing their url: mesym.com/p/mesym?tab=events. Also good for future API
			case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP:

			case GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:

				if ($page = $gd_template_settingsmanager->get_block_page($template_id, GD_SETTINGS_HIERARCHY_AUTHOR)) {

					return $page;
				}
				break;

			case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:

				if ($page = $gd_template_settingsmanager->get_block_page($template_id, GD_SETTINGS_HIERARCHY_SINGLE)) {

					return $page;
				}
				break;
		}
	
		return parent::get_block_page($template_id);
	}

	protected function get_dataload_query_args($template_id, $atts) {

		$ret = parent::get_dataload_query_args($template_id, $atts);
		
		switch ($template_id) {

			// Filter by the Profile/Community
			case GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP:

				GD_Template_Processor_CustomSectionBlocksUtils::add_dataloadqueryargs_authorcontent($ret);
				break;

			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
			
				GD_Template_Processor_CustomSectionBlocksUtils::add_dataloadqueryargs_authorfollowers($ret);
				break;

			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:
			
				GD_Template_Processor_CustomSectionBlocksUtils::add_dataloadqueryargs_authorfollowingusers($ret);
				break;

			case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:

				GD_Template_Processor_CustomSectionBlocksUtils::add_dataloadqueryargs_singleauthors($ret);
				break;

			case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:

				GD_Template_Processor_CustomSectionBlocksUtils::add_dataloadqueryargs_recommendedby($ret);
				break;

			case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:

				GD_Template_Processor_CustomSectionBlocksUtils::add_dataloadqueryargs_upvotedby($ret);
				break;

			case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:

				GD_Template_Processor_CustomSectionBlocksUtils::add_dataloadqueryargs_downvotedby($ret);
				break;
		}

		// $maps = array(
		// 	GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP,
		// 	GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP,

		// 	GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP,
		// 	GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP,

		// 	GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP,
		// 	GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP,
		// 	GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP,
		// 	GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP,

		// 	GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP,
		// 	GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP,

		// 	GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP,
		// 	GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP,

		// 	GD_TEMPLATE_BLOCK_WHOWEARE_SCROLLMAP,
		// );

		// if (in_array($template_id, $maps)) {
			
		// 	// Maps: bring twice the data (eg: normally 12, bring 24)
		// 	$ret['limit'] = get_option('posts_per_page') * 2;
		// }

		return $ret;
	}

	protected function get_controlgroup_top($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP:

				return GD_TEMPLATE_CONTROLGROUP_BLOCKPOSTLIST;

			case GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:

				return GD_TEMPLATE_CONTROLGROUP_BLOCKUSERLIST;

		}

		return parent::get_controlgroup_top($template_id);
	}

	function get_latestcount_template($template_id) {
	
		switch ($template_id) {

			case GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP:

				return GD_TEMPLATE_LATESTCOUNT_EVENTS;

			case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:

				return GD_TEMPLATE_LATESTCOUNT_AUTHOR_EVENTS;
		}

		return parent::get_latestcount_template($template_id);
	}

	protected function get_messagefeedback($template_id) {
	
		switch ($template_id) {

			case GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:
			
				return GD_TEMPLATE_MESSAGEFEEDBACK_EVENTS;

			case GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP:

				return GD_TEMPLATE_MESSAGEFEEDBACK_PASTEVENTS;

			case GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:
			// case GD_TEMPLATE_BLOCK_WHOWEARE_SCROLLMAP:

				return GD_TEMPLATE_MESSAGEFEEDBACK_USERS;

			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
			
				return GD_TEMPLATE_MESSAGEFEEDBACK_FOLLOWERS;
		}

		return parent::get_messagefeedback($template_id);
	}

	protected function get_messagefeedback_position($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP:

			case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP:
			
			case GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:
			
				return 'bottom';
		}

		return parent::get_messagefeedback_position($template_id);
	}


	function get_dataloader($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP:
			
				return GD_DATALOADER_EVENTLIST;

			case GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP:

				return GD_DATALOADER_PASTEVENTLIST;

			case GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP:
			case GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP:

				return GD_DATALOADER_USERLIST;

			case GD_TEMPLATE_BLOCK_WHOWEARE_SCROLLMAP:

				return GD_DATALOADER_FIXEDUSERLIST;
		}

		return parent::get_dataloader($template_id);
	}



	function get_data_setting($template_id, $atts) {

		$ret = parent::get_data_setting($template_id, $atts);

		switch ($template_id) {
				
			case GD_TEMPLATE_BLOCK_WHOWEARE_SCROLLMAP:

				$ret['iohandler-atts'][GD_DATALOAD_IOHANDLER_LIST_STOPFETCHING] = true;
				$ret['dataload-atts']['include'] = gd_fixedscroll_user_ids($template_id);
				break;
		}
		
		$maps = array(
			GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_ALLUSERS_SCROLLMAP,

			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP,

			GD_TEMPLATE_BLOCK_SINGLEAUTHORS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_SINGLERECOMMENDEDBY_SCROLLMAP,
			GD_TEMPLATE_BLOCK_SINGLEUPVOTEDBY_SCROLLMAP,
			GD_TEMPLATE_BLOCK_SINGLEDOWNVOTEDBY_SCROLLMAP,

			GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP,
	
			GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP,

			GD_TEMPLATE_BLOCK_WHOWEARE_SCROLLMAP,
		);
		// Important: set always this value, because the IOHandler used by all different blocks is the same!
		// So if not restarting, the display will be the same as the previous one, and sometimes it doesn't need the display
		// (Eg: tables)
		// $ret[GD_URLPARAM_FORMAT] = '';
		
		if (in_array($template_id, $maps)) {
			
			$format = GD_TEMPLATEFORMAT_MAP;
		}

		if ($format) {
			$ret['iohandler-atts'][GD_URLPARAM_FORMAT] = $format;
		}
		
		return $ret;
	}

	function init_atts($template_id, &$atts) {
			
		switch ($template_id) {

			case GD_TEMPLATE_BLOCK_SEARCHUSERS_SCROLLMAP:
			
				// Search: don't bring anything unless we're filtering (no results initially)
				global $gd_filter_manager;
				$filter_object = $atts['filter-object'];
				if (!$gd_filter_manager->filteringby($filter_object)) {

					$this->add_att($template_id, $atts, 'data-load', false);						
				}				
				break;
		}

		// Events: choose to only select past/future
		$past = array(
			GD_TEMPLATE_BLOCK_PASTEVENTS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHORPASTEVENTS_SCROLLMAP,
		);
		$future = array(
			GD_TEMPLATE_BLOCK_EVENTS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHOREVENTS_SCROLLMAP,
		);
		if (in_array($template_id, $past)) {
			$daterange_class = 'daterange-past opens-right';
		}
		elseif (in_array($template_id, $future)) {
			$daterange_class = 'daterange-future opens-right';
		}
		if ($daterange_class) {
			$this->add_att(GD_TEMPLATE_FILTERFORMCOMPONENT_DATERANGEPICKER, $atts, 'daterange-class', $daterange_class);
		}

		return parent::init_atts($template_id, $atts);
	}
}


/**---------------------------------------------------------------------------------------------------------------
 * Initialization
 * ---------------------------------------------------------------------------------------------------------------*/
new GD_EM_Template_Processor_CustomScrollMapSectionBlocks();