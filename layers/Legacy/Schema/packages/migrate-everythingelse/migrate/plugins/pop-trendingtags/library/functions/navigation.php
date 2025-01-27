<?php
use PoP\Root\Facades\Translation\TranslationAPIFacade;

\PoP\Root\App::addFilter(
    'route:icon', 
    function($icon, $route, $html = true) {
        switch ($route) {
            case POP_TRENDINGTAGS_ROUTE_TRENDINGTAGS:
                $fontawesome = 'fa-hashtag';
                break;
        }

        return processIcon($icon, $fontawesome, $html);
    }, 
    10, 
    3
);

\PoP\Root\App::addFilter(
    'route:title', 
    function($title, $route) {
        $titles = [
            POP_TRENDINGTAGS_ROUTE_TRENDINGTAGS => TranslationAPIFacade::getInstance()->__('Trending', 'pop-trendingtags'),
        ];
        return $titles[$route] ?? $title;
    }, 
    10, 
    2
);

