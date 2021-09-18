<?php
use PoP\ComponentModel\State\ApplicationState;
use PoPSchema\UserRoles\Facades\UserRoleTypeAPIFacade;
use PoP\ComponentModel\CheckpointProcessors\AbstractCheckpointProcessor;
use PoP\ComponentModel\ErrorHandling\Error;

class GD_UserLogin_Dataload_UserCheckpointProcessor extends AbstractCheckpointProcessor
{
    public const CHECKPOINT_LOGGEDINUSER_ISADMINISTRATOR = 'checkpoint-loggedinuser-isadministrator';

    public function getCheckpointsToProcess(): array
    {
        return array(
            [self::class, self::CHECKPOINT_LOGGEDINUSER_ISADMINISTRATOR],
        );
    }

    public function process(array $checkpoint)
    {
        $vars = ApplicationState::getVars();
        switch ($checkpoint[1]) {
            case self::CHECKPOINT_LOGGEDINUSER_ISADMINISTRATOR:
                $user_id = $vars['global-userstate']['current-user-id'];
                $userRoleTypeAPI = UserRoleTypeAPIFacade::getInstance();
                if (!$userRoleTypeAPI->hasRole($user_id, 'administrator')) {
                    return new Error('userisnotadmin');
                }
                break;
        }

        return parent::process($checkpoint);
    }
}

