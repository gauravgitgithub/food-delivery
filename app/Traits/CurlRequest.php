<?php
 
namespace App\Traits;
 
trait CurlRequest {
 
    public function getLocationAddress($url = null,$latitude = null, $longitude = null) {

    	if(!empty($url) && !empty($latitude) && !empty($longitude)){
    		$url = $url .'?latitude='.$latitude.'&longitude='.$longitude;
	 		$cURLConnection = curl_init();
			curl_setopt($cURLConnection, CURLOPT_URL, $url);
			curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($cURLConnection);
			curl_close($cURLConnection);
			$jsonArrayResponse = json_decode($result,true);
			return $jsonArrayResponse;
    	}else{
    		return array('error' => true, 'message' => 'Invalid Information');
    	}
    }

    public function getAddress($url = null,$latitude = null, $longitude = null) {

    	if(!empty($url) && !empty($latitude) && !empty($longitude)){
    		$coordinates = array("LATITUDE" => $latitude, "LONGITUDE" => $longitude);
    		$url = strtr($url, $coordinates);
	 		$cURLConnection = curl_init();
			curl_setopt($cURLConnection, CURLOPT_URL, $url);
			curl_setopt($cURLConnection, CURLOPT_RETURNTRANSFER, true);
			$result = curl_exec($cURLConnection);
			curl_close($cURLConnection);
			$jsonArrayResponse = json_decode($result,true);
			return $jsonArrayResponse;
    	}else{
    		return array('error' => true, 'message' => 'Invalid Information');
    	}
    }
 
}
 