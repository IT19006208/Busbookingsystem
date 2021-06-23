<?php

namespace App\Http\Controllers;
use App\bus_schedule_bookings;
use Illuminate\Http\Request;

class Bus_schedule_bookingsController extends Controller
{
    //Get Function
   public function index()
   {
       $bus_schedule_bookings = bus_schedule_bookings::all();
       return response()->json(['bus_schedule_bookings'=> $bus_schedule_bookings], 200);
   }

   //Show Function
   public function show($id)
   {
       $bus_schedule_bookings = bus_schedule_bookings::find($id);

       if($bus_schedule_bookings)
       {
           return response()->json(['bus_schedule_bookings'=> $bus_schedule_bookings], 200);
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
           'bus_seate_id'=>'required|max:191',
           'user_id'=>'required|max:191',
           'bus_schedule_id'=>'required|max:191',
           'seat_number'=>'required|max:191',
           'price'=>'required|max:191',
           'status'=>'required|max:191',
           
       ]);
 
       $bus_schedule_bookings = new bus_schedule_bookings;
       $bus_schedule_bookings->bus_seate_id = $request->bus_seate_id;
       $bus_schedule_bookings->user_id = $request->user_id;
       $bus_schedule_bookings->bus_schedule_id = $request->bus_schedule_id;	
       $bus_schedule_bookings->seat_number = $request->seat_number;	
       $bus_schedule_bookings->price = $request->price;	
       $bus_schedule_bookings->status = $request->status;		
       $bus_schedule_bookings->save();
       return response()->json(['message'=>'Added Successfully'], 200);
   }

   //Update Function
   public function update(Request $request, $id)
   {
       $request->validate([
        'bus_seate_id'=>'required|max:191',
           'user_id'=>'required|max:191',
           'bus_schedule_id'=>'required|max:191',
           'seat_number'=>'required|max:191',
           'price'=>'required|max:191',
           'status'=>'required|max:191',
       ]);
 
       $bus_schedule_bookings = bus_schedule_bookings::find($id);
       if($bus_schedule_bookings)
       {
        $bus_schedule_bookings->bus_seate_id = $request->bus_seate_id;
       $bus_schedule_bookings->user_id = $request->user_id;
       $bus_schedule_bookings->bus_schedule_id = $request->bus_schedule_id;	
       $bus_schedule_bookings->seat_number = $request->seat_number;	
       $bus_schedule_bookings->price = $request->price;	
       $bus_schedule_bookings->status = $request->status;
           $bus_schedule_bookings->update();
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
       $bus_schedule_bookings = bus_schedule_bookings::find($id);
       if($bus_schedule_bookings)
       {
           $bus_schedule_bookings->delete();
           return response()->json(['message'=>'Delete Successfully'], 200);
       }
       else
       {
           return response()->json(['message'=>'Not Delete Admin Details'], 404);
       }
   }
}
