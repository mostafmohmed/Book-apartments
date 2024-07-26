<?php

namespace App\Http\Controllers;

use App\Api\ApiResponse;
use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class bookcontroller extends Controller
{
    public function booking(Request $request){
        $validator = Validator::make($request->all(), [
            
            'email' => ['required', 'email', 'max:255', 'unique:' . Booking::class],
            'phone'=>['required', 'regex:/(01)[0-9]{9}'],
            'national-id'=>['required', 'digits:10'],
            'user_id'=>['required','exists:users,id'],
            'apartment_id'=>['required','exists:apartments,id'],
        ], [], [
            'name' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
        ]);

        if ($validator->fails()) {
            return ApiResponse::sendResponse(422, 'Register Validation Errors', $validator->messages()->all());
        }
    }
}
