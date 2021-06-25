<?php

namespace App\Http\Controllers;
use App\bus;
use Illuminate\Http\Request;

class BusController extends Controller
{

    //Get Function
   public function index()
   {
       $bus = bus::all();
       return response()->json(['bus'=> $bus], 200);
   }

   //Show Function
   public function show($id)
   {
       $bus = bus::find($id);

       if($bus)
       {
           return response()->json(['bus'=> $bus], 200);
       }
       else
       {
           return response()->json(['message'=> 'No Bus Details'], 404);
       }
       
   }

   //Insert Function
   public function store(Request $request)
   {
       $request->validate([
           'name'=>'required|max:191',
           'type'=>'required|max:191',
           'vehical_number'=>'required|max:12',
           
       ]);
 
       $bus = new bus;
       $bus->name = $request->name;
       $bus->type = $request->type;
       $bus->vehical_number = $request->vehical_number;		
       $bus->save();
       return response()->json(['message'=>'Bus Added Successfully'], 200);
   }

   //Update Function
   public function update(Request $request, $id)
   {
       $request->validate([
           'name'=>'required|max:191',
           'type'=>'required|max:191',
           'vehical_number'=>'required|max:12',
       ]);
 
       $bus = bus::find($id);
       if($bus)
       {
        $bus->name = $request->name;
        $bus->type = $request->type;
        $bus->vehical_number = $request->vehical_number;	
           $bus->update();
           return response()->json(['message'=>'Bus Update Successfully'], 200);
       }
       else
       {
           return response()->json(['message'=>'Not Update Bus Details'], 404);
       }
       
   }

   //Delete Function
   public function destroy($id)
   {
       $bus = bus::find($id);
       if($bus)
       {
           $bus->delete();
           return response()->json(['message'=>'Bus Delete Successfully'], 200);
       }
       else
       {
           return response()->json(['message'=>'Not Delete Bus Details'], 404);
       }
   }

}
