<?php
/**---------------------------------------------------------------------------------------------------------------
 *
 * Template Manager (Handlebars)
 *
 * ---------------------------------------------------------------------------------------------------------------*/

define ('GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT', PoP_ServerUtils::get_template_definition('blockgroup-tabpanel-authormainallcontent'));
define ('GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORALLCONTENT', PoP_ServerUtils::get_template_definition('blockgroup-tabpanel-authorallcontent'));
define ('GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORLINKS', PoP_ServerUtils::get_template_definition('blockgroup-tabpanel-authorlinks'));
define ('GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORHIGHLIGHTS', PoP_ServerUtils::get_template_definition('blockgroup-tabpanel-authorhighlights'));
define ('GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORWEBPOSTS', PoP_ServerUtils::get_template_definition('blockgroup-tabpanel-authorwebposts'));
define ('GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWERS', PoP_ServerUtils::get_template_definition('blockgroup-tabpanel-authorfollowers'));
define ('GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWINGUSERS', PoP_ServerUtils::get_template_definition('blockgroup-tabpanel-authorfollowingusers'));
define ('GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORRECOMMENDEDPOSTS', PoP_ServerUtils::get_template_definition('blockgroup-tabpanel-authorrecommendedposts'));

class GD_Template_Processor_AuthorSectionTabPanelBlockGroups extends GD_Template_Processor_AuthorSectionTabPanelBlockGroupsBase {

	function get_templates_to_process() {
	
		return array(
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORALLCONTENT,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORLINKS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORHIGHLIGHTS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORWEBPOSTS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWERS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWINGUSERS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORRECOMMENDEDPOSTS,
		);
	}

	protected function get_block_inner_templates($template_id) {

		$ret = parent::get_block_inner_templates($template_id);

		global $author;
		if (gd_ure_is_community($author)) {

			switch ($template_id) {

				case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT:
				case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORALLCONTENT:
				case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORLINKS:
				case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORHIGHLIGHTS:
				case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORWEBPOSTS:
				
					$ret[] = GD_URE_TEMPLATE_CONTROLGROUP_CONTENTSOURCE;
					break;
			}
		}
	
		return $ret;
	}

