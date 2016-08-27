<?php
/**---------------------------------------------------------------------------------------------------------------
 *
 * Template Manager (Handlebars)
 *
 * ---------------------------------------------------------------------------------------------------------------*/

define ('GD_TEMPLATE_BLOCKGROUP_SECTION_SEARCHPOSTS_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-searchposts-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SECTION_ALLCONTENT_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-allcontent-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SECTION_WEBPOSTLINKS_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-webpostlinks-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SECTION_HIGHLIGHTS_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-highlights-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SECTION_WEBPOSTS_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-webposts-sidebar'));

define ('GD_TEMPLATE_BLOCKGROUP_SECTION_SEARCHUSERS_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-searchusers-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SECTION_ALLUSERS_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-allusers-sidebar'));

define ('GD_TEMPLATE_BLOCKGROUP_SECTION_TRENDINGTAGS_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-trendingtags-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SECTION_TAGS_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-tags-sidebar'));

define ('GD_TEMPLATE_BLOCKGROUP_SECTION_MYCONTENT_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-mycontent-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SECTION_MYWEBPOSTLINKS_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-mywebpostlinks-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SECTION_MYHIGHLIGHTS_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-myhighlights-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SECTION_MYWEBPOSTS_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-section-mywebposts-sidebar'));

define ('GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOSTLINK_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-single-webpostlink-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SINGLE_HIGHLIGHT_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-single-highlight-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-single-webpost-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RELATEDCONTENTSIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-single-webpost-relatedcontentsidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_HIGHLIGHTSSIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-single-webpost-highlightssidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_POSTAUTHORSSIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-single-webpost-postauthorssidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RECOMMENDEDBYSIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-single-webpost-recommendedbysidebar'));

define ('GD_TEMPLATE_BLOCKGROUP_HOMESECTION_ALLCONTENT_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-homesection-allcontent-sidebar'));
define ('GD_TEMPLATE_BLOCKGROUP_TAGSECTION_ALLCONTENT_SIDEBAR', PoP_ServerUtils::get_template_definition('blockgroup-tagsection-allcontent-sidebar'));

class GD_Template_Processor_SidebarBlockGroups extends GD_Template_Processor_SidebarBlockGroupsBase {

	function get_templates_to_process() {
	
		return array(
			GD_TEMPLATE_BLOCKGROUP_SECTION_SEARCHPOSTS_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_ALLCONTENT_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_WEBPOSTLINKS_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_HIGHLIGHTS_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_WEBPOSTS_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_SEARCHUSERS_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_ALLUSERS_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_TRENDINGTAGS_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_TAGS_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_MYCONTENT_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_MYWEBPOSTLINKS_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_MYHIGHLIGHTS_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SECTION_MYWEBPOSTS_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOSTLINK_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_HIGHLIGHT_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RELATEDCONTENTSIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_HIGHLIGHTSSIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_POSTAUTHORSSIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RECOMMENDEDBYSIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_HOMESECTION_ALLCONTENT_SIDEBAR,
			GD_TEMPLATE_BLOCKGROUP_TAGSECTION_ALLCONTENT_SIDEBAR,
		);
	}

