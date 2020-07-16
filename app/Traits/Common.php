<?php
 
namespace App\Traits;
 
trait Common {
 
    public function getCity($locationData) {
    	if(empty($locationData))
    		return;
  
    	$cityInfo = null;
    	if(!empty($locationData['city'])){
            $cityInfo = $locationData['city'];
        }else if(!empty($locationData['localityInfo']['administrative'][2]['name'])){
            $cityInfo = $locationData['localityInfo']['administrative'][2]['name'];
            $cityInfo = chop($cityInfo,'district'); 
        }else if(!empty($locationData['principalSubdivision'])){
            $cityInfo = $locationData['principalSubdivision'];
        }

        return $cityInfo;

    }


    public function getLocation($locationData) {
    	if(empty($locationData))
    		return;

    	$locationInfo = null;
    	if(!empty($locationData['locality'])){
            $locationInfo = $locationData['locality'];
        }else if(!empty($locationData['localityInfo']['administrative'][6]['name'])){
            $locationInfo = $locationData['localityInfo']['administrative'][6]['name'];
        }

        return $locationInfo;

    }

    public function getCityFromLocationIq($locationData){
        if(empty($locationData))
            return '';

        if(!empty($locationData['address']['city'])){
            return $locationData['address']['city'];
        }elseif (!empty($locationData['address']['town'])){
            return $locationData['address']['town'];
        }elseif (!empty($locationData['address']['county'])) {
            return $locationData['address']['county'];
        }

        return '';
    }

    public function getLocalityFromLocationIq($locationData){
        if(empty($locationData))
            return '';
   
        if(!empty($locationData['address']['suburb'])){
            return $locationData['address']['suburb'];
        }elseif (!empty($locationData['display_name'])){
            return $locationData['display_name'];
        }

        return '';
    }
 
}
 