<?php

declare(strict_types=1);

namespace PoPCMSSchema\GenericCustomPosts\ModuleProcessors;

use PoPCMSSchema\CustomPosts\ModuleProcessors\AbstractCustomPostFilterInputContainerModuleProcessor;
use PoPCMSSchema\CustomPosts\ModuleProcessors\FormInputs\FilterInputModuleProcessor as CustomPostFilterInputModuleProcessor;
use PoPCMSSchema\GenericCustomPosts\ModuleProcessors\FormInputs\FilterInputModuleProcessor;
use PoPCMSSchema\SchemaCommons\ModuleProcessors\FormInputs\CommonFilterInputModuleProcessor;

class GenericCustomPostFilterInputContainerModuleProcessor extends AbstractCustomPostFilterInputContainerModuleProcessor
{
    public const HOOK_FILTER_INPUTS = __CLASS__ . ':filter-inputs';

    public final const MODULE_FILTERINPUTCONTAINER_GENERICCUSTOMPOSTLIST = 'filterinputcontainer-genericcustompostlist';
    public final const MODULE_FILTERINPUTCONTAINER_GENERICCUSTOMPOSTCOUNT = 'filterinputcontainer-genericcustompostcount';
    public final const MODULE_FILTERINPUTCONTAINER_ADMINGENERICCUSTOMPOSTLIST = 'filterinputcontainer-admingenericcustompostlist';
    public final const MODULE_FILTERINPUTCONTAINER_ADMINGENERICCUSTOMPOSTCOUNT = 'filterinputcontainer-admingenericcustompostcount';

    public function getModulesToProcess(): array
    {
        return array(
            [self::class, self::MODULE_FILTERINPUTCONTAINER_GENERICCUSTOMPOSTLIST],
            [self::class, self::MODULE_FILTERINPUTCONTAINER_GENERICCUSTOMPOSTCOUNT],
            [self::class, self::MODULE_FILTERINPUTCONTAINER_ADMINGENERICCUSTOMPOSTLIST],
            [self::class, self::MODULE_FILTERINPUTCONTAINER_ADMINGENERICCUSTOMPOSTCOUNT],
        );
    }

    public function getFilterInputModules(array $module): array
    {
        $genericCustomPostFilterInputModules = [
            ...$this->getIDFilterInputModules(),
            [CommonFilterInputModuleProcessor::class, CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_SEARCH],
            [FilterInputModuleProcessor::class, FilterInputModuleProcessor::MODULE_FILTERINPUT_GENERICCUSTOMPOSTTYPES],
        ];
        $adminGenericCustomPostFilterInputModules = [
            [CustomPostFilterInputModuleProcessor::class, CustomPostFilterInputModuleProcessor::MODULE_FILTERINPUT_CUSTOMPOSTSTATUS],
        ];
        $paginationFilterInputModules = $this->getPaginationFilterInputModules();
        return match ($module[1]) {
            self::MODULE_FILTERINPUTCONTAINER_GENERICCUSTOMPOSTLIST=> [
                ...$genericCustomPostFilterInputModules,
                ...$paginationFilterInputModules,
            ],
            self::MODULE_FILTERINPUTCONTAINER_ADMINGENERICCUSTOMPOSTLIST => [
                    ...$genericCustomPostFilterInputModules,
                    ...$adminGenericCustomPostFilterInputModules,
                    ...$paginationFilterInputModules,
                ],
            self::MODULE_FILTERINPUTCONTAINER_GENERICCUSTOMPOSTCOUNT => $genericCustomPostFilterInputModules,
            self::MODULE_FILTERINPUTCONTAINER_ADMINGENERICCUSTOMPOSTCOUNT => [
                ...$genericCustomPostFilterInputModules,
                ...$adminGenericCustomPostFilterInputModules,
            ],
            default => [],
        };
    }

    /**
     * @return string[]
     */
    protected function getFilterInputHookNames(): array
    {
        return [
            ...parent::getFilterInputHookNames(),
            self::HOOK_FILTER_INPUTS,
        ];
    }
}
