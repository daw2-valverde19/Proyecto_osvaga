<?php
require ("PHP_libreria.php");

$servidor = "localhost";
$usuari = "valverde_oscar";
$contrasenya = "Valverde99ovg";
$bd = "valverde_Osvaga_Montajes";
$connexio = connectar_BD ($servidor, $usuari, $contrasenya, $bd);

$servicios = $_GET["servicios"];
$jsondata = array();
if($servicios == "Todos"){
    $dades = consulta_SQL ($connexio, "select * from Cubiertas union select * from Fachadas_ventiladas ");
	while ($todos = consulta_fila($dades)){
		$imagen = consulta_dada($todos, 'Imagen');
		$nombre = consulta_dada($todos, 'Nombre_servicio');
		$descripcion = consulta_dada($todos, 'Descripcion');
		
		array_push($jsondata, $imagen);
		array_push($jsondata, $nombre);
		array_push($jsondata, $descripcion);
	}
}else if($servicios == "Cubiertas"){
    $dades = consulta_SQL ($connexio, "select * from Cubiertas");
	while ($cubiertas = consulta_fila($dades)){
		$imagen = consulta_dada($cubiertas, 'Imagen');
		$nombre = consulta_dada($cubiertas, 'Nombre_servicio');
		$descripcion = consulta_dada($cubiertas, 'Descripcion');
		
		array_push($jsondata, $imagen);
		array_push($jsondata, $nombre);
		array_push($jsondata, $descripcion);
	}
}

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata,JSON_FORCE_OBJECT);
tancar_consulta ($dades);
desconnectar_BD ($connexio);
?>
