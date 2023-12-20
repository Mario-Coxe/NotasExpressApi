<?php

namespace App\Http\Controllers\Api;

use App\Models\UserLogin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\Facades\Passport;
use Illuminate\Support\Str;


class AuthController extends Controller
{
    /**
     * Create User
     * @param Request $request
     * @return UserLogin 
     */
    

    /**
     * Login The User
     * @param Request $request
     * @return UserLogin
     */
    public function loginUser(Request $request)
    {
        try {
            $validateUser = Validator::make(
                $request->all(),
                [
                    'telefone' => 'required',
                    'password' => 'required'
                ]
            );

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateUser->errors()
                ], 401);
            }

            // Autenticar manualmente
            $user = UserLogin::where('telefone', $request->telefone)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json([
                    'status' => false,
                    'message' => 'Telefone or password does not match with our records.',
                ], 401);
            }

            // Gerar token usando Passport
            $token = $user->createToken('API TOKEN')->accessToken;
            $shortenedToken = Str::limit($token, 30);

            return response()->json([
                'status' => true,
                'message' => 'User Logged In Successfully',
                'token' => $shortenedToken
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}