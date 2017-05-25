<?php

class DataClient
{

    
    public function __construct() {
        
    }


    public function getWeather($departureCity, $departureDate, $arrivalCity, $arrivalDate){  
         $postData = array(
            'DepartureCity' => $departureCity,
            'DepartureDate' => $departureDate,
            'ArrivalCity' => $arrivalCity,
            'ArrivalDate' => $arrivalDate
        );

        $options = array(
            'http' => array(
            'method'  => 'POST',
            'content' => json_encode( $postData ),
            'header'=>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n"
            )
        );

        $url = "http://178.62.4.241/api/Provider/weather.json";
        $context  = stream_context_create( $options );
        $result = file_get_contents( $url, false, $context );
        $response = json_decode( $result );

        return $response;        
    }

    public function getGate($flightNumber, $date){   
        $postData = array(
            'Company' => 'AdamAir',
            'FlightNumber' => $flightNumber,
            'Date' => $date
        );

        $options = array(
            'http' => array(
            'method'  => 'POST',
            'content' => json_encode( $postData ),
            'header'=>  "Content-Type: application/json\r\n" .
                        "Accept: application/json\r\n"
            )
        );

        $url = "http://178.62.4.241/api/Provider/gate.json";
        $context  = stream_context_create( $options );
        $result = file_get_contents( $url, false, $context );
        $response = json_decode( $result );

        return $response;
    }
}