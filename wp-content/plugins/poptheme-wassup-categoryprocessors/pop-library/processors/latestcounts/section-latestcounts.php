<?php
/**---------------------------------------------------------------------------------------------------------------
 *
 * Template Manager (Handlebars)
 *
 * ---------------------------------------------------------------------------------------------------------------*/

define ('GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS00', PoP_ServerUtils::get_template_definition('latestcount-categoryposts00'));
define ('GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS01', PoP_ServerUtils::get_template_definition('latestcount-categoryposts01'));
define ('GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS02', PoP_ServerUtils::get_template_definition('latestcount-categoryposts02'));
define ('GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS03', PoP_ServerUtils::get_template_definition('latestcount-categoryposts03'));
define ('GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS04', PoP_ServerUtils::get_template_definition('latestcount-categoryposts04'));
define ('GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS05', PoP_ServerUtils::get_template_definition('latestcount-categoryposts05'));
define ('GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS06', PoP_ServerUtils::get_template_definition('latestcount-categoryposts06'));
define ('GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS07', PoP_ServerUtils::get_template_definition('latestcount-categoryposts07'));
define ('GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS08', PoP_ServerUtils::get_template_definition('latestcount-categoryposts08'));
define ('GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS09', PoP_ServerUtils::get_template_definition('latestcount-categoryposts09'));
define ('GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS00', PoP_ServerUtils::get_template_definition('latestcount-author-categoryposts00'));
define ('GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS01', PoP_ServerUtils::get_template_definition('latestcount-author-categoryposts01'));
define ('GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS02', PoP_ServerUtils::get_template_definition('latestcount-author-categoryposts02'));
define ('GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS03', PoP_ServerUtils::get_template_definition('latestcount-author-categoryposts03'));
define ('GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS04', PoP_ServerUtils::get_template_definition('latestcount-author-categoryposts04'));
define ('GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS05', PoP_ServerUtils::get_template_definition('latestcount-author-categoryposts05'));
define ('GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS06', PoP_ServerUtils::get_template_definition('latestcount-author-categoryposts06'));
define ('GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS07', PoP_ServerUtils::get_template_definition('latestcount-author-categoryposts07'));
define ('GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS08', PoP_ServerUtils::get_template_definition('latestcount-author-categoryposts08'));
define ('GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS09', PoP_ServerUtils::get_template_definition('latestcount-author-categoryposts09'));

class PoPThemeWassup_CategoryProcessors_Template_Processor_SectionLatestCounts extends GD_Template_Processor_SectionLatestCountsBase {

	function get_templates_to_process() {
	
		return array(
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS00,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS01,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS02,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS03,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS04,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS05,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS06,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS07,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS08,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS09,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS00,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS01,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS02,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS03,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS04,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS05,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS06,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS07,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS08,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS09,
		);
	}

	function get_object_name($template_id, $atts) {
	
		$cats = array(
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS00 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS00,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS01 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS01,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS02 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS02,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS03 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS03,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS04 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS04,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS05 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS05,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS06 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS06,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS07 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS07,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS08 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS08,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS09 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS09,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS00 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS00,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS01 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS01,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS02 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS02,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS03 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS03,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS04 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS04,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS05 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS05,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS06 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS06,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS07 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS07,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS08 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS08,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS09 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS09,
		);
		if ($cat = $cats[$template_id]) {
				
			return gd_get_categoryname($cat, 'lc');
		}
	
		return parent::get_object_names($template_id, $atts);
	}

	function get_object_names($template_id, $atts) {
	
		$cats = array(
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS00 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS00,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS01 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS01,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS02 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS02,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS03 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS03,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS04 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS04,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS05 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS05,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS06 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS06,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS07 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS07,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS08 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS08,
			GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS09 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS09,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS00 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS00,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS01 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS01,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS02 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS02,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS03 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS03,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS04 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS04,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS05 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS05,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS06 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS06,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS07 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS07,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS08 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS08,
			GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS09 => POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS09,
		);
		if ($cat = $cats[$template_id]) {
				
			return gd_get_categoryname($cat, 'plural-lc');
		}
	
		return parent::get_object_names($template_id, $atts);
	}

	function is_author($template_id, $atts) {

		switch ($template_id) {
			
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS00:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS01:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS02:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS03:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS04:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS05:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS06:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS07:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS08:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS09:
				
				return true;
		}
	
		return parent::is_author($template_id, $atts);
	}

	function get_section_classes($template_id, $atts) {

		$ret = parent::get_section_classes($template_id, $atts);

		// Because all these categories will be added together with "webpost" category,
		// then this one must also be added (the selector needs all categories from from the post to be present in the latestcount)
		switch ($template_id) {
			
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS00:
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS01:
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS02:
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS03:
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS04:
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS05:
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS06:
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS07:
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS08:
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS09:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS00:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS01:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS02:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS03:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS04:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS05:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS06:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS07:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS08:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS09:
				
				$ret[] = 'post-'.POPTHEME_WASSUP_CAT_WEBPOSTS;
				$ret[] = 'post-'.POPTHEME_WASSUP_CAT_WEBPOSTLINKS;
				break;
		}

		switch ($template_id) {
			
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS00:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS00:

				$ret[] = 'post-'.POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS00;
				break;
			
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS01:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS01:

				$ret[] = 'post-'.POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS01;
				break;
			
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS02:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS02:

				$ret[] = 'post-'.POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS02;
				break;
			
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS03:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS03:

				$ret[] = 'post-'.POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS03;
				break;
			
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS04:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS04:

				$ret[] = 'post-'.POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS04;
				break;
			
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS05:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS05:

				$ret[] = 'post-'.POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS05;
				break;
			
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS06:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS06:

				$ret[] = 'post-'.POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS06;
				break;
			
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS07:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS07:

				$ret[] = 'post-'.POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS07;
				break;
			
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS08:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS08:

				$ret[] = 'post-'.POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS08;
				break;
			
			case GD_TEMPLATE_LATESTCOUNT_CATEGORYPOSTS09:
			case GD_TEMPLATE_LATESTCOUNT_AUTHOR_CATEGORYPOSTS09:

				$ret[] = 'post-'.POPTHEME_WASSUP_CATEGORYPROCESSORS_CAT_CATEGORYPOSTS09;
				break;
		}
	
		return $ret;
	}
}

/**---------------------------------------------------------------------------------------------------------------
 * Initialization
 * ---------------------------------------------------------------------------------------------------------------*/
new PoPThemeWassup_CategoryProcessors_Template_Processor_SectionLatestCounts();