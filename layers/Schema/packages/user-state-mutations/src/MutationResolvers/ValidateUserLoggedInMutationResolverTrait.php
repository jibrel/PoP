<?php

declare(strict_types=1);

namespace PoPSchema\UserStateMutations\MutationResolvers;

use PoP\ComponentModel\Services\WithInstanceManagerServiceTrait;
use PoP\ComponentModel\State\ApplicationState;
use PoP\Translation\TranslationAPIInterface;
use Symfony\Contracts\Service\Attribute\Required;

trait ValidateUserLoggedInMutationResolverTrait
{
    // use WithInstanceManagerServiceTrait;

    /**
     * Check that the user is logged-in
     *
     * @param string[] $errors
     */
    protected function validateUserIsLoggedIn(array &$errors): void
    {
        $vars = ApplicationState::getVars();
        if (!$vars['global-userstate']['is-user-logged-in']) {
            $errors[] = $this->getUserNotLoggedInErrorMessage();
        }
    }
    protected function getUserNotLoggedInErrorMessage(): string
    {
        return $this->getTranslationAPI()->__('You are not logged in', 'user-state-mutations');
    }
}
