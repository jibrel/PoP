<?php

declare(strict_types=1);

namespace PoPSchema\Posts\ModuleProcessors;

use PoP\ComponentModel\ModuleProcessors\AbstractFilterDataModuleProcessor;
use PoPSchema\CustomPosts\ModuleProcessors\FormInputs\FilterInputModuleProcessor;
use PoPSchema\SchemaCommons\ModuleProcessors\FormInputs\CommonFilterInputModuleProcessor;
use PoPSchema\SchemaCommons\ModuleProcessors\FormInputs\CommonFilterMultipleInputModuleProcessor;

abstract class AbstractFilterInputContainerModuleProcessor extends AbstractFilterDataModuleProcessor
{
    public const HOOK_FILTER_INPUTS = __CLASS__ . ':filter-inputs';

    public const MODULE_FILTERINNER_POSTS = 'filterinner-posts';
    public const MODULE_FILTERINNER_POSTCOUNT = 'filterinner-postcount';
    public const MODULE_FILTERINNER_ADMINPOSTS = 'filterinner-adminposts';
    public const MODULE_FILTERINNER_ADMINPOSTCOUNT = 'filterinner-adminpostcount';

    public function getModulesToProcess(): array
    {
        return array(
            [self::class, self::MODULE_FILTERINNER_POSTS],
            [self::class, self::MODULE_FILTERINNER_POSTCOUNT],
            [self::class, self::MODULE_FILTERINNER_ADMINPOSTS],
            [self::class, self::MODULE_FILTERINNER_ADMINPOSTCOUNT],
        );
    }

    public function getSubmodules(array $module): array
    {
        $ret = parent::getSubmodules($module);

        $postListModules = [
            [CommonFilterInputModuleProcessor::class, CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_SEARCH],
            [CommonFilterInputModuleProcessor::class, CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_ORDER],
            [CommonFilterInputModuleProcessor::class, CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_LIMIT],
            [CommonFilterInputModuleProcessor::class, CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_OFFSET],
            [CommonFilterMultipleInputModuleProcessor::class, CommonFilterMultipleInputModuleProcessor::MODULE_FILTERINPUT_DATES],
            [CommonFilterInputModuleProcessor::class, CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_IDS],
            [CommonFilterInputModuleProcessor::class, CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_ID],
        ];
        $postCountModules = [
            [CommonFilterInputModuleProcessor::class, CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_SEARCH],
            [CommonFilterMultipleInputModuleProcessor::class, CommonFilterMultipleInputModuleProcessor::MODULE_FILTERINPUT_DATES],
            [CommonFilterInputModuleProcessor::class, CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_IDS],
            [CommonFilterInputModuleProcessor::class, CommonFilterInputModuleProcessor::MODULE_FILTERINPUT_ID],
        ];
        $statusModule = [FilterInputModuleProcessor::class, FilterInputModuleProcessor::MODULE_FILTERINPUT_CUSTOMPOSTSTATUS];
        $inputmodules = [
            self::MODULE_FILTERINNER_POSTS => $postListModules,
            self::MODULE_FILTERINNER_POSTCOUNT => $postCountModules,
            self::MODULE_FILTERINNER_ADMINPOSTS => [
                ...$postListModules,
                $statusModule,
            ],
            self::MODULE_FILTERINNER_ADMINPOSTCOUNT => [
                ...$postCountModules,
                $statusModule,
            ],
        ];
        // Enable extensions to add more FilterInputs
        $modules = $inputmodules[$module[1]] ?? [];
        foreach ($this->getFilterInputHookNames() as $filterInputHookName) {
            $modules = $this->hooksAPI->applyFilters(
                $filterInputHookName,
                $modules,
                $module
            );
        }
        return array_merge(
            $ret,
            $modules
        );
    }

    /**
     * @return string[]
     */
    public function getFilterInputHookNames(): array
    {
        return [
            static::HOOK_FILTER_INPUTS,
        ];
    }
}
