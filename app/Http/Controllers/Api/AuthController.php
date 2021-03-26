<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Validator;

class AuthController extends Controller {
    public function register(Request $request) {
        $registrationData = $request -> all();
        $validate = Validator::make($registrationData, [
            'nama_pegawai' => 'required|max:60',
            'email_pegawai' => 'required|email:rfc, dns|unique:users',
            'password' => 'required',
            'kelamin_pegawai' => 'required',
            'posisi_pegawai' => 'required',
            'tanggal_bergabung' => 'required',
            'status_pegawai' => 'required',
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);
        
        $user = User::create($registrationData);
        return response([
            'message' => 'Register Success',
            'user' => $user,
        ], 200);
    }

    public function login(Request $request) {
        $loginData = $request -> all();
        $validate = Validator::make($loginData, [
            'email_pegawai' => 'required|email:rfc, dns',
            'password' => 'required',
        ]);

        if($validate -> fails())
            return response(['message' => $validate -> errors()], 400);

        if(!Auth::attempt($loginData))
            return response(['message' => 'Invalid Credentials'], 401);

        $user = Auth::user();
        $token = $user -> createToken('Authentication Token') -> accessToken;

        return response([
            'message' => 'Authenticated',
            'user' => $user,
            'token_type' => 'Bearer',
            'access_token' => $token
        ]);
    }
}
