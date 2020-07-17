<?php

namespace App\Http\Controllers;

use App\City;
use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CityController extends Controller
{
    

    public function index()
    {
        $city = City::all();
        return response()->json($city);
    }

    /**
     * 
     */
    public function create(Request $request)
    {
        $city = City::create($request->all());
        return response()->json($city);
    }
    
    public function getCityCountry($name)
    {
        $city = City::where('name', $name)->first()->country_id;
        $country = Country::where('id', $city)->first();
        return response()->json(['city' => $name, 'country' => $country->name]);

    }
    /**
     * 
     */
    public function update(Request $request, $id)
    {
        $city = City::find($id);
        $city->code = $request->input('code');
        $city->name = $request->input('name');
        $city->country_id = $request->input('country_id');
        $city->save();
        
        return response()->json($city);
        
    }

    /**
     * 
     */
    public function show($id)
    {
        $city = City::find($id);
        
 
        return response()->json($city);
    }

    /**
     * 
     */
    public function destroy($id)
    {
        $city  = City::find($id);
    	$city->delete();
 
    	return response()->json('Removed successfully.');
    }
}
