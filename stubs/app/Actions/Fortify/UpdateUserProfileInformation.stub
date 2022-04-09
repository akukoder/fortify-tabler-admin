<?php

namespace App\Actions\Fortify;

use App\Actions\UserAvatar;
use App\Actions\UsernameValidationRules;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    use UsernameValidationRules;

    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],

            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],

            'username' => $this->usernameRules($user->id),
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['avatar'])) {
            if (! empty($user->avatar)) {
                (new UserAvatar)->delete($user);
            }

            $input['avatar'] = (new UserAvatar)->upload($input['avatar']);
        }
        else {
            $input['avatar'] = null;
        }

        if ($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
                'avatar' => $input['avatar'],
                'name' => $input['name'],
                'email' => $input['email'],
                'username' => $input['username'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'avatar' => $input['avatar'],
            'name' => $input['name'],
            'username' => $input['username'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
