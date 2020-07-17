<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Response;
use Input;
use App\Tour;
use DB;

class TripController extends Controller
{
    
    public function store(Request $request) {
        $userId = $request['user_id'];
        $start_at = strtotime($request['start_at']);
        $end_at = strtotime($request['end_at']);
        
        DB::insert('insert into tour (start_at, end_at, user_id) values (?, ?, ?)', [date('Y-m-d',$start_at), date('Y-m-d',$end_at), $userId]);
        
        $result = DB::table('tour')->pluck('id')->last();
        
        return $result;
    }
    public function storePlaces(Request $request) {
        $place_id = $request['place_id'];
        $tour_id = $request['tour_id'];
        
        DB::insert('insert into places_visited (place_id, tour_id) values (?, ?)', [$place_id, $tour_id]);
        
        $result = DB::table('tour')->pluck('id')->last();
        
        return $result;
    }
    public function tripPlannerByCity(Request $request)
    {
        $dest1 = $request->input('destiantion1');
        $dest2 = $request->input('destiantion2');
        $dest3 = $request->input('destiantion3');
        $error1 = FALSE;
        $error2 = FALSE;
        $error3 = FALSE;
        $returnView =  view('trip');

        $dest1url = "http://localhost:8000/api/v1/places/bycityname/" . $dest1;
        $dest2url = "http://localhost:8000/api/v1/places/bycityname/" . $dest2;
        $dest3url = "http://localhost:8000/api/v1/places/bycityname/" . $dest3;
        if ($json1 = @file_get_contents($dest1url)) {
            $jsonDest1 = json_decode($json1, true);
            //$data = array_filter($jsonDest1);
            //$data = collect($data)->where("type_id","1")->all();
            $returnView->with('places1', $jsonDest1);
        }else {
            $error1 = TRUE;
        }
        if($json2 = @file_get_contents($dest2url)){
            $jsonDest2 = json_decode($json2, true);
           // $data = array_filter($jsonDest2);
            //$data = collect($data)->where("type_id","3")->all();
            $returnView->with('places2', $jsonDest2);
        }else {
            $error2 = TRUE;
        }
        if($json3 = @file_get_contents($dest3url)){
            $jsonDest3 = json_decode($json3, true);
            $returnView->with('places3', $jsonDest3);
        }else {
            $error3 = TRUE;
        }
        $typePlaces = @file_get_contents("http://localhost:8000/api/v1/type/index/");
        $typePlaces = json_decode($typePlaces, true);
        return $returnView->with('typePlaces',$typePlaces);
    }
    
     public function filter(Request $request){
        $dest1 = $request->input('d1');
        $dest2 = $request->input('d2');
        $dest3 = $request->input('d3');
        $error1 = FALSE;
        $error2 = FALSE;
        $error3 = FALSE;
        $typePlaces = @file_get_contents("http://localhost:8000/api/v1/type/index/");
        $typePlaces = json_decode($typePlaces, true);
        $returnView =  $typePlaces;

        $dest1url = "http://localhost:8000/api/v1/places/bycityname/" . $dest1;
        $dest2url = "http://localhost:8000/api/v1/places/bycityname/" . $dest2;
        $dest3url = "http://localhost:8000/api/v1/places/bycityname/" . $dest3;
        if ($json1 = @file_get_contents($dest1url)) {
            $places1 = json_decode($json1, true);
            $returnView = [$typePlaces, $places1];
        }else {
            $error1 = TRUE;
        }
        if($json2 = @file_get_contents($dest2url)){
            $places2 = json_decode($json2, true);
            $returnView = [$typePlaces, $places1, $places2] ;
        }else {
            $error2 = TRUE;
        }
        if($json3 = @file_get_contents($dest3url)){
            $jsonDest3 = json_decode($json3, true);
            $returnView->with('places3', $jsonDest3);
        }else {
            $error3 = TRUE;
        }
        
        return $returnView;
     }
    public function view(){
        return view('trip2');
    }

    public function index(){
        $trips = DB::table('tour')->get();
         $jsonDest3 = json_decode($trips, true);
        return view('dashboard.trips')->with('trips', $jsonDest3);
    }
    public function show($id)
    {
        $places = DB::table('places_visited')->where("tour_id",$id)->pluck('place_id')->all();
        $trips = DB::table('tour')->where("id",$id)->get();
        $jsonDest = json_encode($places, true);
        $json = json_decode($trips, true);
        $idOfPlaces = print_r($jsonDest,true);
        $typePlaces = @file_get_contents("http://localhost:8000/api/v1/places/index/");
        $typePlaces = json_decode($typePlaces, true);
        $laravelArray = collect($typePlaces);
        $filtered = $laravelArray->where('id')->all();
        return view('dashboard.singleTrip')->with('trip', $json)->with('places', $filtered);
    }
}
