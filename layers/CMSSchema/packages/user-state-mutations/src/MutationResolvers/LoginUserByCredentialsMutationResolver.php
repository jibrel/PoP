<?php

declare(strict_types=1);

namespace PoPCMSSchema\UserStateMutations\MutationResolvers;

use PoP\ComponentModel\MutationResolvers\AbstractMutationResolver;
use PoP\Root\App;
use PoP\Root\Exception\AbstractException;
use PoP\Root\Feedback\FeedbackItemResolution;
use PoPCMSSchema\Users\TypeAPIs\UserTypeAPIInterface;
use PoPCMSSchema\UserStateMutations\Exception\UserLoginMutationException;
use PoPCMSSchema\UserStateMutations\Exception\UserStateMutationException;
use PoPCMSSchema\UserStateMutations\FeedbackItemProviders\MutationErrorFeedbackItemProvider;
use PoPCMSSchema\UserStateMutations\StaticHelpers\AppStateHelpers;
use PoPCMSSchema\UserStateMutations\TypeAPIs\UserStateTypeMutationAPIInterface;

class LoginUserByCredentialsMutationResolver extends AbstractMutationResolver
{
    private ?UserTypeAPIInterface $userTypeAPI = null;
    private ?UserStateTypeMutationAPIInterface $userStateTypeMutationAPI = null;

    final public function setUserTypeAPI(UserTypeAPIInterface $userTypeAPI): void
    {
        $this->userTypeAPI = $userTypeAPI;
    }
    final protected function getUserTypeAPI(): UserTypeAPIInterface
    {
        return $this->userTypeAPI ??= $this->instanceManager->getInstance(UserTypeAPIInterface::class);
    }
    final public function setUserStateTypeMutationAPI(UserStateTypeMutationAPIInterface $userStateTypeMutationAPI): void
    {
        $this->userStateTypeMutationAPI = $userStateTypeMutationAPI;
    }
    final protected function getUserStateTypeMutationAPI(): UserStateTypeMutationAPIInterface
    {
        return $this->userStateTypeMutationAPI ??= $this->instanceManager->getInstance(UserStateTypeMutationAPIInterface::class);
    }

    public function validateErrors(array $form_data): array
    {
        $errors = [];
        $username_or_email = $form_data[MutationInputProperties::USERNAME_OR_EMAIL];
        $pwd = $form_data[MutationInputProperties::PASSWORD];

        if (!$username_or_email) {
            $errors[] = new FeedbackItemResolution(
                MutationErrorFeedbackItemProvider::class,
                MutationErrorFeedbackItemProvider::E2,
            );
        }
        if (!$pwd) {
            $errors[] = new FeedbackItemResolution(
                MutationErrorFeedbackItemProvider::class,
                MutationErrorFeedbackItemProvider::E3,
            );
        }

        if (App::getState('is-user-logged-in')) {
            $errors[] = $this->getUserAlreadyLoggedInError(App::getState('current-user-id'));
        }
        return $errors;
    }

    protected function getUserAlreadyLoggedInError(string | int $user_id): FeedbackItemResolution
    {
        return new FeedbackItemResolution(
            MutationErrorFeedbackItemProvider::class,
            MutationErrorFeedbackItemProvider::E4,
        );
    }

    /**
     * @param array<string,mixed> $form_data
     * @throws AbstractException In case of error
     */
    public function executeMutation(array $form_data): mixed
    {
        // If the user is already logged in, then return the error
        $username_or_email = $form_data[MutationInputProperties::USERNAME_OR_EMAIL];
        $pwd = $form_data[MutationInputProperties::PASSWORD];

        // Find out if it was a username or an email that was provided
        $is_email = strpos($username_or_email, '@');
        if ($is_email) {
            $user = $this->getUserTypeAPI()->getUserByEmail($username_or_email);
            if (!$user) {
                throw new UserLoginMutationException(
                    $this->__('There is no user registered with that email address.')
                );
            }
            $username = $this->getUserTypeAPI()->getUserLogin($user);
        } else {
            $username = $username_or_email;
        }

        $credentials = array(
            'login' => $username,
            'password' => $pwd,
            'remember' => true,
        );
        try {
            $user = $this->getUserStateTypeMutationAPI()->login($credentials);

            // Modify the routing-state with the newly logged in user info
            AppStateHelpers::resetCurrentUserInAppState();

            $userID = $this->getUserTypeAPI()->getUserID($user);
            App::doAction('gd:user:loggedin', $userID);
            return $userID;
        } catch (UserStateMutationException) {
            return null;
        }
    }
}
