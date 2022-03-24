<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;

class UserController extends BaseController
{
    public function login(Request $request)
    {
    $validator = Validator::make($request->all(), [
        'email' => 'required|string|email',
        'password' => 'required'
    ]);

    if ($validator->fails()) {
        return $this->responseError('Login Failed', 422, $validator->errors());
    }

    if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        $user = Auth::user();

        $response = [
            'token' => $user->createToken('authToken')->plainTextToken,
            'name' => $user->name
        ];

        return $this->responseOk($response);
    } else {
        return $this->responseError('Wrong Email or Password', 401);
    }
    }

    public function register(Request $request)
    {
        // dd($request);
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|unique:users',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|confirmed',
            // 'alamat' => 'string',
            // 'no_telp' => 'string',
            'roles' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->responseError('Registration Failed', 422, $validator->errors());
        }

        $params = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'alamat' => $request->alamat,
            // 'no_telp' => $request->no_telp,
            'roles' => $request->roles,
        ];

        if ($user = User::create($params)) {
            $token = $user->createToken('authToken')->plainTextToken;

            $response = [
                'token' => $token,
                'token_type' => 'Bearer',
                'user' => $user
            ];

            return $this->responseOk($response);
        } else {
            return $this->responseError('Registration Failed', 400);
        }
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'string',
            'password' => 'confirmed',
            'alamat' => 'string',
            'no_telp' => 'string',
            // 'prof_pict' => 'nullable|image',
        ]);

        if($validator->fails()) {
            return $this->responseError('Update Failed', 422, $validator->errors());
        }

        $user = User::where('id', $id)->update([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            // 'prof_pict' => $request->prof_pict
        ]);

        $params = [
            'name' => $request->name,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
        ];

        $response = [
            'user' => $params
        ];

        if($user == true ){
            return $this->responseOk($response);
        }else{
            return $this->responseError('Cannot Update', 400);
        }
    }

    public function logout(Request $request)
    {
        // $user = $request->user()->tokens();
        // $user->delete();
        $request->user()->currentAccessToken()->delete();
        // $user->tokens()->where('id', $id)->delete();
        return response()->json([
            'message' => 'Successfully Logged Out'
        ]);
    }
}
