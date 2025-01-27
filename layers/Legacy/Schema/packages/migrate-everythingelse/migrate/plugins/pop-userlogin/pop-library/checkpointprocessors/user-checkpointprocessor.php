<?php
use PoP\ComponentModel\CheckpointProcessors\AbstractCheckpointProcessor;
use PoP\Root\Feedback\FeedbackItemResolution;
use PoPCMSSchema\UserRoles\Facades\UserRoleTypeAPIFacade;

class GD_UserLogin_Dataload_UserCheckpointProcessor extends AbstractCheckpointProcessor
{
    public final const CHECKPOINT_LOGGEDINUSER_ISADMINISTRATOR = 'checkpoint-loggedinuser-isadministrator';

    public function getCheckpointsToProcess(): array
    {
        return array(
            [self::class, self::CHECKPOINT_LOGGEDINUSER_ISADMINISTRATOR],
        );
    }

    public function validateCheckpoint(array $checkpoint): ?FeedbackItemResolution
    {
        switch ($checkpoint[1]) {
            case self::CHECKPOINT_LOGGEDINUSER_ISADMINISTRATOR:
                $user_id = \PoP\Root\App::getState('current-user-id');
                $userRoleTypeAPI = UserRoleTypeAPIFacade::getInstance();
                if (!$userRoleTypeAPI->hasRole($user_id, 'administrator')) {
                    return new FeedbackItemResolution('userisnotadmin', 'userisnotadmin');
                }
                break;
        }

        return parent::validateCheckpoint($checkpoint);
    }
}

