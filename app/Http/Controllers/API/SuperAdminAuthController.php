<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\super_admins;
use Illuminate\Support\Facades\Hash;

class SuperAdminAuthController extends Controller
{
    public function Super_admin_register(Request $request)
    {
        
        $data = $request->validate([
            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191|unique:super_admins,email',
            'password'=>'required|string',
        ]);

        $super_admins = super_admins::create([
            'name'=> $data['name'],
            'email'=> $data['email'],
            'password'=> Hash::make($data['password']),
        ]);

        $token = $super_admins->createToken('BusBookingSystemProjectToken')->plainTextToken;

        $response = [
            'user'=>$super_admins,
            'token'=>$token,
        ];

        return response($response, 201);

    }
   
    public function Super_admin_logout()
    {
        auth()->user()->tokens()->delete();
        return response(['message'=>'Logged Out Successfully.']);
    }

    public function Super_admin_login(Request $request)
    {
        $data = $request->validate([
            'email'=>'required|email|max:191',
            'password'=>'required|string',
        ]);

        $super_admins = super_admins::where('email', $data['email'])->first();

        if(!$super_admins || !Hash::check($data['password'], $super_admins->password))
        {
            return response(['message'=>'Invalid Credentials'],401);
        }
        else
        {
            $token = $super_admins->createToken('BusBookingSystemProjectTokenLogin')->plainTextToken;

            $response = [
                'user'=>$super_admins,
                'token'=>$token,
            ];

             return response($response, 201);
        }
    }
}
