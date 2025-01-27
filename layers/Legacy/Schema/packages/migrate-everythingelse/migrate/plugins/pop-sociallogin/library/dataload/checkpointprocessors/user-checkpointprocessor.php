<?php
use PoP\ComponentModel\CheckpointProcessors\AbstractCheckpointProcessor;
use PoP\Root\Feedback\FeedbackItemResolution;

class GD_WSL_Dataload_UserCheckpointProcessor extends AbstractCheckpointProcessor
{
    public final const CHECKPOINT_NONSOCIALLOGINUSER = 'wsl-checkpoint-nonsocialloginuser';

    public function getCheckpointsToProcess(): array
    {
        return array(
            [self::class, self::CHECKPOINT_NONSOCIALLOGINUSER],
        );
    }

    public function validateCheckpoint(array $checkpoint): ?FeedbackItemResolution
    {
        switch ($checkpoint[1]) {
            case self::CHECKPOINT_NONSOCIALLOGINUSER:
                if (isSocialloginUser()) {
                    return new FeedbackItemResolution('sociallogin-user', 'sociallogin-user');
                }
                break;
        }

        return parent::validateCheckpoint($checkpoint);
    }
}

