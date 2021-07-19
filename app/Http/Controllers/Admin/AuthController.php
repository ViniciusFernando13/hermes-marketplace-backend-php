<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Throwable;

class AuthController extends Controller
{

    public function signIn(Request $request)
    {
        # code...
    }

    public function signUp(Request $request)
    {

        try {
            DB::beginTransaction();

            $validate = Validator::make($request->only(['name', 'email', 'password', 'password_confirmation']), [
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

            DB::commit();

            return response()->json($user);
        } catch (Throwable $e) {
            DB::rollBack();

            return response()->json(["message" => $e->getMessage()], 400);
        }
    }
}
