<?php
use PoPCMSSchema\Pages\TypeResolvers\ObjectType\PageObjectTypeResolver;

abstract class PoP_Module_Processor_PageContentDataloadsBase extends PoP_Module_Processor_DataloadsBase
{
    public function getRelationalTypeResolver(array $module): ?\PoP\ComponentModel\TypeResolvers\RelationalTypeResolverInterface
    {
        return $this->instanceManager->getInstance(PageObjectTypeResolver::class);
    }

    public function getPage(array $module, array &$props)
    {
        return null;
    }

    protected function getImmutableDataloadQueryArgs(array $module, array &$props): array
    {
        $ret = parent::getImmutableDataloadQueryArgs($module, $props);
        if ($page = $this->getPage($module, $props)) {
            $ret['include'] = [$page];
        }
        return $ret;
    }

    public function getDatasource(array $module, array &$props): string
    {
        return \PoP\ComponentModel\Constants\DataSources::IMMUTABLE;
    }

    protected function getContentSubmodule(array $module)
    {
        return [PoP_Module_Processor_Contents::class, PoP_Module_Processor_Contents::MODULE_CONTENT_PAGECONTENT];
    }

    protected function getInnerSubmodules(array $module): array
    {
        $ret = parent::getInnerSubmodules($module);
        $ret[] = $this->getContentSubmodule($module);
        return $ret;
    }
}
