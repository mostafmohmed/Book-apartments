<?php

namespace App\Http\Controllers;

use App\Api\ApiResponse;
use App\Models\Apartment_Owner;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class apartment_ownercontroller extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:' . Apartment_Owner::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ], [], [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Register Validation Errors', $validator->messages()->all());
        }

        $user = Apartment_Owner::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $data['token'] = $user->createToken('mobile',['role:owner'])->plainTextToken;
        $data['name'] = $user->name;
        $data['email'] = $user->email;

        return ApiResponse::sendResponse(201, 'User Account Created Successfully', $data);
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required', 'string', 'email'],
            'password' => ['required'],
        ], [], [
            'email' => __('lang.email'),
            'password' => __('lang.password'),
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Login Validation Errors', $validator->errors());
        }

        if (Auth::guard('owner')->attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::guard('owner')->user();
            $data['token'] =  $user->createToken('mobile',['role:owner'])->plainTextToken;
            $data['name'] =  $user->name;
            $data['email'] =  $user->email;
            return ApiResponse::sendResponse(200, 'Login Successfully', $data);
        } else {
            return ApiResponse::sendResponse(401, 'These credentials doesn\'t exist', null);
        }
    }
}
