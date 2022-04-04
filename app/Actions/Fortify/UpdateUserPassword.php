<?php

namespace App\Actions\Fortify;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\UpdatesUserPasswords;

class UpdateUserPassword implements UpdatesUserPasswords
{
    use PasswordValidationRules;

    /**
     * Validate and update the user's password.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        return 0;
        return view('auth.login')->with('actualizada', 'Contraseña Actualizada');
        Validator::make($input, [
            'current_password' => ['required', 'string'],
            'password' => $this->passwordRules(),
        ])->after(function ($validator) use ($user, $input) {
            if (! isset($input['current_password']) || ! Hash::check($input['current_password'], $user->password)) {
                $validator->errors()->add('current_password', __('The provided password does not match your current password.'));
            }
        })->validateWithBag('updatePassword');

        $user->forceFill([
            'password' => Hash::make($input['password']),
            'primera_vez'=>0
        ])->save();
        // Auth::logout();
        // return view('auth.login');
        // Auth::loginUsingId($user_id);
        Auth::guard('web')->logout($user);
        // dd(Auth()->user()->username);
        return view('auth.login')->with('actualizada', 'Contraseña Actualizada');
        dd('PASSED');
        return redirect()->route('dashboard');
        // Auth::login($user);
    }
}
