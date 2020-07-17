<?php

namespace App\Http\Controllers;

use App\Country;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    

    public function index()
    {
        $country = Country::all();
        return response()->json($country);
    }
    public function getByName($name)
    {
        $country = Country::where('name', $name)->get();
        return response()->json($country);
    }
    /**
     * 
     */
    public function create(Request $request)
    {
        $country = Country::create($request->all());
        return response()->json($country);
    }

    /**
     * 
     */
    public function update(Request $request, $id)
    {
        $country = Country::find($id);
        $country->code = $request->input('code');
        $country->name = $request->input('code');
        $country->continet_name = $request->input('continet_name');
        $country->save();
        
        return response()->json($country);
        
    }

    /**
     * 
     */
    public function show($id)
    {
        $country  = Country::find($id);
        
 
        return response()->json($country);
    }

    /**
     * 
     */
    public function destroy($id)
    {
        $country  = Post::find($id);
    	$country->delete();
 
    	return response()->json('Removed successfully.');
    }
}
