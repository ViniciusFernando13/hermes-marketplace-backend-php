<?php

namespace App\Http\Controllers\Admin;

use Throwable;
use App\Actions\Admin\Auth as AuthAdminActions;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    /**
     * Does sign in
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signIn(Request $request)
    {
        try {
            $token = (new AuthAdminActions\SignInAction)($request->all());

            return response()->json(['token' => $token]);
        } catch (\Throwable $e) {
            return response()->json(["message" => $e->getMessage()], 400);
        }
    }

    /**
     * Does sign up
     * 
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function signUp(Request $request)
    {

        try {
            DB::beginTransaction();

            $user = (new AuthAdminActions\SignUpAction)($request->all());

            DB::commit();

            return response()->json($user);
        } catch (Throwable $e) {
            DB::rollBack();

            return response()->json(["message" => $e->getMessage()], 400);
        }
    }
}
