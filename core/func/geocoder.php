<?php

/**
 * File: address_to_lat_and_lng.php
 * Description: Address to latitude and longitude
 * Author: SHMATOK
 */
function geocoder($address)
{

    $address = urlencode($address);
    $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $address . "&sensor=true";
    $xml = simplexml_load_file($request_url) or die("url not loading");
    $status = $xml->status;

    if ($status == "OK") {
        $Lat = $xml->result->geometry->location->lat;
        $Lon = $xml->result->geometry->location->lng;
        $LatLng = "$Lat,$Lon";
        return $LatLng;
    }
}
?>