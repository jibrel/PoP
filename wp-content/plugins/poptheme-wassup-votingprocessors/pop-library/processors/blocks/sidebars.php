<?php
/**---------------------------------------------------------------------------------------------------------------
 *
 * Template Manager (Handlebars)
 *
 * ---------------------------------------------------------------------------------------------------------------*/

define ('GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_SIDEBAR', PoP_ServerUtils::get_template_definition('block-section-opinionatedvotes-sidebar'));
define ('GD_TEMPLATE_BLOCK_SECTION_MYOPINIONATEDVOTES_SIDEBAR', PoP_ServerUtils::get_template_definition('block-section-myopinionatedvotes-sidebar'));
define ('GD_TEMPLATE_BLOCK_SECTION_AUTHOROPINIONATEDVOTES_SIDEBAR', PoP_ServerUtils::get_template_definition('block-section-authoropinionatedvotes-sidebar'));
define ('GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_AUTHORROLE_SIDEBAR', PoP_ServerUtils::get_template_definition('block-section-opinionatedvotes-authorrole-sidebar'));
define ('GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_STANCE_SIDEBAR', PoP_ServerUtils::get_template_definition('block-section-opinionatedvotes-stance-sidebar'));
define ('GD_TEMPLATE_BLOCK_SECTION_AUTHOROPINIONATEDVOTES_STANCE_SIDEBAR', PoP_ServerUtils::get_template_definition('block-section-authoropinionatedvotes-stance-sidebar'));
define ('GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_GENERALSTANCE_SIDEBAR', PoP_ServerUtils::get_template_definition('block-section-opinionatedvotes-generalstance-sidebar'));

define ('GD_TEMPLATE_BLOCK_SINGLE_OPINIONATEDVOTE_SIDEBAR', PoP_ServerUtils::get_template_definition('block-single-opinionatedvote-sidebar'));

define ('GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_SIDEBAR', PoP_ServerUtils::get_template_definition('block-authoropinionatedvotes-sidebar'));
define ('GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_STANCE_SIDEBAR', PoP_ServerUtils::get_template_definition('block-authoropinionatedvotes-stance-sidebar'));
// define ('GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_PRO_SIDEBAR', PoP_ServerUtils::get_template_definition('block-authoropinionatedvotes-pro-sidebar'));
// define ('GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_NEUTRAL_SIDEBAR', PoP_ServerUtils::get_template_definition('block-authoropinionatedvotes-neutral-sidebar'));
// define ('GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_AGAINST_SIDEBAR', PoP_ServerUtils::get_template_definition('block-authoropinionatedvotes-against-sidebar'));

class VotingProcessors_Template_Processor_CustomSidebarBlocks extends GD_Template_Processor_CustomSidebarBlocksBase {

	function get_templates_to_process() {
	
		return array(
			GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_SIDEBAR,
			GD_TEMPLATE_BLOCK_SECTION_MYOPINIONATEDVOTES_SIDEBAR,
			GD_TEMPLATE_BLOCK_SECTION_AUTHOROPINIONATEDVOTES_SIDEBAR,
			GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_AUTHORROLE_SIDEBAR,
			GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_STANCE_SIDEBAR,
			GD_TEMPLATE_BLOCK_SECTION_AUTHOROPINIONATEDVOTES_STANCE_SIDEBAR,
			GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_GENERALSTANCE_SIDEBAR,
			GD_TEMPLATE_BLOCK_SINGLE_OPINIONATEDVOTE_SIDEBAR,
			GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_SIDEBAR,
			GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_STANCE_SIDEBAR,
			// GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_PRO_SIDEBAR,
			// GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_NEUTRAL_SIDEBAR,
			// GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_AGAINST_SIDEBAR,
		);
	}

