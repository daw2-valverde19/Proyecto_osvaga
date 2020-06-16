<?php
require ("PHP_libreria.php");

$servidor = "localhost";
$usuari = "valverde_oscar";
$contrasenya = "Valverde99ovg";
$bd = "valverde_Osvaga_Montajes";
$connexio = connectar_BD ($servidor, $usuari, $contrasenya, $bd);






if((isset($_POST["user_login"])) && !empty($_POST["user_login"]) && !empty($_POST["pass_login"])){/////LOGIN//////////
    if(isset($_POST["user_login"])){
        $nombre_usuario = $_POST["user_login"];
        $pass_usuario = $_POST["pass_login"];
        
        $dades = consulta_SQL ($connexio, "select * from Usuarios where Nombre_usuario like '$nombre_usuario'");
    
        $Usuario = consulta_fila($dades);
    
        $user = consulta_dada($Usuario, 'Nombre_usuario');
    	$password = consulta_dada($Usuario, 'Password');
    
        if(($user==$nombre_usuario)&&($password==$pass_usuario)&&($dades!=null)){
            
            session_start();///abrimos una sesion
            $_SESSION["usuario"] = $nombre_usuario;///gardamos el nombre del usuario
            
            header('Location: ../Maquetacion/home.html');
            
            
    
        }else{
            echo("<script>alert('Error! El usuario no existe')</script>");
            echo("<script>window.location = '../Maquetacion/index.html';</script>");    
    
        }
        
        
    }else if(isset($_POST["nombre"])){////////REGISTRO/////
        echo "registro";
    
        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $email = $_POST["email"];
        $user = $_POST["user"];
        $pass = $_POST["pass"];
        
        $dades = consulta_SQL ($connexio, "INSERT INTO Usuarios (Nombre,Apellido,Mail,Nombre_usuario,Password,Tipo) VALUES ('$nombre' , '$apellido' , '$email' , '$user' , '$pass' , 0)");
    }
}else{
    echo("<script>alert('Es obligatorio rellenar todos los campos!')</script>");
    echo("<script>window.location = '../Maquetacion/index.html';</script>");    
}
/*
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
echo json_encode($jsondata,JSON_FORCE_OBJECT);*/
tancar_consulta ($dades);
desconnectar_BD ($connexio);
?>
