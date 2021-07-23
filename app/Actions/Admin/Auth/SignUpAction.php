<?php

namespace App\Actions\Admin\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class SignUpAction
{

    /**
     * Create a new user admin
     * 
     * @param array $data
     * @return User
     */
    public function __invoke($data): User
    {

        $validate = Validator::make($data, [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users,email',
            'password'              => 'required|min:6|max:16|confirmed',
            'password_confirmation' => 'required|min:6|max:16'
        ])->validate();

        $user = User::create(array_merge(
            $validate,
            [
                'password' => Hash::make($validate['password'])
            ]
        ));

        $user->user_admin()->create();

        return $user;
    }
}
