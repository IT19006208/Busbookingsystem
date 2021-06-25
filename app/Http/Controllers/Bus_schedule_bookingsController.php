<?php

namespace App\Http\Controllers;
use App\bus_schedule_bookings;
use App\bus_seates;
use App\User;
use App\bus_schedules;

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
           return response()->json(['message'=> 'No Bus Schedule Bookings Details'], 404);
       }
       
   }

   //Insert Function
   public function store(Request $request)
   {
       $request->validate([
           'bus_seate_id'=>'required',
           'user_id'=>'required',
           'bus_schedule_id'=>'required',
           'seat_number'=>'required|numeric|max:54',
           'price'=>'required|numeric|min:10',
           'status'=>['required','max:191','regex:(cancel|active)'],
           
       ]);

       //Get Bus Seate Foreign Key
       $SID=$request->bus_seate_id;
       $Seat=bus_seates::find($SID);

       //Get User Foreign Key
       $UID=$request->user_id;
       $User=User::find($UID);

       //Get Bus Schedules Foreign Key
       $BUSID=$request->bus_schedule_id;
       $BusSchedule=bus_schedules::find($BUSID);
 
       $bus_schedule_bookings = new bus_schedule_bookings;

       if($Seat){

        if($User)
        {
            if($BusSchedule)
            {

       $bus_schedule_bookings->bus_seate_id = $request->bus_seate_id;
       $bus_schedule_bookings->user_id = $request->user_id;
       $bus_schedule_bookings->bus_schedule_id = $request->bus_schedule_id;	
       $bus_schedule_bookings->seat_number = $request->seat_number;	
       $bus_schedule_bookings->price = $request->price;	
       $bus_schedule_bookings->status = $request->status;		
       $bus_schedule_bookings->save();
       return response()->json(['message'=>'Bus Schedule Bookings Added Successfully'], 200);

       }
       else{

        return response()->json(['message'=>' Bus Schedule ID Not Found'], 404);

         }

    }

       else{

        return response()->json(['message'=>' User ID Not Found'], 404);

         }

    }
        else{

        return response()->json(['message'=>' Seat ID Not Found'], 404);

         }
   }

   //Update Function
   public function update(Request $request, $id)
   {
       $request->validate([
        'bus_seate_id'=>'required',
           'user_id'=>'required',
           'bus_schedule_id'=>'required',
           'seat_number'=>'required|numeric|max:54',
           'price'=>'required|numeric|min:10',
           'status'=>['required','max:191','regex:(cancel|active)'],
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
        return response()->json(['message'=>'Bus Schedule Bookings Update Successfully'], 200);
       }
       
       else
       {
           return response()->json(['message'=>'Not Update Bus Schedule Bookings Details'], 404);
       }
       
   }

   //Delete Function
   public function destroy($id)
   {
       $bus_schedule_bookings = bus_schedule_bookings::find($id);
       if($bus_schedule_bookings)
       {
           $bus_schedule_bookings->delete();
           return response()->json(['message'=>' Bus Schedule Bookings Delete Successfully'], 200);
       }
       else
       {
           return response()->json(['message'=>'Not Delete Bus Schedule Bookings Details'], 404);
       }
   }
}
