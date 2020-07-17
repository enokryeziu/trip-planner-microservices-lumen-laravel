<?php

namespace App\Http\Controllers;

use App\Places;
use App\City;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlacesController extends Controller
{
    public function getPlacesByCityId($id)
    {
        $places = Places::where('city_id', $id)->get();
        return response()->json($places);
    }
    public function getPlacesByCityName($name)
    {
        $city = City::where('name', $name)->first()->id;
        $places = Places::where('city_id', $city)->get();
        return response()->json($places);
    }

    public function index()
    {
        $places = Places::with('city')->get();
        return response()->json($places);
    }

    /**
     * 
     */
    public function create(Request $request)
    {
        $places = Places::create($request->all());
        return response()->json($places);
    }

    /**
     * 
     */
    public function update(Request $request, $id)
    {
        $places = Places::find($id);
        $places->name = $request->input('name');
        $places->type_id = $request->input('type_id');
        $places->description = $request->input('description');
        $places->address = $request->input('address');
        $places->city_id = $request->input('city_id');
        $places->save();
        
        return response()->json($places);
        
    }

    /**
     * 
     */
    public function show($id)
    {
        $places = Places::find($id);
        
 
        return response()->json($places);
    }

    /**
     * 
     */
    public function destroy($id)
    {
        $places  = Places::find($id);
    	$places->delete();
 
    	return response()->json('Removed successfully.');
    }
}
