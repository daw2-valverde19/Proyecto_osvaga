$(document).ready(function(){
    $("#barra_busqueda").keyup(buscar);
    $("#barra_busqueda").blur(ocultar_resultados);
    $("#barra_busqueda").focus(ver_resultados);
    refresh = 0;

});



//////BUSCADOR DINAMICO
function buscar(){
    console.log("ok");
    var textoBusqueda = $("#barra_busqueda").val();

    $.ajax({
        type: "POST",
        url: "../PHP/Busqueda.php",
        data: {
            'texto' : textoBusqueda,
        dataType:"JSON",
        } ,
        success: function(data){
            var tabla = "<table>";
            var cont = 0;
            for(var i = 1; i <= Object.keys(data).length; i++){
                tabla += "<tr><td><a href='Seleccion_busqueda.php?nombre="+data[cont]+"'>"+data[cont]+"</a></td></tr>";
                cont++;
            }
            tabla += "</table>";
            //console.log(tabla);
            $("#resultados_busqueda").html(tabla);
        }
    });
}

function ocultar_resultados(){
    console.log("oculta");
    refresh = setInterval(function(){
        $("#resultados_busqueda").hide();
    }, 100);
}

function ver_resultados(){
    console.log("neseña");
    clearInterval(refresh);
    $("#resultados_busqueda").show();
}