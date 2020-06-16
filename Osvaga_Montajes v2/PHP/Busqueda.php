<?php
require ("PHP_libreria.php");

$servidor = "localhost";
$usuari = "valverde_oscar";
$contrasenya = "Valverde99ovg";
$bd = "valverde_Osvaga_Montajes";
$connexio = connectar_BD ($servidor, $usuari, $contrasenya, $bd);


$textoBusqueda = $_POST["texto"];
$dades = consulta_SQL ($connexio, "select * from Fachadas_ventiladas where Nombre_servicio like '$textoBusqueda%' union all select * from Cubiertas where Nombre_servicio like '$textoBusqueda%' LIMIT 5");
$jsondata = array();

if (($dades != null)&&($textoBusqueda != null)){
	while ($Fachadas_ventiladas = consulta_fila($dades)){
		$nombre = consulta_dada($Fachadas_ventiladas, 'Nombre_servicio');
		array_push($jsondata, $nombre);
	}
}
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata,JSON_FORCE_OBJECT);
tancar_consulta ($dades);
desconnectar_BD ($connexio);
?>

