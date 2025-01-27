<?php
use PoP\ComponentModel\State\ApplicationState;

class UREPoP_RoleProcessors_LatestCounts_Hooks
{
    public function __construct()
    {
        \PoP\Root\App::addFilter(
            'latestcounts:author:classes',
            $this->getClasses(...)
        );
    }

    public function getClasses($classes)
    {
        $author = \PoP\Root\App::getState(['routing', 'queried-object-id']);

        // Add all the members of the community, if the author is a community, and we're on the Community+Members page
        if (gdUreIsCommunity($author) && \PoP\Root\App::getState('source') == GD_URLPARAM_URECONTENTSOURCE_COMMUNITY) {
            if ($members = gdUreGetActivecontributingcontentcommunitymembers($author)) {
                foreach ($members as $member) {
                    $classes[] = 'author'.$member;
                }
            }
        }
        return $classes;
    }
}

/**
 * Initialization
 */
new UREPoP_RoleProcessors_LatestCounts_Hooks();
