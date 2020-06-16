<?php
require ("PHP_libreria.php");

$servidor = "localhost";
$usuari = "valverde_oscar";
$contrasenya = "Valverde99ovg";
$bd = "valverde_Osvaga_Montajes";
$connexio = connectar_BD ($servidor, $usuari, $contrasenya, $bd);

session_start();

if(isset($_SESSION["usuario"])){
    $usuario = $_SESSION["usuario"] ;
    echo "<h3 style='padding-top:25%'>Hola, ".$usuario." !</h3>";
}else{
    echo "no";
}

            
            

tancar_consulta ($dades);
desconnectar_BD ($connexio);
?>