	function get_blockgroup_blocks($template_id) {

		$ret = parent::get_blockgroup_blocks($template_id);

		switch ($template_id) {

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT:

				$ret = array_merge(
					$ret,
					array(
						GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_SIMPLEVIEW,
						GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_FULLVIEW,
						GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_LIST,
					)
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORALLCONTENT:

				$ret = array_merge(
					$ret,
					array(
						GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_SIMPLEVIEW,
						GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_FULLVIEW,
						GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_LIST,
					)
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORLINKS:

				$ret = array_merge(
					$ret,
					array(
						GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_SIMPLEVIEW,
						GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_FULLVIEW,
						GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_LIST,
					)
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORHIGHLIGHTS:

				$ret = array_merge(
					$ret,
					array(
						GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_FULLVIEW,
						// GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_LIST,
						GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_THUMBNAIL,
					)
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORWEBPOSTS:

				$ret = array_merge(
					$ret,
					array(
						GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_SIMPLEVIEW,
						GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_FULLVIEW,
						GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_LIST,
					)
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWERS:

				$ret = array_merge(
					$ret,
					array(
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_FULLVIEW,
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_LIST,
						// GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP,
					)
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWINGUSERS:

				$ret = array_merge(
					$ret,
					array(
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_FULLVIEW,
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_LIST,
						// GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP,
					)
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORRECOMMENDEDPOSTS:

				$ret = array_merge(
					$ret,
					array(
						GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_SIMPLEVIEW,
						GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_FULLVIEW,
						GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_LIST,
					)
				);
				break;
		}

		// Allow Events Manager to add the Map format
		$ret = apply_filters('GD_Template_Processor_AuthorSectionTabPanelBlockGroups:blocks', $ret, $template_id);

		return $ret;
	}

	function get_panel_headers($template_id, $atts) {

		switch ($template_id) {

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT:

				$ret = array(
					GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_SIMPLEVIEW => array(
						GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_SIMPLEVIEW,
						GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_FULLVIEW,
					),
					GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_LIST => array(
						GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_LIST,
					),
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORALLCONTENT:

				$ret = array(
					GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_SIMPLEVIEW => array(
						GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_SIMPLEVIEW,
						GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_FULLVIEW,
					),
					GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_LIST => array(
						GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_LIST,
					),
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORLINKS:

				$ret = array(
					GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_SIMPLEVIEW => array(
						GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_SIMPLEVIEW,
						GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_FULLVIEW,
					),
					GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_LIST => array(
						GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_LIST,
					),
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORHIGHLIGHTS:

				$ret = array(
					GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_FULLVIEW => array(),
					GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_LIST => array(
						GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_LIST,
						GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_THUMBNAIL,
					),
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORWEBPOSTS:

				$ret = array(
					GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_SIMPLEVIEW => array(
						GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_SIMPLEVIEW,
						GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_FULLVIEW,
					),
					GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_DETAILS => array(
						GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_LIST,
					),
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWERS:

				$ret = array(
					GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_FULLVIEW => array(),
					GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_DETAILS => array(
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_LIST,
					),
					// GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP,
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWINGUSERS:

				$ret = array(
					GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_FULLVIEW => array(),
					GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_DETAILS => array(
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_LIST,
					),
					// GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP,
				);
				break;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORRECOMMENDEDPOSTS:

				$ret = array(
					GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_SIMPLEVIEW => array(
						GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_SIMPLEVIEW,
						GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_FULLVIEW,
					),
					GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_LIST => array(
						GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_DETAILS,
						GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_THUMBNAIL,
						GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_LIST,
					),
				);
				break;
		}

		if ($ret) {
			return apply_filters('GD_Template_Processor_AuthorSectionTabPanelBlockGroups:panel_headers', $ret, $template_id);
		}

		return parent::get_panel_headers($template_id, $atts);
	}

	protected function get_controlgroup_bottom($template_id) {

		switch ($template_id) {

			// Override parent value
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT:

				return null;
		}

		return parent::get_controlgroup_bottom($template_id);
	}

	protected function get_blocksections_classes($template_id) {

		$ret = parent::get_blocksections_classes($template_id);

		switch ($template_id) {

			// Override parent value
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT:

				$ret['controlgroup-top'] = 'right pull-right';
				break;
		}

		return $ret;
	}

	protected function get_controlgroup_top($template_id) {

		switch ($template_id) {

			// Override parent value
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT:

				return GD_TEMPLATE_CONTROLGROUP_SUBMENUUSERLISTMAIN;
		}

		return parent::get_controlgroup_top($template_id);
	}

	function get_filter_template($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT:
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORALLCONTENT:
				
				return GD_TEMPLATE_FILTER_AUTHORWILDCARDPOSTS;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORLINKS:
				
				return GD_TEMPLATE_FILTER_AUTHORLINKS;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORHIGHLIGHTS:
				
				return GD_TEMPLATE_FILTER_AUTHORHIGHLIGHTS;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORWEBPOSTS:
				
				return GD_TEMPLATE_FILTER_AUTHORWEBPOSTS;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORRECOMMENDEDPOSTS:
				
				return GD_TEMPLATE_FILTER_WILDCARDPOSTS;

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWERS:
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWINGUSERS:
				
				return GD_TEMPLATE_FILTER_WILDCARDUSERS;
		}
		
		return parent::get_filter_template($template_id);
	}

	function get_title($template_id) {

		switch ($template_id) {

			// Override parent value
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT:

				return gd_navigation_menu_item(POPTHEME_WASSUP_PAGEPLACEHOLDER_HOME, true).__('Latest content', 'poptheme-wassup');
		}
		
		return parent::get_title($template_id);
	}

	function get_submenu($template_id) {

		switch ($template_id) {

			// Override parent value
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT:

				return null;
		}
		
		return parent::get_submenu($template_id);
	}

	function get_panel_header_fontawesome($blockgroup, $blockunit) {

		$details = array(
			GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_DETAILS,
			// GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_DETAILS,
		);
		$simpleviews = array(
			GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_SIMPLEVIEW,
			GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_SIMPLEVIEW,
			GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_SIMPLEVIEW,
			GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_SIMPLEVIEW,
			GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_SIMPLEVIEW,
		);
		$fullviews = array(
			GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_FULLVIEW,
		);
		$thumbnails = array(
			GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_THUMBNAIL,
		);
		$grids = array(
			GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_THUMBNAIL,
		);
		$lists = array(
			GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_LIST,
		);
		$maps = array(
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP,
		);

		if (in_array($blockunit, $details)) {

			return 'fa-th-list';
		}
		elseif (in_array($blockunit, $simpleviews)) {
			
			return 'fa-angle-right';
		}
		elseif (in_array($blockunit, $fullviews)) {
			
			return 'fa-angle-double-right';
		}
		elseif (in_array($blockunit, $thumbnails) || in_array($blockunit, $grids)) {
			
			return 'fa-th';
		}
		elseif (in_array($blockunit, $lists)) {
			
			return 'fa-list';
		}
		elseif (in_array($blockunit, $maps)) {
			
			return 'fa-map-marker';
		}

		return parent::get_panel_header_fontawesome($blockgroup, $blockunit);
	}
	function get_panel_header_title($blockgroup, $blockunit) {

		$details = array(
			GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_DETAILS,
			// GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_DETAILS,
			GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_DETAILS,
		);
		$simpleviews = array(
			GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_SIMPLEVIEW,
			GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_SIMPLEVIEW,
			GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_SIMPLEVIEW,
			GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_SIMPLEVIEW,
			GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_SIMPLEVIEW,
		);
		$fullviews = array(
			GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_FULLVIEW,
		);
		$onlyfullviews = array(
			GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_FULLVIEW,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_FULLVIEW,
		);
		$thumbnails = array(
			GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_THUMBNAIL,
			GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_THUMBNAIL,
		);
		$grids = array(
			GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_THUMBNAIL,
		);
		$lists = array(
			GD_TEMPLATE_BLOCK_AUTHORMAINALLCONTENT_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORALLCONTENT_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORLINKS_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORHIGHLIGHTS_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORWEBPOSTS_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLL_LIST,
			GD_TEMPLATE_BLOCK_AUTHORRECOMMENDEDPOSTS_SCROLL_LIST,
		);
		$maps = array(
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWERS_SCROLLMAP,
			GD_TEMPLATE_BLOCK_AUTHORFOLLOWINGUSERS_SCROLLMAP,
		);

		if (in_array($blockunit, $details)) {

			return __('Details', 'poptheme-wassup');
		}
		elseif (in_array($blockunit, $simpleviews)) {
			
			return __('Feed', 'poptheme-wassup');
		}
		elseif (in_array($blockunit, $fullviews)) {
			
			return __('Extended', 'poptheme-wassup');
		}
		elseif (in_array($blockunit, $onlyfullviews)) {
			
			return __('Full view', 'poptheme-wassup');
		}
		elseif (in_array($blockunit, $thumbnails)) {
			
			return __('Thumbnail', 'poptheme-wassup');
		}
		elseif (in_array($blockunit, $grids)) {
			
			return __('Grid', 'poptheme-wassup');
		}
		elseif (in_array($blockunit, $lists)) {
			
			return __('List', 'poptheme-wassup');
		}
		elseif (in_array($blockunit, $maps)) {
			
			return __('Map', 'poptheme-wassup');
		}

		return parent::get_panel_header_title($blockgroup, $blockunit);
	}
	function get_panel_header_tooltip($blockgroup, $blockunit) {

		switch ($blockgroup) {

			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT:
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORALLCONTENT:
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORLINKS:
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORHIGHLIGHTS:
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORWEBPOSTS:
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWERS:
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWINGUSERS:
			case GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORRECOMMENDEDPOSTS:
				
				return $this->get_panel_header_title($blockgroup, $blockunit);
		}

		return parent::get_panel_header_tooltip($blockgroup, $blockunit);
	}

	function get_default_active_blockunit($template_id) {

		$pages_id = array(
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT => POP_COREPROCESSORS_PAGE_MAIN,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORALLCONTENT => POP_WPAPI_PAGE_ALLCONTENT,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORLINKS => POPTHEME_WASSUP_PAGE_WEBPOSTLINKS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORHIGHLIGHTS => POPTHEME_WASSUP_PAGE_HIGHLIGHTS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORWEBPOSTS => POPTHEME_WASSUP_PAGE_WEBPOSTS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWERS => POP_COREPROCESSORS_PAGE_FOLLOWERS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWINGUSERS => POP_COREPROCESSORS_PAGE_FOLLOWINGUSERS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORRECOMMENDEDPOSTS => POP_COREPROCESSORS_PAGE_RECOMMENDEDPOSTS,
		);
		if ($page_id = $pages_id[$template_id]) {

			global $gd_template_settingsmanager;
			return $gd_template_settingsmanager->get_page_block($page_id, GD_SETTINGS_HIERARCHY_AUTHOR);
		}
	
		return parent::get_default_active_blockunit($template_id);
	}

	function init_atts($template_id, &$atts) {

		$class = '';
		$feeds = array(
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORMAINALLCONTENT,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORALLCONTENT,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORLINKS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORHIGHLIGHTS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORWEBPOSTS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWERS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORFOLLOWINGUSERS,
			GD_TEMPLATE_BLOCKGROUP_TABPANEL_AUTHORRECOMMENDEDPOSTS,
		);
		if (in_array($template_id, $feeds)) {
			$class = 'feed';
		}
		if ($class) {
			$this->append_att($template_id, $atts, 'class', $class);
		}

		return parent::init_atts($template_id, $atts);
	}
}

/**---------------------------------------------------------------------------------------------------------------
 * Initialization
 * ---------------------------------------------------------------------------------------------------------------*/
new GD_Template_Processor_AuthorSectionTabPanelBlockGroups();
