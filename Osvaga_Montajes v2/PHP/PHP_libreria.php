<?php

//funció per a connectar amb la base de dades segons els paràmetres que se li passin
function connectar_BD ($host, $user, $pass, $bd)
{
	$con = mysqli_connect($host, $user, $pass, $bd);
	mysqli_set_charset($con, "utf8");
	if (!$con)
	{
		die("No s'ha pogut realitzar la connexió. ERROR:" . mysqli_connect_error());
	}
	return $con;
}

// Funció per a realitzar SELECT a la base de dades.
// Es dona per fet que la connexió s'ha realitzat prèviament
// Retorna el conjunt global de resultats del SELECT. Posteriorment s'haurà de fer servir la funció "Consulta_fila" per obtenir la primera fila de resultats
function consulta_SQL ($con, $consulta)
{
	$res = mysqli_query($con, $consulta);
	if (mysqli_errno($con) != 0) //si es produeix un error farem que el resultat de la consulta sigui null
	{
		$res = null;
	}
	return $res;
}

//Funció que obté la fila de dades d'una consulta prèviament realitzada
// Retorna totes les dades de la fila per se consultades posteriorment amb "consulta_dada"
function consulta_fila ($res)
{
	$fila = null;
	if ($res != null)
	{
		$fila = mysqli_fetch_assoc($res);
	}
	return $fila;
}

// Funció que donat un resultat de fer un "consulta_fila", i el nom d'un camp de la consulta, retorna la dada del camp del registre actual
// Tant si el nom del camp no existeix als resultats, com si ja s'han consultat totes les files del resultat, la funció retorna NULL
function consulta_dada ($fila, $camp)
{
	$dada= null;
	if ($fila != null)
	{
		$dada= $fila[$camp];	
	}
	return $dada;
}

function files_afectades ($con)
{
	if ($con != null)
	{
		$res = mysqli_affected_rows($con);	
	}	
	return ($res);	
}

function desconnectar_BD($con)
{
	if (isset($con))
	{
		mysqli_close($con);
	}
}

function tancar_consulta ($res)
{
	mysqli_free_result($res);
}

function missatge_error ($con)
{
	$res = "";
	if (mysqli_errno($con) != 0)
	{
		$res = mysqli_error($con);
	}
	return $res;
}
?>