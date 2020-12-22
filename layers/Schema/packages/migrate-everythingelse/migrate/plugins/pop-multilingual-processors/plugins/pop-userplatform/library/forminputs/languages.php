<?php

class GD_QT_FormInput_Languages extends \PoP\Engine\GD_FormInput_Select
{
    public function getAllValues($label = null)
    {
        $values = parent::getAllValues($label);

        // Code copied from wp-content/plugins/qtranslate/qtranslate_widget.php
        $pluginapi = PoP_Multilingual_FunctionsAPIFactory::getInstance();
        $sorted_languages = $pluginapi->getEnabledLanguages();
        array_multisort($sorted_languages);
        foreach ($sorted_languages as $language) {
            $values[$language] = $pluginapi->getLanguageName($language);
        }
        
        return $values;
    }
    
    public function getDefaultValue()
    {
        $pluginapi = PoP_Multilingual_FunctionsAPIFactory::getInstance();
        return $pluginapi->getCurrentLanguage();
    }
}
