<?php
/**---------------------------------------------------------------------------------------------------------------
 *
 * Template Manager (Handlebars)
 *
 * ---------------------------------------------------------------------------------------------------------------*/

define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS00', PoP_ServerUtils::get_template_definition('messagefeedbackinner-categoryposts00'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS01', PoP_ServerUtils::get_template_definition('messagefeedbackinner-categoryposts01'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS02', PoP_ServerUtils::get_template_definition('messagefeedbackinner-categoryposts02'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS03', PoP_ServerUtils::get_template_definition('messagefeedbackinner-categoryposts03'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS04', PoP_ServerUtils::get_template_definition('messagefeedbackinner-categoryposts04'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS05', PoP_ServerUtils::get_template_definition('messagefeedbackinner-categoryposts05'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS06', PoP_ServerUtils::get_template_definition('messagefeedbackinner-categoryposts06'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS07', PoP_ServerUtils::get_template_definition('messagefeedbackinner-categoryposts07'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS08', PoP_ServerUtils::get_template_definition('messagefeedbackinner-categoryposts08'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS09', PoP_ServerUtils::get_template_definition('messagefeedbackinner-categoryposts09'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS00', PoP_ServerUtils::get_template_definition('messagefeedbackinner-mycategoryposts00'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS01', PoP_ServerUtils::get_template_definition('messagefeedbackinner-mycategoryposts01'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS02', PoP_ServerUtils::get_template_definition('messagefeedbackinner-mycategoryposts02'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS03', PoP_ServerUtils::get_template_definition('messagefeedbackinner-mycategoryposts03'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS04', PoP_ServerUtils::get_template_definition('messagefeedbackinner-mycategoryposts04'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS05', PoP_ServerUtils::get_template_definition('messagefeedbackinner-mycategoryposts05'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS06', PoP_ServerUtils::get_template_definition('messagefeedbackinner-mycategoryposts06'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS07', PoP_ServerUtils::get_template_definition('messagefeedbackinner-mycategoryposts07'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS08', PoP_ServerUtils::get_template_definition('messagefeedbackinner-mycategoryposts08'));
define ('GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS09', PoP_ServerUtils::get_template_definition('messagefeedbackinner-mycategoryposts09'));

class CPP_Template_Processor_CustomListMessageFeedbackInners extends GD_Template_Processor_MessageFeedbackInnersBase {

	function get_templates_to_process() {
	
		return array(
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS00,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS01,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS02,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS03,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS04,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS05,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS06,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS07,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS08,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS09,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS00,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS01,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS02,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS03,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS04,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS05,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS06,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS07,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS08,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS09,
		);
	}

	function get_layouts($template_id) {

		$ret = parent::get_layouts($template_id);

		$layouts = array(
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS00 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_CATEGORYPOSTS00,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS01 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_CATEGORYPOSTS01,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS02 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_CATEGORYPOSTS02,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS03 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_CATEGORYPOSTS03,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS04 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_CATEGORYPOSTS04,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS05 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_CATEGORYPOSTS05,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS06 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_CATEGORYPOSTS06,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS07 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_CATEGORYPOSTS07,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS08 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_CATEGORYPOSTS08,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_CATEGORYPOSTS09 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_CATEGORYPOSTS09,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS00 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_MYCATEGORYPOSTS00,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS01 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_MYCATEGORYPOSTS01,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS02 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_MYCATEGORYPOSTS02,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS03 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_MYCATEGORYPOSTS03,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS04 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_MYCATEGORYPOSTS04,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS05 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_MYCATEGORYPOSTS05,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS06 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_MYCATEGORYPOSTS06,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS07 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_MYCATEGORYPOSTS07,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS08 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_MYCATEGORYPOSTS08,
			GD_TEMPLATE_MESSAGEFEEDBACKINNER_MYCATEGORYPOSTS09 => GD_TEMPLATE_LAYOUT_MESSAGEFEEDBACKFRAME_MYCATEGORYPOSTS09,
		);

		if ($layout = $layouts[$template_id]) {

			$ret[] = $layout;
		}

		return $ret;
	}
}


/**---------------------------------------------------------------------------------------------------------------
 * Initialization
 * ---------------------------------------------------------------------------------------------------------------*/
new CPP_Template_Processor_CustomListMessageFeedbackInners();