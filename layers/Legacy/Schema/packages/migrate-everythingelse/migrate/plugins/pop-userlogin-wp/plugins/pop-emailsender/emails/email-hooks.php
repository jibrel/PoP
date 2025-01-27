<?php

class PoP_UserLoginWP_WP_EmailSender_Hooks
{
    public function __construct()
    {
        //----------------------------------------------------------------------
        // Functional emails
        //----------------------------------------------------------------------
        \PoP\Root\App::addAction('retrieve_password_key', $this->retrievePasswordKey(...));
        \PoP\Root\App::addFilter('send_password_change_email', $this->donotsend(...), PHP_INT_MAX, 1);
        \PoP\Root\App::addFilter('send_email_change_email', $this->donotsend(...), PHP_INT_MAX, 1);
    }

    public function retrievePasswordKey()
    {
        \PoP\Root\App::addFilter('wp_mail_content_type', $this->setHtmlContentType(...));
    }
    public function setHtmlContentType($content_type)
    {
        return 'text/html';
    }

    // Do not send an email when the user changes the password
    public function donotsend($send)
    {
        // Returning in such a weird fashion, because on file wp-includes/user.php from WP 4.3.1 it validates like this:
        // if ( ! empty( $send_email_change_email ) ) {
        return array();
    }
}

/**
 * Initialization
 */
new PoP_UserLoginWP_WP_EmailSender_Hooks();
