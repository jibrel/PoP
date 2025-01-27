<?php
/*
Plugin Name: PoP Category Posts Creation
Version: 0.1
Description: The foundation for a PoP Category Posts Creation
Plugin URI: https://getpop.org/
Author: Leonardo Losoviz
*/

//-------------------------------------------------------------------------------------
// Constants Definition
//-------------------------------------------------------------------------------------
define('POP_CATEGORYPOSTSCREATION_VERSION', 0.106);
define('POP_CATEGORYPOSTSCREATION_DIR', dirname(__FILE__));

class PoP_CategoryPostsCreation
{
    public function __construct()
    {

        // Priority: after PoP Posts Creation
        \PoP\Root\App::addAction('plugins_loaded', $this->init(...), 888360);
    }
    public function init()
    {
        if ($this->validate()) {
            $this->initialize();
            define('POP_CATEGORYPOSTSCREATION_INITIALIZED', true);
        }
    }
    public function validate()
    {
        return true;
        include_once 'validation.php';
        $validation = new PoP_CategoryPostsCreation_Validation();
        return $validation->validate();
    }
    public function initialize()
    {
        include_once 'initialization.php';
        $initialization = new PoP_CategoryPostsCreation_Initialization();
        return $initialization->initialize();
    }
}

/**
 * Initialization
 */
new PoP_CategoryPostsCreation();
