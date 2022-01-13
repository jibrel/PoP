<?php
use PoP\Root\Facades\Hooks\HooksAPIFacade;

class PoP_NoSearchCategoryPosts_Module_Processor_ScrollInners extends PoP_Module_Processor_ScrollInnersBase
{
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS00_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts00-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS01_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts01-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS02_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts02-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS03_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts03-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS04_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts04-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS05_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts05-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS06_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts06-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS07_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts07-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS08_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts08-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS09_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts09-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS10_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts10-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS11_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts11-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS12_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts12-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS13_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts13-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS14_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts14-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS15_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts15-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS16_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts16-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS17_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts17-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS18_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts18-simpleview';
    public const MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS19_SIMPLEVIEW = 'scrollinner-nosearchcategoryposts19-simpleview';

    public function getModulesToProcess(): array
    {
        return array(
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS00_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS01_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS02_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS03_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS04_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS05_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS06_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS07_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS08_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS09_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS10_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS11_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS12_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS13_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS14_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS15_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS16_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS17_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS18_SIMPLEVIEW],
            [self::class, self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS19_SIMPLEVIEW],
        );
    }

    public function getLayoutGrid(array $module, array &$props)
    {
        switch ($module[1]) {
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS00_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS01_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS02_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS03_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS04_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS05_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS06_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS07_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS08_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS09_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS10_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS11_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS12_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS13_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS14_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS15_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS16_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS17_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS18_SIMPLEVIEW:
            case self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS19_SIMPLEVIEW:
                return array(
                    'row-items' => 1,
                    'class' => 'col-sm-12'
                );
        }

        return parent::getLayoutGrid($module, $props);
    }

    public function getLayoutSubmodules(array $module)
    {
        $ret = parent::getLayoutSubmodules($module);

        $categories = array(
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS00_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS00,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS01_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS01,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS02_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS02,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS03_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS03,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS04_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS04,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS05_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS05,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS06_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS06,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS07_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS07,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS08_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS08,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS09_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS09,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS10_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS10,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS11_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS11,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS12_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS12,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS13_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS13,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS14_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS14,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS15_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS15,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS16_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS16,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS17_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS17,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS18_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS18,
            self::MODULE_SCROLLINNER_NOSEARCHCATEGORYPOSTS19_SIMPLEVIEW => POP_NOSEARCHCATEGORYPOSTS_CAT_NOSEARCHCATEGORYPOSTS19,
        );

        // Allow PoP Post Category Layouts to add a more specific layout for this category
        if ($layout = \PoP\Root\App::getHookManager()->applyFilters(
            'PoP_NoSearchCategoryPosts_Module_Processor_ScrollInners:layout',
            [PoP_Module_Processor_CustomSimpleViewPreviewPostLayouts::class, PoP_Module_Processor_CustomSimpleViewPreviewPostLayouts::MODULE_LAYOUT_PREVIEWPOST_SIMPLEVIEW],
            $categories[$module[1]]
        )
        ) {
            $ret[] = $layout;
        }

        return $ret;
    }
}


