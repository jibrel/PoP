<?php
/**---------------------------------------------------------------------------------------------------------------
 *
 * Template Manager (Handlebars)
 *
 * ---------------------------------------------------------------------------------------------------------------*/

define ('GD_TEMPLATE_CAROUSELCONTROLS_EVENTS', PoP_ServerUtils::get_template_definition('carouselcontrols-events'));
define ('GD_TEMPLATE_CAROUSELCONTROLS_AUTHOREVENTS', PoP_ServerUtils::get_template_definition('carouselcontrols-authorevents'));

class GD_EM_Template_Processor_CustomCarouselControls extends GD_Template_Processor_CarouselControlsBase {

	function get_templates_to_process() {
	
		return array(
			GD_TEMPLATE_CAROUSELCONTROLS_EVENTS,
			GD_TEMPLATE_CAROUSELCONTROLS_AUTHOREVENTS,
		);
	}

	function get_control_class($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_CAROUSELCONTROLS_EVENTS:
			case GD_TEMPLATE_CAROUSELCONTROLS_AUTHOREVENTS:

				return 'btn btn-link btn-compact';
		}

		return parent::get_control_class($template_id);
	}

	function get_title_class($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_CAROUSELCONTROLS_EVENTS:
			case GD_TEMPLATE_CAROUSELCONTROLS_AUTHOREVENTS:

				return 'btn btn-link btn-compact';
		}

		return parent::get_title_class($template_id);
	}
	function get_title($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_CAROUSELCONTROLS_EVENTS:
			case GD_TEMPLATE_CAROUSELCONTROLS_AUTHOREVENTS:

				return gd_navigation_menu_item(POPTHEME_WASSUP_EM_PAGE_EVENTS, true).sprintf(
						'<span class="hidden-sm hidden-md hidden-lg">%s</span><span class="hidden-xs">%s</span>',
						__('Events', 'poptheme-wassup'),
						__('Upcoming Events', 'poptheme-wassup')
					);
		}

		return parent::get_title($template_id);
	}
	protected function get_title_link($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_CAROUSELCONTROLS_EVENTS:

				return get_permalink(POPTHEME_WASSUP_EM_PAGE_EVENTS);

			case GD_TEMPLATE_CAROUSELCONTROLS_AUTHOREVENTS:

				global $author, $gd_template_settingsmanager;
				$url = get_author_posts_url($author);
				$page_ids = array(
					GD_TEMPLATE_CAROUSELCONTROLS_AUTHOREVENTS => POPTHEME_WASSUP_EM_PAGE_EVENTS,
				);
				return GD_TemplateManager_Utils::add_tab($url, $page_ids[$template_id]);
		}

		return parent::get_title_link($template_id);
	}
}

/**---------------------------------------------------------------------------------------------------------------
 * Initialization
 * ---------------------------------------------------------------------------------------------------------------*/
new GD_EM_Template_Processor_CustomCarouselControls();