<?php

namespace App\Actions\Admin\Auth;

use App\Models\User;
use Error;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignInAction
{

    /**
     * Log a user admin
     * 
     * @param array $data
     * @return string
     */
    public function __invoke($data): string
    {

        $validate = Validator::make($data, [
            'email'     => 'required|email|exists:users,email',
            'password'  => 'required|min:6|max:16',
        ])->validate();

        $user = User::where('email', $validate['email'])->firstOrFail();

        if (!Hash::check($validate['password'], $user->password) || !$user->user_admin) {
            throw new Error('The given data was invalid.');
        }

        return $user->createToken('api_authentication')->plainTextToken;
    }
}
