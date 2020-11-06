<?php

namespace App\Actions\Fortify;

use App\Models\Traffic;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
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
            'email' => ['required', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'branch' => ['required', 'string', 'in:'.collect(Traffic::BRANCHES)->keys()->implode(',')],
            'traffic' => ['required', 'string', 'in:small,medium,large'],
            'trucking' => ['required', 'string', 'in:small,medium,large:'],
            'photo' => ['nullable', 'image', 'max:1024'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $user->updateProfilePhoto($input['photo']);
        }

        $user->forceFill([
            'name' => $input['name'],
            'email' => $input['email'],
            'branch' => $input['branch'],
            'traffic' => $input['traffic'],
            'trucking' => $input['trucking'],
        ])->save();
    }
}
