$(document).ready(function(){
    por_defecto_servicios();
    $("#Todos").click(todos_servicios);
    $("#Cubiertas").click(todos_servicios);


});



function por_defecto_servicios(){
    var servicios="Todos";

    $.ajax({
        type: "GET",
        url: "../PHP/servicios.php",
        data: {
            'servicios' : servicios,
        dataType:"JSON",
        } ,
        success: function(data){
            var cont = 0;
            var tarjeta ="<h2>Todos</h2>";
             for(var i = 1; i <= Object.keys(data).length; i++){
                tarjeta += "<div class='card-deck'>";
                i++;
                for(x=0;x<3;x++){
                    if((data[cont]==undefined)&&(x==2)){
                        tarjeta += "<div class='card offset 3' style='border:none; box-shadow:none;'></div>";
                        x=3;
                    }else{
                        i++;
                        tarjeta += "<div class='card'> <img class='card-img-top' src=" +data[cont]+ " alt='Card image cap'>";
                        cont++;
                        tarjeta += "<div class='card-body'> <h5 class='card-title'>" +data[cont]+ "</h5>";
                        cont++;
                        tarjeta += "<p class='card-text'>" +data[cont]+ ".</p> </div></div>";
                        cont++;
                        i++;
                    }

                }
                i++;
                tarjeta += "</div>";
                $("#tarjetas_servicios").html(tarjeta);
            }
            //$("#tarjetas_servicios").html(tarjeta);
        }
    });
}



function todos_servicios(evento){
    var servicios = evento.target.id;

        $.ajax({
        type: "GET",
        url: "../PHP/servicios.php",
        data: {
            'servicios' : servicios,
        dataType:"JSON",
        } ,
        success: function(data){
            var cont = 0;
            var tarjeta ="<h2>"+servicios+"</h2>";
             for(var i = 1; i <= Object.keys(data).length; i++){
                tarjeta += "<div class='card-deck'>";
                i++;
                for(x=0;x<3;x++){
                    if((data[cont]==undefined)&&((x==1)||(x==2))){
                        tarjeta += "<div class='card offset 3' style='border:none; box-shadow:none;'></div>";
                        var xTemp = x;
                        x=3;
                        if(xTemp==1){
                        tarjeta += "<div class='card offset 3' style='border:none; box-shadow:none;'></div>";
                        }
                    }else{
                        i++;
                        tarjeta += "<div class='card'> <img class='card-img-top' src=" +data[cont]+ " alt='Card image cap'>";
                        cont++;
                        tarjeta += "<div class='card-body'> <h5 class='card-title'>" +data[cont]+ "</h5>";
                        cont++;
                        tarjeta += "<p class='card-text'>" +data[cont]+ ".</p> </div></div>";
                        cont++;
                        i++;
                    }
                }
                i++;
                tarjeta += "</div>";
                $("#tarjetas_servicios").html(tarjeta);
            }
            //$("#tarjetas_servicios").html(tarjeta);
        }
    });
}