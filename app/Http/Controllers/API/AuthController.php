<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function User_register(Request $request)
    {
        
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:users,email',
            'password'=>'required|string',
        ]);

        $user = User::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
        ]);

        $token = $user->createToken('BusBookingSystemProjectToken')->plainTextToken;

        $response = [
            'user'=>$user,
            'token'=>$token,
        ];

        return response($response, 201);

    }
   
    public function User_logout()
    {
        auth()->user()->tokens()->delete();
        return response(['message'=>'Logged Out Successfully.']);
        
    }

    public function User_login(Request $request)
    {
        $data = $request->validate([
            'email'=>'required|email|max:191',
            'password'=>'required|string',
        ]);

        $user = User::where('email', $data['email'])->first();

        if(!$user || !Hash::check($data['password'], $user->password))
        {
            return response(['message'=>'Invalid Credentials'],401);
        }
        else
        {
            $token = $user->createToken('BusBookingSystemProjectTokenLogin')->plainTextToken;

            $response = [
                'user'=>$user,
                'token'=>$token,
            ];

             return response($response, 201);
        }
    }
}
