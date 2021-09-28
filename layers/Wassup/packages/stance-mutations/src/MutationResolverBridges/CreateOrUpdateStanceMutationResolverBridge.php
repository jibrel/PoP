<?php

declare(strict_types=1);

namespace PoPSitesWassup\StanceMutations\MutationResolverBridges;

use PoP\ComponentModel\Instances\InstanceManagerInterface;
use PoP\ComponentModel\MutationResolution\MutationResolutionManagerInterface;
use PoP\ComponentModel\MutationResolvers\MutationResolverInterface;
use PoP\Hooks\HooksAPIInterface;
use PoP\Translation\TranslationAPIInterface;
use PoPSchema\CustomPosts\Facades\CustomPostTypeAPIFacade;
use PoPSchema\CustomPosts\TypeAPIs\CustomPostTypeAPIInterface;
use PoPSitesWassup\StanceMutations\MutationResolvers\CreateOrUpdateStanceMutationResolver;

class CreateOrUpdateStanceMutationResolverBridge extends AbstractCreateUpdateStanceMutationResolverBridge
{
    protected CreateOrUpdateStanceMutationResolver $createOrUpdateStanceMutationResolver;
    public function __construct(
        CreateOrUpdateStanceMutationResolver $createOrUpdateStanceMutationResolver,
    ) {
        $this->createOrUpdateStanceMutationResolver = $createOrUpdateStanceMutationResolver;
        }

    public function getMutationResolver(): MutationResolverInterface
    {
        return $this->createOrUpdateStanceMutationResolver;
    }

    protected function supportsTitle()
    {
        return false;
    }

    public function getFormData(): array
    {
        $form_data = parent::getFormData();

        $target = $this->moduleProcessorManager->getProcessor([PoP_UserStance_Module_Processor_PostTriggerLayoutFormComponentValues::class, \PoP_UserStance_Module_Processor_PostTriggerLayoutFormComponentValues::MODULE_FORMCOMPONENT_CARD_STANCETARGET])->getValue([\PoP_UserStance_Module_Processor_PostTriggerLayoutFormComponentValues::class, \PoP_UserStance_Module_Processor_PostTriggerLayoutFormComponentValues::MODULE_FORMCOMPONENT_CARD_STANCETARGET]);
        $form_data['stancetarget'] = $target;

        return $form_data;
    }

    protected function isUpdate(): bool
    {
        // If param "?pid" is provided then it's update, otherwise it's create
        return $this->getUpdateCustomPostID() != null;
    }

    protected function getEditorInput()
    {
        return [\PoP_Module_Processor_TextareaFormInputs::class, \PoP_Module_Processor_TextareaFormInputs::MODULE_FORMINPUT_TEXTAREAEDITOR];
    }

    protected function getCategoriesModule()
    {
        if ($this->showCategories()) {
            return [\UserStance_Module_Processor_ButtonGroupFormInputs::class, \UserStance_Module_Processor_ButtonGroupFormInputs::MODULE_FORMINPUT_BUTTONGROUP_STANCE];
        }

        return parent::getCategoriesModule();
    }

    protected function showCategories()
    {
        return true;
    }

    protected function moderate()
    {
        return false;
    }

    /**
     * Watch out! This functions is called from nowhere!
     * Lost during the migration!
     * @todo: Restore calling this function
     */
    protected function getSuccessTitle($referenced = null)
    {
        $feedback_title = \PoP_UserStance_PostNameUtils::getNameUc();
        if ($referenced) {
            return sprintf(
                $this->translationAPI->__('%1$s after reading “%2$s”', 'pop-userstance'),
                $feedback_title,
                $this->customPostTypeAPI->getTitle($referenced)
            );
        }

        return $feedback_title;
    }
}
