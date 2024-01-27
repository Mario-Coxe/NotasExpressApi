<?php

namespace App\Http\Controllers\Auth;

use App\Models\UserLogin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Validator;

class LoginRegisterController extends Controller
{
     /**
     * Register a new UserLogin.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'phone_number' => 'required|string',
            'password' => 'required|string'
        ]);

        if($validate->fails()){
            return response()->json([
                'status' => 'failed',
                'message' => 'Erro na validação!',
                'data' => $validate->errors(),
            ], 403);  
        }

        // Check email exist
        $user = UserLogin::where('phone_number', $request->phone_number)->first();

        // Check password
        if(!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Credencias Incorrectas'
                ], 401);
        }

        $token = $user->createToken($request->phone_number)->plainTextToken;
        $data = $user;
        
        $response = [
            'status' => 'success',
            'message' => 'Usuário logado com suecesso!',
            'token' => $token,
            'data' => $data,
        ];

        return response()->json($response, 200);
    } 

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'User is logged out successfully'
            ], 200);
    }    
}