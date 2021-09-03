<?php
use PoPSchema\Locations\TypeResolvers\Object\LocationTypeResolver;

abstract class PoP_Module_Processor_LocationTriggerLayoutFormComponentValuesBase extends PoP_Module_Processor_TriggerLayoutFormComponentValuesBase
{
    public function getTriggerTypeResolverClass(array $module): ?string
    {
        return LocationTypeResolver::class;
    }
}
