<?php
/**---------------------------------------------------------------------------------------------------------------
 *
 * Data Load Library
 *
 * ---------------------------------------------------------------------------------------------------------------*/

define ('GD_DATALOADER_USERFOLLOWSUSERS', 'user-followsusers');
 
class GD_DataLoader_UserFollowsUsers extends GD_DataLoader_User {

	function get_name() {
    
		return GD_DATALOADER_USERFOLLOWSUSERS;
	}
	
	function get_data_ids($vars = array(), $is_main_query = false) {
	
		return GD_MetaManager::get_user_meta(get_current_user_id(), GD_METAKEY_PROFILE_FOLLOWSUSERS);
	}
}
	
/**---------------------------------------------------------------------------------------------------------------
 * Initialize
 * ---------------------------------------------------------------------------------------------------------------*/
new GD_DataLoader_UserFollowsUsers();