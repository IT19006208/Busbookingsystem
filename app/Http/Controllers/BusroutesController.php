<?php

namespace App\Http\Controllers;
use App\bus_routes;
use Illuminate\Http\Request;

class BusroutesController extends Controller
{
    //Get Function
    public function index()
    {
        $bus_routes = bus_routes::all();
        return response()->json(['bus_routes'=> $bus_routes], 200);
    }

    //Show Function
    public function show($id)
    {
        $bus_routes = bus_routes::find($id);

        if($bus_routes)
        {
            return response()->json(['bus_routes'=> $bus_routes], 200);
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
            'route_id'=>'required|max:191',
            'status'=>'required|max:191',
        ]);
  
        $bus_routes = new bus_routes;
        $bus_routes->bus_id = $request->bus_id;
        $bus_routes->route_id = $request->route_id;
        $bus_routes->status = $request->status;	
        $bus_routes->save();
        return response()->json(['message'=>'Added Successfully'], 200);
    }

    //Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'bus_id'=>'required|max:191',
            'route_id'=>'required|max:191',
            'status'=>'required|max:191',
        ]);
  
        $bus_routes = bus_routes::find($id);
        if($bus_routes)
        {
            $bus_routes->bus_id = $request->bus_id;
            $bus_routes->route_id = $request->route_id;
            $bus_routes->status = $request->status;		
            $bus_routes->update();
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
        $bus_routes = bus_routes::find($id);
        if($bus_routes)
        {
            $bus_routes->delete();
            return response()->json(['message'=>'Delete Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Delete Admin Details'], 404);
        }
    }

}
