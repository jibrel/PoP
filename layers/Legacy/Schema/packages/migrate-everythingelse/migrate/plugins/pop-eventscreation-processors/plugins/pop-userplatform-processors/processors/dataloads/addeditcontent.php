<?php
use PoP\Engine\ModuleProcessors\ObjectIDFromURLParamModuleProcessorTrait;
use PoP\Root\Facades\Translation\TranslationAPIFacade;
use PoPCMSSchema\Events\TypeResolvers\ObjectType\EventObjectTypeResolver;
use PoPSitesWassup\EventMutations\MutationResolverBridges\CreateEventMutationResolverBridge;
use PoPSitesWassup\EventMutations\MutationResolverBridges\UpdateEventMutationResolverBridge;

class GD_EM_Module_Processor_CreateUpdatePostDataloads extends PoP_Module_Processor_AddEditContentDataloadsBase
{
    use ObjectIDFromURLParamModuleProcessorTrait;

    public final const MODULE_DATALOAD_EVENT_UPDATE = 'dataload-event-update';
    public final const MODULE_DATALOAD_EVENT_CREATE = 'dataload-event-create';

    public function getModulesToProcess(): array
    {
        return array(
            [self::class, self::MODULE_DATALOAD_EVENT_UPDATE],
            [self::class, self::MODULE_DATALOAD_EVENT_CREATE],
        );
    }

    public function getRelevantRoute(array $module, array &$props): ?string
    {
        return match($module[1]) {
            self::MODULE_DATALOAD_EVENT_CREATE => POP_EVENTSCREATION_ROUTE_ADDEVENT,
            self::MODULE_DATALOAD_EVENT_UPDATE => POP_EVENTSCREATION_ROUTE_EDITEVENT,
            default => parent::getRelevantRoute($module, $props),
        };
    }

    public function getRelevantRouteCheckpointTarget(array $module, array &$props): string
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_EVENT_CREATE:
                return \PoP\ComponentModel\Constants\DataLoading::ACTION_EXECUTION_CHECKPOINTS;
        }

        return parent::getRelevantRouteCheckpointTarget($module, $props);
    }

    protected function getInnerSubmodules(array $module): array
    {
        $ret = parent::getInnerSubmodules($module);

        $inners = array(
            self::MODULE_DATALOAD_EVENT_UPDATE => [GD_EM_Module_Processor_CreateUpdatePostForms::class, GD_EM_Module_Processor_CreateUpdatePostForms::MODULE_FORM_EVENT],
            self::MODULE_DATALOAD_EVENT_CREATE => [GD_EM_Module_Processor_CreateUpdatePostForms::class, GD_EM_Module_Processor_CreateUpdatePostForms::MODULE_FORM_EVENT],
        );
        if ($inner = $inners[$module[1]] ?? null) {
            $ret[] = $inner;
        }

        return $ret;
    }

    protected function isCreate(array $module)
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_EVENT_CREATE:
                return true;
        }

        return parent::isCreate($module);
    }
    protected function isUpdate(array $module)
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_EVENT_UPDATE:
                return true;
        }

        return parent::isUpdate($module);
    }

    public function initModelProps(array $module, array &$props): void
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_EVENT_UPDATE:
            case self::MODULE_DATALOAD_EVENT_CREATE:
                if ($this->isUpdate($module)) {
                    $this->setProp([PoP_ContentCreation_Module_Processor_FeedbackMessageLayouts::class, PoP_ContentCreation_Module_Processor_FeedbackMessageLayouts::MODULE_LAYOUT_FEEDBACKMESSAGE_UPDATECONTENT], $props, 'objectname', TranslationAPIFacade::getInstance()->__('Event', 'pop-evenscreation-processors'));
                } elseif ($this->isCreate($module)) {
                    $this->setProp([PoP_ContentCreation_Module_Processor_FeedbackMessageLayouts::class, PoP_ContentCreation_Module_Processor_FeedbackMessageLayouts::MODULE_LAYOUT_FEEDBACKMESSAGE_CREATECONTENT], $props, 'objectname', TranslationAPIFacade::getInstance()->__('Event', 'pop-evenscreation-processors'));
                }
                break;
        }

        parent::initModelProps($module, $props);
    }

    public function getComponentMutationResolverBridge(array $module): ?\PoP\ComponentModel\MutationResolverBridges\ComponentMutationResolverBridgeInterface
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_EVENT_CREATE:
                return $this->instanceManager->getInstance(CreateEventMutationResolverBridge::class);
            case self::MODULE_DATALOAD_EVENT_UPDATE:
                return $this->instanceManager->getInstance(UpdateEventMutationResolverBridge::class);
        }

        return parent::getComponentMutationResolverBridge($module);
    }

    public function getObjectIDOrIDs(array $module, array &$props, &$data_properties): string | int | array
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_EVENT_UPDATE:
                return $this->getObjectIDFromURLParam($module, $props, $data_properties);
        }
        return parent::getObjectIDOrIDs($module, $props, $data_properties);
    }

    protected function getObjectIDParamName(array $module, array &$props, array &$data_properties): ?string
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_EVENT_UPDATE:
                return \PoPCMSSchema\Posts\Constants\InputNames::POST_ID;
        }
        return null;
    }

    public function getRelationalTypeResolver(array $module): ?\PoP\ComponentModel\TypeResolvers\RelationalTypeResolverInterface
    {
        switch ($module[1]) {
            case self::MODULE_DATALOAD_EVENT_UPDATE:
            case self::MODULE_DATALOAD_EVENT_CREATE:
                return $this->instanceManager->getInstance(EventObjectTypeResolver::class);
        }

        return parent::getRelationalTypeResolver($module);
    }
}


