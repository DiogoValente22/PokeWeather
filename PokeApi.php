<?php

class pokeApi{

    public $link = 'https://pokeapi.co/api/v2/';

    public function getPokemonByType($type){
        $fullLink = $this->link.'type/'.$type;

        $ch = curl_init($fullLink);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        return $data;
    }

    public function getPokemonidByName($pokemonName){
        $fullLink = $this->link.'pokemon/'.$pokemonName;

        $ch = curl_init($fullLink);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        return $data;
    }
    
}





?>