	function get_inner_blocks($template_id) {

		$ret = parent::get_inner_blocks($template_id);

		switch ($template_id) {

			// Add also the filter block for the Single Related Content, etc
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RELATEDCONTENTSIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_HIGHLIGHTSSIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_POSTAUTHORSSIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RECOMMENDEDBYSIDEBAR:

				$filters = array(
					GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RELATEDCONTENTSIDEBAR => GD_TEMPLATE_BLOCK_SECTION_ALLCONTENT_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_HIGHLIGHTSSIDEBAR => GD_TEMPLATE_BLOCK_SECTION_HIGHLIGHTS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_POSTAUTHORSSIDEBAR => GD_TEMPLATE_BLOCK_SECTION_ALLUSERS_NOFILTERSIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RECOMMENDEDBYSIDEBAR => GD_TEMPLATE_BLOCK_SECTION_ALLUSERS_SIDEBAR,
				);
				$ret[] = $filters[$template_id];
				$ret[] = GD_TEMPLATE_BLOCK_SINGLE_WEBPOST_SIDEBAR;
				break;
			
			default:
				
				$blocks = array(
					GD_TEMPLATE_BLOCKGROUP_SECTION_SEARCHPOSTS_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_SEARCHPOSTS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_ALLCONTENT_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_ALLCONTENT_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_WEBPOSTLINKS_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_WEBPOSTLINKS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_HIGHLIGHTS_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_HIGHLIGHTS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_WEBPOSTS_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_WEBPOSTS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_SEARCHUSERS_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_SEARCHUSERS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_ALLUSERS_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_ALLUSERS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_TRENDINGTAGS_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_TRENDINGTAGS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_TAGS_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_TAGS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_MYCONTENT_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_MYCONTENT_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_MYWEBPOSTLINKS_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_MYWEBPOSTLINKS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_MYHIGHLIGHTS_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_MYHIGHLIGHTS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SECTION_MYWEBPOSTS_SIDEBAR => GD_TEMPLATE_BLOCK_SECTION_MYWEBPOSTS_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOSTLINK_SIDEBAR => GD_TEMPLATE_BLOCK_SINGLE_WEBPOSTLINK_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SINGLE_HIGHLIGHT_SIDEBAR => GD_TEMPLATE_BLOCK_SINGLE_HIGHLIGHT_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_SIDEBAR => GD_TEMPLATE_BLOCK_SINGLE_WEBPOST_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_HOMESECTION_ALLCONTENT_SIDEBAR => GD_TEMPLATE_BLOCK_HOMESECTION_ALLCONTENT_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_TAGSECTION_ALLCONTENT_SIDEBAR => GD_TEMPLATE_BLOCK_TAGSECTION_ALLCONTENT_SIDEBAR,
				);
				if ($block = $blocks[$template_id]) {

					$ret[] = $block;
				}
				break;
		}

		return $ret;
	}

	function get_screen($template_id) {

		$screens = array(
			GD_TEMPLATE_BLOCKGROUP_SECTION_SEARCHPOSTS_SIDEBAR => POP_SCREEN_SECTION,
			GD_TEMPLATE_BLOCKGROUP_SECTION_ALLCONTENT_SIDEBAR => POP_SCREEN_SECTION,
			GD_TEMPLATE_BLOCKGROUP_SECTION_WEBPOSTLINKS_SIDEBAR => POP_SCREEN_SECTION,
			GD_TEMPLATE_BLOCKGROUP_SECTION_HIGHLIGHTS_SIDEBAR => POP_SCREEN_HIGHLIGHTS,
			GD_TEMPLATE_BLOCKGROUP_SECTION_WEBPOSTS_SIDEBAR => POP_SCREEN_SECTION,
			GD_TEMPLATE_BLOCKGROUP_SECTION_SEARCHUSERS_SIDEBAR => POP_SCREEN_USERS,
			GD_TEMPLATE_BLOCKGROUP_SECTION_ALLUSERS_SIDEBAR => POP_SCREEN_USERS,
			GD_TEMPLATE_BLOCKGROUP_SECTION_TRENDINGTAGS_SIDEBAR => POP_SCREEN_TAGS,
			GD_TEMPLATE_BLOCKGROUP_SECTION_TAGS_SIDEBAR => POP_SCREEN_TAGS,
			GD_TEMPLATE_BLOCKGROUP_SECTION_MYCONTENT_SIDEBAR => POP_SCREEN_MYCONTENT,
			GD_TEMPLATE_BLOCKGROUP_SECTION_MYWEBPOSTLINKS_SIDEBAR => POP_SCREEN_MYCONTENT,
			GD_TEMPLATE_BLOCKGROUP_SECTION_MYHIGHLIGHTS_SIDEBAR => POP_SCREEN_MYHIGHLIGHTS,
			GD_TEMPLATE_BLOCKGROUP_SECTION_MYWEBPOSTS_SIDEBAR => POP_SCREEN_MYCONTENT,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOSTLINK_SIDEBAR => POP_SCREEN_SINGLE,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_HIGHLIGHT_SIDEBAR => POP_SCREEN_SINGLE,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_SIDEBAR => POP_SCREEN_SINGLE,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RELATEDCONTENTSIDEBAR => POP_SCREEN_SINGLESECTION,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_HIGHLIGHTSSIDEBAR => POP_SCREEN_SINGLEHIGHLIGHTS,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_POSTAUTHORSSIDEBAR => POP_SCREEN_SINGLEUSERS,
			GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RECOMMENDEDBYSIDEBAR => POP_SCREEN_SINGLEUSERS,
			GD_TEMPLATE_BLOCKGROUP_HOMESECTION_ALLCONTENT_SIDEBAR => POP_SCREEN_HOMESECTION,
			GD_TEMPLATE_BLOCKGROUP_TAGSECTION_ALLCONTENT_SIDEBAR => POP_SCREEN_TAGSECTION,
		);
		if ($screen = $screens[$template_id]) {

			return $screen;
		}
		
		return parent::get_screen($template_id);
	}

