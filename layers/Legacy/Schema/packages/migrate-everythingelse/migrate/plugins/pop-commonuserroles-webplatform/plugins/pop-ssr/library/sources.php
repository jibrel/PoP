<?php

PoP_ServerSideRenderingFactory::getInstance()->addTemplatePath(
    POP_COMMONUSERROLESWEBPLATFORM_PHPTEMPLATES_DIR,
    array(
        POP_TEMPLATE_LAYOUT_PROFILEINDIVIDUAL_DETAILS,
        POP_TEMPLATE_LAYOUT_PROFILEORGANIZATION_DETAILS,
    )
);