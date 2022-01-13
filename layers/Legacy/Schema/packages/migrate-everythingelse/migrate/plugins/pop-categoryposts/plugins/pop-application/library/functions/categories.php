<?php
use PoP\Root\Facades\Hooks\HooksAPIFacade;

\PoP\Root\App::getHookManager()->addFilter('getTheMainCategories', 'getCategorypostsTheMainCategories');
function getCategorypostsTheMainCategories($cats)
{
    return array_merge(
        $cats,
        PoP_CategoryPosts_Utils::getCats()
    );
}
