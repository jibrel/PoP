<?php
use PoP\Translation\Facades\TranslationAPIFacade;

class GD_URE_FormInput_FilterMemberPrivileges extends GD_URE_FormInput_MemberPrivileges
{
    public function getAllValues($label = null)
    {
        $values = parent::getAllValues($label);
        
        // Add the 'none' value
        $values[GD_METAVALUE_NONE] = TranslationAPIFacade::getInstance()->__('(None)', 'ure-popprocessors');
        
        return $values;
    }
}
