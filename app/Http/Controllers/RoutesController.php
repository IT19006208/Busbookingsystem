<?php

namespace App\Http\Controllers;
use App\routes;
use Illuminate\Http\Request;

class RoutesController extends Controller
{
    //Get Function
    public function index()
    {
        $routes = routes::all();
        return response()->json(['routes'=> $routes], 200);
    }

    //Show Function
    public function show($id)
    {
        $routes = routes::find($id);

        if($routes)
        {
            return response()->json(['routes'=> $routes], 200);
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
            'node_one'=>'required|max:191',
            'node_two'=>'required|max:191',
            'route_number'=>'required|max:191',
            'distance'=>'required|max:191',
            'time'=>'required|max:191',
        ]);
  
        $routes = new routes;
        $routes->node_one = $request->node_one;
        $routes->node_two = $request->node_two;
        $routes->route_number = $request->route_number;	
        $routes->distance = $request->distance;	
        $routes->time = $request->time;	
        $routes->save();
        return response()->json(['message'=>'Added Successfully'], 200);
    }

    //Update Function
    public function update(Request $request, $id)
    {
        $request->validate([
            'node_one'=>'required|max:191',
            'node_two'=>'required|max:191',
            'route_number'=>'required|max:191',
            'distance'=>'required|max:191',
            'time'=>'required|max:191',
        ]);
  
        $routes = routes::find($id);
        if($routes)
        {
            $routes->node_one = $request->node_one;
            $routes->node_two = $request->node_two;
            $routes->route_number = $request->route_number;	
            $routes->distance = $request->distance;	
            $routes->time = $request->time;		
            $routes->update();
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
        $routes = routes::find($id);
        if($routes)
        {
            $routes->delete();
            return response()->json(['message'=>'Delete Successfully'], 200);
        }
        else
        {
            return response()->json(['message'=>'Not Delete Admin Details'], 404);
        }
    }

}
