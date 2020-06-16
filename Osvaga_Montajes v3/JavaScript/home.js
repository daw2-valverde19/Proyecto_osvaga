$(document).ready(function(){
    saludo_usuario();

});
function saludo_usuario(){
    $.ajax({
        type: "GET",
        url: "../PHP/saludo_usuario.php",
        success: function(data){
            $("#saludo_usuario").html(data);
        }
    });
}
