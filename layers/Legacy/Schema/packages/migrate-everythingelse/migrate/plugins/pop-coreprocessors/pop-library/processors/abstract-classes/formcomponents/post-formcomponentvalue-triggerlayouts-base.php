<?php
use PoPSchema\CustomPosts\TypeHelpers\CustomPostUnionTypeHelpers;
use PoPSchema\CustomPosts\TypeResolvers\Object\CustomPostUnionTypeResolver;

abstract class PoP_Module_Processor_PostTriggerLayoutFormComponentValuesBase extends PoP_Module_Processor_TriggerLayoutFormComponentValuesBase
{
    public function getTriggerTypeResolverClass(array $module): ?string
    {
        return CustomPostUnionTypeHelpers::getCustomPostUnionOrTargetObjectTypeResolverClass(CustomPostUnionTypeResolver::class);
    }
}
