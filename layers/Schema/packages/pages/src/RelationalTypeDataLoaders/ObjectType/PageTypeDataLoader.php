<?php

declare(strict_types=1);

namespace PoPSchema\Pages\RelationalTypeDataLoaders\ObjectType;

use PoP\Hooks\HooksAPIInterface;
use PoP\ComponentModel\Instances\InstanceManagerInterface;
use PoP\LooseContracts\NameResolverInterface;
use PoP\ComponentModel\ModuleProcessors\ModuleProcessorManagerInterface;
use PoPSchema\CustomPosts\TypeAPIs\CustomPostTypeAPIInterface;
use PoPSchema\CustomPosts\RelationalTypeDataLoaders\ObjectType\AbstractCustomPostTypeDataLoader;
use PoPSchema\Pages\TypeAPIs\PageTypeAPIInterface;

class PageTypeDataLoader extends AbstractCustomPostTypeDataLoader
{
    protected PageTypeAPIInterface $pageTypeAPI;
    public function __construct(
        PageTypeAPIInterface $pageTypeAPI,
    ) {
        $this->pageTypeAPI = $pageTypeAPI;
        }

    public function executeQuery($query, array $options = []): array
    {
        return $this->pageTypeAPI->getPages($query, $options);
    }
}
