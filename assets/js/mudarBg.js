$(document).ready(function(){

    //kk preciso refatorar isso [check]

    function mudarBg(section){
        $('body').removeClass();
        $('body').addClass(section);
    }

    sections = ['bg-ice', 'bg-water', 'bg-grass', 'bg-ground', 'bg-bug','bg-rock', 'bg-fire', 'bg-normal', 'bg-electric', 'bg-null'];

    let poketype = $('#poke-type').text();

    let index;

    if(poketype == '' || poketype == null){
        index = 7;
    }else if(poketype == 'ice'){
        index = 0;
    }else if(poketype == 'water'){
        index = 1;
    }else if(poketype == 'grass'){
        index = 2;
    }else if(poketype == 'ground'){
        index = 3;
    }else if(poketype == 'bug'){
        index = 4;
    }else if(poketype == 'rock'){
        index = 5;
    }else if(poketype == 'fire'){
        index = 6;
    }else if(poketype == 'normal'){
        index = 7;
    }else if(poketype == 'electric'){
        index = 8;
    }

    mudarBg(sections[index]);

});