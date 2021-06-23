<?php

namespace App\Http\Controllers;

use App\super_admins;
use Illuminate\Http\Request;


class Super_adminsController extends Controller
{
    //Get Function
    public function index()
    {
        $super_admins = super_admins::all();
        return response()->json(['super_admins'=> $super_admins], 200);
    }

    //Show Function
    public function show($id)
    {
        $super_admins = super_admins::find($id);

        if($super_admins)
        {
            return response()->json(['super_admins'=> $super_admins], 200);
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
  
        $super_admins = new super_admins;
        $super_admins->name = $request->name;
        $super_admins->email = $request->email;
        $super_admins->password = $request->password;	
        $super_admins->save();
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
  
        $super_admins = super_admins::find($id);
        if($super_admins)
        {
            $super_admins->name = $request->name;
            $super_admins->email = $request->email;
            $super_admins->password = $request->password;	
            $super_admins->update();
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
        $super_admins = super_admins::find($id);
        if($super_admins)
        {
            $super_admins->delete();
            return response()->json(['message'=>'Delete Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Delete Admin Details'], 404);
        }
    }

}
