<?php

class PoP_Module_Processor_ListFeedbackMessageInners extends PoP_Module_Processor_ListFeedbackMessageInnersBase
{
    public final const MODULE_FEEDBACKMESSAGEINNER_ITEMLIST = 'feedbackmessageinner-itemlist';

    public function getModulesToProcess(): array
    {
        return array(
            [self::class, self::MODULE_FEEDBACKMESSAGEINNER_ITEMLIST],
        );
    }

    public function getLayoutSubmodules(array $module)
    {
        $ret = parent::getLayoutSubmodules($module);

        $layouts = array(
            self::MODULE_FEEDBACKMESSAGEINNER_ITEMLIST => [PoP_Module_Processor_DomainFeedbackMessageAlertLayouts::class, PoP_Module_Processor_DomainFeedbackMessageAlertLayouts::MODULE_LAYOUT_FEEDBACKMESSAGEALERT_ITEMLIST],
        );

        if ($layout = $layouts[$module[1]] ?? null) {
            $ret[] = $layout;
        }

        return $ret;
    }
}



