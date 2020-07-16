<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CurlRequest;
use App\Traits\Common;
use App\States;
use App\Cities;
use App\Localities;



class HomeController extends Controller
{

    use CurlRequest,Common;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $geocodingService = 'locationiq';

    public function index(Request $request)
    {
         $url = null;

         if($this->geocodingService == "locationiq"){
            $configUrl = config('app.locationiq_reverse');
         }else{
            $configUrl = config('app.reverse_geocoding');
         }

         if(!empty($configUrl)) {
            $url = $configUrl;
         }
         $lat = $request->latitude;
         $lng = $request->longitude;
         
         if($this->geocodingService == "locationiq"){
             $locationData = $this->getAddress($url, $lat, $lng);
         }else{
            $locationData = $this->getLocationAddress($url, $lat, $lng);
         }
        
         if(!empty($locationData)){

            //Saving new entries for localities
            $this->saveLocalitiesInDB($locationData);

            if($this->geocodingService == "locationiq"){
                $city = $this->getCityFromLocationIq($locationData);
                $locality = $this->getLocalityFromLocationIq($locationData);
            }else{
                $city = $this->getCity($locationData);
                $locality = $this->getLocation($locationData);
            }

            echo $locality.','.$city;exit;
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
             if($this->geocodingService == "locationiq"){
                $cityInfo = $this->getCityFromLocationIq($data);
                $localityInfo = $this->getLocalityFromLocationIq($data);
             }else{
                $cityInfo = $this->getCity($data);
                $localityInfo = $this->getLocation($data);
             }
            
            $cityData = Cities::where('city', $cityInfo)->orWhere('city', 'like', '%' . $cityInfo . '%')->get(array('id', 'city','state_id'));

            if(empty($cityData))
                return;

            foreach ($cityData as $key => $value) {
                $isLocalityExists = Localities::where('name', '=', $localityInfo)->first();
                if($isLocalityExists)
                    return;

                $locality = new Localities([
                    'state_id' => $value->state_id,
                    'city_id' => $value->id,
                    'name' => $localityInfo,
                ]);

                if($this->geocodingService == "locationiq"){
                    $locality['latitude'] = $data['lat'];
                    $locality['longitude'] = $data['lon'];
                    $locality['principal_subdivision'] = $data['address']['state'];

                }else{
                    $locality['latitude'] = $data['latitude'];
                    $locality['longitude'] = $data['longitude'];
                    $locality['principal_subdivision'] = $data['principalSubdivision'];
                    $locality['principal_subdivision_code'] = $data['principalSubdivisionCode'];
                    $locality['pluscode'] = $data['plusCode'];
                }               

                $locality->save();
            }
            return;
        }
        return;

    }
}
