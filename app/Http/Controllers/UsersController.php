<?php

namespace App\Http\Controllers;
use App\users;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //Get Function
    public function index()
    {
        $users = users::all();
        return response()->json(['users'=> $users], 200);
    }

    //Show Function
    public function show($id)
    {
        $users = users::find($id);

        if($users)
        {
            return response()->json(['users'=> $users], 200);
        }
        else
        {
            return response()->json(['message'=> 'No Admin Details'], 404);
        }
        
    }

    //Insert Function
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:191',
            'email'=>'required|max:191',
            'password'=>'required|max:191',
        ]);
  
        $users = new users;
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = $request->password;	
        $users->save();
        return response()->json(['message'=>'Added Successfully'], 200);
    }

    //Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:191',
            'email'=>'required|max:191',
            'password'=>'required|max:191',
        ]);
  
        $users = users::find($id);
        if($users)
        {
            $users->name = $request->name;
            $users->email = $request->email;
            $users->password = $request->password;	
            $users->update();
            return response()->json(['message'=>'Update Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Update Admin Details'], 404);
        }
        
    }

    //Delete Function
    public function destroy($id)
    {
        $users = users::find($id);
        if($users)
        {
            $users->delete();
            return response()->json(['message'=>'Delete Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Delete Admin Details'], 404);
        }
    }

}
