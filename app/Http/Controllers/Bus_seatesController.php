<?php

namespace App\Http\Controllers;
use App\bus_seates;
use Illuminate\Http\Request;

class Bus_seatesController extends Controller
{
    //Get Function
   public function index()
   {
       $bus_seates = bus_seates::all();
       return response()->json(['bus_seates'=> $bus_seates], 200);
   }

   //Show Function
   public function show($id)
   {
       $bus_seates = bus_seates::find($id);

       if($bus_seates)
       {
           return response()->json(['bus_seates'=> $bus_seates], 200);
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
           'bus_id'=>'required|max:191',
           'seat_number'=>'required|max:191',
           'price'=>'required|max:191',
           
       ]);
 
       $bus_seates = new bus_seates;
       $bus_seates->bus_id = $request->bus_id;
       $bus_seates->seat_number = $request->seat_number;
       $bus_seates->price = $request->price;		
       $bus_seates->save();
       return response()->json(['message'=>'Added Successfully'], 200);
   }

   //Update Function
   public function update(Request $request, $id)
   {
       $request->validate([
        'bus_id'=>'required|max:191',
        'seat_number'=>'required|max:191',
        'price'=>'required|max:191',
       ]);
 
       $bus_seates = bus_seates::find($id);
       if($bus_seates)
       {
        $bus_seates->bus_id = $request->bus_id;
        $bus_seates->seat_number = $request->seat_number;
         $bus_seates->price = $request->price;
           $bus_seates->update();
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
       $bus_seates = bus_seates::find($id);
       if($bus_seates)
       {
           $bus_seates->delete();
           return response()->json(['message'=>'Delete Successfully'], 200);
       }
       else
       {
           return response()->json(['message'=>'Not Delete Admin Details'], 404);
       }
   }
}
