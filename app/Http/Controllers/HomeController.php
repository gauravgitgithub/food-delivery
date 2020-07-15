<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CurlRequest;
use App\States;
use App\Cities;
use App\Localities;



class HomeController extends Controller
{

    use CurlRequest;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         $url = null;
         if(!empty(config('app.reverse_geocoding'))){
            $url = config('app.reverse_geocoding');
         }
         $lat = $request->latitude;
         $lng = $request->longitude;
         
         $locationData = $this->getLocationAddress($url, $lat, $lng);
         if(!empty($locationData)){
            $this->saveLocalitiesInDB($locationData);
         }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Store Information for new localities
     * @return \Illuminate\Http\Response
     */
    protected function saveLocalitiesInDB($data){
        if(!empty($data)){
            $cityInfo = null;
            if(!empty($data['city'])){
                $cityInfo = $data['city'];
            }else if(!empty($data['localityInfo']['administrative'][2]['name'])){
                $cityInfo = $data['localityInfo']['administrative'][2]['name'];
                $cityInfo = chop($cityInfo,'district'); 
            }else if(!empty($data['principalSubdivision'])){
                $cityInfo = $data['principalSubdivision'];
            }
            
            $cityData = Cities::where('city', $cityInfo)->orWhere('city', 'like', '%' . $cityInfo . '%')->get(array('id', 'city','state_id'));
            echo "<pre>";
            print_r($cityData->map->city);

        }

    }
}
