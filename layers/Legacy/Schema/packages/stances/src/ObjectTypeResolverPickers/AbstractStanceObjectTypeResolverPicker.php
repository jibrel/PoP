<?php

declare(strict_types=1);

namespace PoPSchema\Stances\ObjectTypeResolverPickers;

use PoP\ComponentModel\ObjectTypeResolverPickers\AbstractObjectTypeResolverPicker;
use PoP\ComponentModel\TypeResolvers\ObjectType\ObjectTypeResolverInterface;
use PoPSchema\Stances\Facades\StanceTypeAPIFacade;
use PoPSchema\Stances\TypeResolvers\ObjectType\StanceObjectTypeResolver;
use Symfony\Contracts\Service\Attribute\Required;

abstract class AbstractStanceObjectTypeResolverPicker extends AbstractObjectTypeResolverPicker
{
    protected StanceObjectTypeResolver $stanceObjectTypeResolver;
    
    #[Required]
    final public function autowireAbstractStanceObjectTypeResolverPicker(StanceObjectTypeResolver $stanceObjectTypeResolver): void
    {
        $this->stanceObjectTypeResolver = $stanceObjectTypeResolver;
    }
    
    public function getObjectTypeResolver(): ObjectTypeResolverInterface
    {
        return $this->stanceObjectTypeResolver;
    }

    public function isInstanceOfType(object $object): bool
    {
        $stanceTypeAPI = StanceTypeAPIFacade::getInstance();
        return $stanceTypeAPI->isInstanceOfStanceType($object);
    }

    public function isIDOfType(string | int $objectID): bool
    {
        $stanceTypeAPI = StanceTypeAPIFacade::getInstance();
        return $stanceTypeAPI->stanceExists($objectID);
    }
}
