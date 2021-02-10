<?php

class weatherApi{

    // api key  => https://openweathermap.org/api
    public $key = '63db28e81ced2933fab488f422613147';

    public function getWeatherByCity($city) {
        $link = 'api.openweathermap.org/data/2.5/weather?q='.$city.'&appid='.$this->key;
        $ch = curl_init($link);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        return $data;
    }
    
}

// $wapi = new weatherApi();
// $city = 'campinass';
// $cityy = $wapi->getWeatherByCity($city);
// $cod = $cityy['cod'];
// echo $cod;

?>