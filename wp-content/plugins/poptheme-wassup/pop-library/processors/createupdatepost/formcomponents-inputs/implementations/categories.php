<?php

/**---------------------------------------------------------------------------------------------------------------
 *
 * GD FormInput Categories
 *
 * ---------------------------------------------------------------------------------------------------------------*/

class GD_FormInput_Categories extends GD_FormInput_MultiSelect {
	
	function get_all_values($label = null) {

		$values = parent::get_all_values($label);
		
		// The values here must be input from outside, to allow any potential website to add their own LinkCategories conveniently
		$values = array_merge(	
			$values, 
			apply_filters('wassup_categories', array())
		);		
		
		return $values;
	}		
}