	function get_screengroup($template_id) {

		switch ($template_id) {

			case GD_TEMPLATE_BLOCKGROUP_SECTION_SEARCHPOSTS_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SECTION_ALLCONTENT_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SECTION_WEBPOSTLINKS_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SECTION_HIGHLIGHTS_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SECTION_WEBPOSTS_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SECTION_SEARCHUSERS_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SECTION_ALLUSERS_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SECTION_TRENDINGTAGS_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SECTION_TAGS_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOSTLINK_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_HIGHLIGHT_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RELATEDCONTENTSIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_HIGHLIGHTSSIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_POSTAUTHORSSIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_RECOMMENDEDBYSIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_HOMESECTION_ALLCONTENT_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_TAGSECTION_ALLCONTENT_SIDEBAR:

				return POP_SCREENGROUP_CONTENTREAD;

			case GD_TEMPLATE_BLOCKGROUP_SECTION_MYCONTENT_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SECTION_MYWEBPOSTLINKS_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SECTION_MYHIGHLIGHTS_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SECTION_MYWEBPOSTS_SIDEBAR:
			
				return POP_SCREENGROUP_CONTENTWRITE;
		}
		
		return parent::get_screengroup($template_id);
	}

	function init_atts_blockgroup_block($blockgroup, $blockgroup_block, &$blockgroup_block_atts, $blockgroup_atts) {

		switch ($blockgroup) {

			case GD_TEMPLATE_BLOCKGROUP_HOMESECTION_ALLCONTENT_SIDEBAR:

				switch ($blockgroup_block) {

					case GD_TEMPLATE_BLOCK_HOMESECTION_ALLCONTENT_SIDEBAR:

						$mainblock_taget = '#'.GD_TEMPLATEID_PAGESECTIONID_MAIN.' .pop-pagesection-page.toplevel.active > .blockgroup-home > .blocksection-extensions > .pop-block.withfilter';

						// Make the block be collapsible, open it when the main feed is reached, with waypoints
						$this->append_att($blockgroup_block, $blockgroup_block_atts, 'class', 'collapse');
						$this->merge_att($blockgroup_block, $blockgroup_block_atts, 'params', array(
							'data-collapse-target' => $mainblock_taget
						));
						$this->merge_block_jsmethod_att($blockgroup_block, $blockgroup_block_atts, array('waypointsToggleCollapse'));
						break;
				}
				break;

			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOSTLINK_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_HIGHLIGHT_SIDEBAR:
			case GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_SIDEBAR:

				$inners = array(
					GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOSTLINK_SIDEBAR => GD_TEMPLATE_BLOCK_SINGLE_WEBPOSTLINK_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SINGLE_HIGHLIGHT_SIDEBAR => GD_TEMPLATE_BLOCK_SINGLE_HIGHLIGHT_SIDEBAR,
					GD_TEMPLATE_BLOCKGROUP_SINGLE_WEBPOST_SIDEBAR => GD_TEMPLATE_BLOCK_SINGLE_WEBPOST_SIDEBAR,
				);
				if ($inners[$blockgroup] == $blockgroup_block) {

					$mainblock_taget = '#'.GD_TEMPLATEID_PAGESECTIONID_MAIN.' .pop-pagesection-page.toplevel.active > .blockgroup-singlepost > .blocksection-extensions > .pop-block > .blocksection-inners > .content-single';

					// Make the block be collapsible, open it when the main feed is reached, with waypoints
					$this->append_att($blockgroup_block, $blockgroup_block_atts, 'class', 'collapse');
					$this->merge_att($blockgroup_block, $blockgroup_block_atts, 'params', array(
						'data-collapse-target' => $mainblock_taget
					));
					$this->merge_block_jsmethod_att($blockgroup_block, $blockgroup_block_atts, array('waypointsToggleCollapse'));
				}
				break;
		}

		return parent::init_atts_blockgroup_block($blockgroup, $blockgroup_block, $blockgroup_block_atts, $blockgroup_atts);
	}
}

/**---------------------------------------------------------------------------------------------------------------
 * Initialization
 * ---------------------------------------------------------------------------------------------------------------*/
new GD_Template_Processor_SidebarBlockGroups();
