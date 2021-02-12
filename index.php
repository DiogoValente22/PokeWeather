<?php

require('./APIs/PokeApi.php');
require('./APIs/WeatherApi.php');

$pokeApi = new PokeApi();
$weatherApi = new WeatherApi();

$city = $_GET['city'] ?? 'Curitiba';
$data = $weatherApi->getWeatherByCity($city);
$weatherCode = $data['cod'];

$msg = '';
if($city == '' or $city == ' ' or $city == null){
    $msg = '<b>O campo está em branco. Por favor insira uma cidade';
    $pokeImg = '';
}else if($weatherCode == 404){
    $msg = 'A cidade '. $city. 'digitada não foi encontrada, verifique ortografia e tente novamente';
    $pokeImg = '';
}else{
    $weather = $data['weather'][0]['main'] ?? '';
    $temp = round($data['main']['temp'] -273.15, 0);
    $type = '';

    if($temp < 5){
        $type = 'ice';
    } else if($temp >=5 && $temp < 10){
        $type = 'water';
    } else if($temp >=12 && $temp < 15){
        $type = 'grass';
    } else if($temp >=15 && $temp < 21){
        $type = 'ground';
    } else if($temp >=23 && $temp < 27){
        $type = 'bug';
    } else if($temp >=27 && $temp <= 33){
        $type = 'rock';
    } else if($temp > 33){
        $type = 'fire';
    } else{
        $type = 'normal';
    }

    if($weather == 'Rain'){
        $type = 'electric';
        $rain = "<b>chove</b> e";
    }else{
        $rain = '';
    }

    $pokemonType = $pokeApi->getPokemonByType($type);
    $pokemonCount = count($pokemonType['pokemon']);
    $pokemonRand = $pokemonType['pokemon'][rand(0, $pokemonCount)];
    $pokemonName = $pokemonRand['pokemon']['name'];
    $pokemonSearch = $pokeApi->getPokemonidByName($pokemonName);
    $pokemonId = $pokemonSearch['id'];
    $pokeImg = '<img src="https://pokeres.bastionbot.org/images/pokemon/'.$pokemonId.'.png" alt="pokemon" class="img-fluid my-4">';

    $msg = "Em <b>$city</b>, $rain faz <b>$temp</b>ºC. Nessas redondezas existem Pokemons do tipo <span id='poke-type'><b>$type</b></span> e foi visto um <b>$pokemonName</b>.";
}





?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PokeWeather Challenge</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="bg-water">
    

    <div class="container-fluid">
        <div class="row">
            <div class="col">
                <div class="logo-image d-flex justify-content-center">
                    <img src="assets/img/logo/pokeweather-logo.png" class="img-fluid" alt="logo">
                </div>
                
            </div>

            <div class="col-12 d-flex justify-content-center align-items-center" id="box2">

                <div class="box d-flex flex-column align-items-center">

                    <p class="p-3" id="insert">Insira uma <b>cidade</b> para exibir um pokemon de acordo com o clima e a temperatura.</p>

                    <form method="GET">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="city" id="city-input" placeholder="Ex: Curitiba">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12">
                                    <div id="btn-submit">
                                        <button type="submit" class="btn btn-primary">Buscar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </form>

                    <div class="pokemon-image">
                        <?php
                            echo $pokeImg;
                        ?>
                    </div>
                    <p id="information" class="p-3">
                        <?php
                        
                        echo $msg;

                        ?>
                    </p>

                </div>

            </div>
        </div>
    </div>


    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/index.js"></script>

    <script type="text/javascript">
    
        $(document).ready(function(){

            let poketype = $('#poke-type').text();

            if(poketype == '' || poketype == null){
                console.log("kk null");
            }else if(poketype == 'ice'){
                $('body').removeClass();
                $('body').addClass('bg-ice');
                $('.box').css('background-color', 'rgba(0,0,0,0.4)');
            }else if(poketype == 'water'){
                $('body').removeClass();
                $('body').addClass('bg-water');
                $('.box').css('background-color', 'rgba(255,255,255,0.6)');
                $('p').css('color', 'black');
            }else if(poketype == 'grass'){
                $('body').removeClass();
                $('body').addClass('bg-grass');
                $('p').css('color', 'black');
                $('.box').css('background-color', 'rgba(255,255,255,0.6)');
            }else if(poketype == 'ground'){
                $('body').removeClass();
                $('body').addClass('bg-ground');
                $('.box').css('background-color', 'rgba(255,255,255,0.6)');
                $('p').css('color', 'black');
            }else if(poketype == 'bug'){
                $('body').removeClass();
                $('body').addClass('bg-bug');
                $('#insert').css('color', 'black');
            }else if(poketype == 'rock'){
                $('body').removeClass();
                $('body').addClass('bg-rock');
                $('.box').css('background-color', 'rgba(255,255,255,0.6)');
                $('p').css('color', 'black');
            }else if(poketype == 'fire'){
                $('body').removeClass();
                $('body').addClass('bg-fire');
                $('.box').css('background-color', 'rgba(255,255,255,0.6)');
                $('p').css('color', 'black');
            }else if(poketype == 'normal'){
                $('body').removeClass();
                $('body').addClass('bg-normal');
            }else if(poketype == 'electric'){
                $('body').removeClass('bg-water');
                $('body').addClass('bg-electric');
                $('.box').css('background-color', 'rgba(255,255,255,0.6)');
                $('p').css('color', 'black');
            }

        });  

    </script>

</body>
</html>