	function get_filter_template($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_SIDEBAR:

				return GD_TEMPLATE_FILTER_OPINIONATEDVOTES;

			case GD_TEMPLATE_BLOCK_SECTION_MYOPINIONATEDVOTES_SIDEBAR:

				return GD_TEMPLATE_FILTER_MYOPINIONATEDVOTES;

			case GD_TEMPLATE_BLOCK_SECTION_AUTHOROPINIONATEDVOTES_SIDEBAR:

				return GD_TEMPLATE_FILTER_AUTHOROPINIONATEDVOTES;

			case GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_AUTHORROLE_SIDEBAR:

				return GD_TEMPLATE_FILTER_OPINIONATEDVOTES_AUTHORROLE;

			case GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_STANCE_SIDEBAR:

				return GD_TEMPLATE_FILTER_OPINIONATEDVOTES_STANCE;

			case GD_TEMPLATE_BLOCK_SECTION_AUTHOROPINIONATEDVOTES_STANCE_SIDEBAR:

				return GD_TEMPLATE_FILTER_AUTHOROPINIONATEDVOTES_STANCE;

			case GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_GENERALSTANCE_SIDEBAR:

				return GD_TEMPLATE_FILTER_OPINIONATEDVOTES_GENERALSTANCE;

			case GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_SIDEBAR:
				
				return GD_TEMPLATE_FILTER_AUTHOROPINIONATEDVOTES;

			case GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_STANCE_SIDEBAR:
			// case GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_PRO_SIDEBAR:
			// case GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_NEUTRAL_SIDEBAR:
			// case GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_AGAINST_SIDEBAR:

				return GD_TEMPLATE_FILTER_AUTHOROPINIONATEDVOTES_STANCE;
		}
		
		return parent::get_filter_template($template_id);
	}

	protected function get_block_inner_templates($template_id) {

		$ret = parent::get_block_inner_templates($template_id);

		$orientation = apply_filters(POP_HOOK_BLOCKSIDEBARS_ORIENTATION, 'vertical');
		$vertical = ($orientation == 'vertical');

		$block_inners = array(
			GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_OPINIONATEDVOTES,
			GD_TEMPLATE_BLOCK_SECTION_MYOPINIONATEDVOTES_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_MYOPINIONATEDVOTES,
			GD_TEMPLATE_BLOCK_SECTION_AUTHOROPINIONATEDVOTES_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_AUTHOROPINIONATEDVOTES,
			GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_AUTHORROLE_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_OPINIONATEDVOTES_AUTHORROLE,
			GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_STANCE_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_OPINIONATEDVOTES_STANCE,
			GD_TEMPLATE_BLOCK_SECTION_AUTHOROPINIONATEDVOTES_STANCE_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_AUTHOROPINIONATEDVOTES_STANCE,
			GD_TEMPLATE_BLOCK_SECTION_OPINIONATEDVOTES_GENERALSTANCE_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_OPINIONATEDVOTES_GENERALSTANCE,
			GD_TEMPLATE_BLOCK_SINGLE_OPINIONATEDVOTE_SIDEBAR => $vertical ? GD_TEMPLATE_VERTICALSIDEBAR_SINGLE_OPINIONATEDVOTE : GD_TEMPLATE_LAYOUT_POSTSIDEBAR_HORIZONTAL_OPINIONATEDVOTE,
			GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_AUTHOROPINIONATEDVOTES,
			GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_STANCE_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_AUTHOROPINIONATEDVOTES_STANCE,
			// GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_PRO_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_AUTHOROPINIONATEDVOTES_PRO,
			// GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_NEUTRAL_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_AUTHOROPINIONATEDVOTES_NEUTRAL,
			// GD_TEMPLATE_BLOCK_AUTHOROPINIONATEDVOTES_AGAINST_SIDEBAR => GD_TEMPLATE_SIDEBAR_SECTION_AUTHOROPINIONATEDVOTES_AGAINST,
		);

		if ($block_inner = $block_inners[$template_id]) {

			$ret[] = $block_inner;
		}
	
		return $ret;
	}

	function get_dataloader($template_id) {

		switch ($template_id) {
					
			case GD_TEMPLATE_BLOCK_SINGLE_OPINIONATEDVOTE_SIDEBAR:

				return GD_DATALOADER_SINGLE;
		}
		
		return parent::get_dataloader($template_id);
	}
}


/**---------------------------------------------------------------------------------------------------------------
 * Initialization
 * ---------------------------------------------------------------------------------------------------------------*/
new VotingProcessors_Template_Processor_CustomSidebarBlocks();