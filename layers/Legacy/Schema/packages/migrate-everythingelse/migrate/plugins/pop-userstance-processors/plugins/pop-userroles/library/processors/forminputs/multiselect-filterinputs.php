<?php
use PoP\ComponentModel\ModuleProcessors\DataloadQueryArgsFilterInputModuleProcessorInterface;
use PoP\ComponentModel\ModuleProcessors\DataloadQueryArgsSchemaFilterInputModuleProcessorInterface;
use PoP\ComponentModel\ModuleProcessors\DataloadQueryArgsSchemaFilterInputModuleProcessorTrait;
use PoP\ComponentModel\Schema\SchemaTypeModifiers;
use PoP\ComponentModel\TypeResolvers\InputTypeResolverInterface;
use PoP\Engine\TypeResolvers\ScalarType\StringScalarTypeResolver;
use PoP\Translation\Facades\TranslationAPIFacade;
use Symfony\Contracts\Service\Attribute\Required;

class UserStance_URE_Module_Processor_MultiSelectFilterInputs extends PoP_Module_Processor_MultiSelectFormInputsBase implements DataloadQueryArgsFilterInputModuleProcessorInterface
{
    use DataloadQueryArgsSchemaFilterInputModuleProcessorTrait;

    public const MODULE_FILTERINPUT_AUTHORROLE_MULTISELECT = 'filterinput-multiselect-authorrole';

    protected StringScalarTypeResolver $stringScalarTypeResolver;

    #[Required]
    final public function autowireUserStance_URE_Module_Processor_MultiSelectFilterInputs(
        StringScalarTypeResolver $stringScalarTypeResolver,
    ): void {
        $this->stringScalarTypeResolver = $stringScalarTypeResolver;
    }

    public function getModulesToProcess(): array
    {
        return array(
            [self::class, self::MODULE_FILTERINPUT_AUTHORROLE_MULTISELECT],
        );
    }

    public function getFilterInput(array $module): ?array
    {
        $filterInputs = [
            self::MODULE_FILTERINPUT_AUTHORROLE_MULTISELECT => [PoP_Module_Processor_UserStanceUserRolesFilterInputProcessor::class, PoP_Module_Processor_UserStanceUserRolesFilterInputProcessor::FILTERINPUT_AUTHORROLE_MULTISELECT],
        ];
        return $filterInputs[$module[1]] ?? null;
    }

    // public function isFiltercomponent(array $module)
    // {
    //     switch ($module[1]) {
    //         case self::MODULE_FILTERINPUT_AUTHORROLE_MULTISELECT:
    //             return true;
    //     }

    //     return parent::isFiltercomponent($module);
    // }

    public function getLabelText(array $module, array &$props)
    {
        switch ($module[1]) {
            case self::MODULE_FILTERINPUT_AUTHORROLE_MULTISELECT:
                return TranslationAPIFacade::getInstance()->__('Author Role', 'pop-userstance-processors');
        }

        return parent::getLabelText($module, $props);
    }

    public function getInputClass(array $module): string
    {
        switch ($module[1]) {
            case self::MODULE_FILTERINPUT_AUTHORROLE_MULTISELECT:
                return GD_URE_FormInput_MultiAuthorRole::class;
        }

        return parent::getInputClass($module);
    }

    public function getName(array $module): string
    {
        switch ($module[1]) {
            case self::MODULE_FILTERINPUT_AUTHORROLE_MULTISELECT:
                return 'role';
        }

        return parent::getName($module);
    }

    public function getFilterInputTypeResolver(array $module): InputTypeResolverInterface
    {
        return match($module[1]) {
            self::MODULE_FILTERINPUT_AUTHORROLE_MULTISELECT => $this->stringScalarTypeResolver,
            default => $this->getDefaultSchemaFilterInputTypeResolver(),
        };
    }

    public function getFilterInputTypeModifiers(array $module): int
    {
        return match($module[1]) {
            self::MODULE_FILTERINPUT_AUTHORROLE_MULTISELECT => SchemaTypeModifiers::IS_ARRAY,
            default => SchemaTypeModifiers::NONE,
        };
    }

    public function getFilterInputDescription(array $module): ?string
    {
        $translationAPI = TranslationAPIFacade::getInstance();
        return match ($module[1]) {
            self::MODULE_FILTERINPUT_AUTHORROLE_MULTISELECT => $translationAPI->__('', ''),
            default => null,
        };
    }
}



