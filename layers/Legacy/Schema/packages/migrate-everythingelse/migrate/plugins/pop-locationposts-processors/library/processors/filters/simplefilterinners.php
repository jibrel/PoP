<?php

class PoP_LocationPosts_Module_Processor_CustomSimpleFilterInners extends PoP_Module_Processor_SimpleFilterInnersBase
{
    public final const MODULE_SIMPLEFILTERINPUTCONTAINER_LOCATIONPOSTS = 'simplefilterinputcontainer-locationposts';
    public final const MODULE_SIMPLEFILTERINPUTCONTAINER_AUTHORLOCATIONPOSTS = 'simplefilterinputcontainer-authorlocationposts';
    public final const MODULE_SIMPLEFILTERINPUTCONTAINER_TAGLOCATIONPOSTS = 'simplefilterinputcontainer-taglocationposts';

    public function getModulesToProcess(): array
    {
        return array(
            [self::class, self::MODULE_SIMPLEFILTERINPUTCONTAINER_LOCATIONPOSTS],
            [self::class, self::MODULE_SIMPLEFILTERINPUTCONTAINER_AUTHORLOCATIONPOSTS],
            [self::class, self::MODULE_SIMPLEFILTERINPUTCONTAINER_TAGLOCATIONPOSTS],
        );
    }

    protected function getInputSubmodules(array $module)
    {
        $ret = parent::getInputSubmodules($module);

        $inputmodules = [
            self::MODULE_SIMPLEFILTERINPUTCONTAINER_LOCATIONPOSTS => [
                [PoP_Module_Processor_TextFilterInputs::class, PoP_Module_Processor_TextFilterInputs::MODULE_FILTERINPUT_SEARCH],
                [PoP_Module_Processor_TextFilterInputs::class, PoP_Module_Processor_TextFilterInputs::MODULE_FILTERINPUT_HASHTAGS],
                [PoP_Module_Processor_UserSelectableTypeaheadFilterInputs::class, PoP_Module_Processor_UserSelectableTypeaheadFilterInputs::MODULE_FILTERCOMPONENT_SELECTABLETYPEAHEAD_PROFILES],
                [PoP_Module_Processor_DateRangeComponentFilterInputs::class, PoP_Module_Processor_DateRangeComponentFilterInputs::MODULE_FILTERINPUT_CUSTOMPOSTDATES],
                [PoP_Module_Processor_SelectFilterInputs::class, PoP_Module_Processor_SelectFilterInputs::MODULE_FILTERINPUT_ORDERPOST],
            ],
            self::MODULE_SIMPLEFILTERINPUTCONTAINER_AUTHORLOCATIONPOSTS => [
                [PoP_Module_Processor_TextFilterInputs::class, PoP_Module_Processor_TextFilterInputs::MODULE_FILTERINPUT_SEARCH],
                [PoP_Module_Processor_TextFilterInputs::class, PoP_Module_Processor_TextFilterInputs::MODULE_FILTERINPUT_HASHTAGS],
                [PoP_Module_Processor_DateRangeComponentFilterInputs::class, PoP_Module_Processor_DateRangeComponentFilterInputs::MODULE_FILTERINPUT_CUSTOMPOSTDATES],
                [PoP_Module_Processor_SelectFilterInputs::class, PoP_Module_Processor_SelectFilterInputs::MODULE_FILTERINPUT_ORDERPOST],
            ],
            self::MODULE_SIMPLEFILTERINPUTCONTAINER_TAGLOCATIONPOSTS => [
                [PoP_Module_Processor_TextFilterInputs::class, PoP_Module_Processor_TextFilterInputs::MODULE_FILTERINPUT_SEARCH],
                [PoP_Module_Processor_UserSelectableTypeaheadFilterInputs::class, PoP_Module_Processor_UserSelectableTypeaheadFilterInputs::MODULE_FILTERCOMPONENT_SELECTABLETYPEAHEAD_PROFILES],
                [PoP_Module_Processor_DateRangeComponentFilterInputs::class, PoP_Module_Processor_DateRangeComponentFilterInputs::MODULE_FILTERINPUT_CUSTOMPOSTDATES],
                [PoP_Module_Processor_SelectFilterInputs::class, PoP_Module_Processor_SelectFilterInputs::MODULE_FILTERINPUT_ORDERPOST],
            ],
        ];
        if ($modules = \PoP\Root\App::applyFilters(
            'Locations:SimpleFilterInners:inputmodules',
            $inputmodules[$module[1]],
            $module
        )) {
            $ret = array_merge(
                $ret,
                $modules
            );
        }
        return $ret;
    }

    // public function getFilter(array $module)
    // {
    //     $filters = array(
    //         self::MODULE_SIMPLEFILTERINPUTCONTAINER_LOCATIONPOSTS => POP_FILTER_LOCATIONPOSTS,
    //         self::MODULE_SIMPLEFILTERINPUTCONTAINER_AUTHORLOCATIONPOSTS => POP_FILTER_AUTHORLOCATIONPOSTS,
    //         self::MODULE_SIMPLEFILTERINPUTCONTAINER_TAGLOCATIONPOSTS => POP_FILTER_TAGLOCATIONPOSTS,
    //     );
    //     if ($filter = $filters[$module[1]] ?? null) {
    //         return $filter;
    //     }

    //     return parent::getFilter($module);
    // }
}



