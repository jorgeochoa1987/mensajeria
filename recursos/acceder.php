<?php
	
//Conectamos a la base de datos
require('../conex/conexion.php');

//Obtenemos los datos del formulario de acceso
$userPOST = $_POST["username"]; 
$passPOST = $_POST["pass"];

//Filtro anti-XSS
$userPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $userPOST));
$passPOST = htmlspecialchars(mysqli_real_escape_string($conexion, $passPOST));

//Definimos la cantidad máxima de caracteres
//Esta comprobación se tiene en cuenta por si se llegase a modificar el "maxlength" del formulario
//Los valores deben coincidir con el tamaño máximo de la fila de la base de datos
$maxCaracteresUsername = "100";
$maxCaracteresPassword = "100"; 

//Si los input son de mayor tamaño, se "muere" el resto del código y muestra la respuesta correspondiente
if(strlen($userPOST) > $maxCaracteresUsername) {
	die('El nombre de usuario no puede superar los '.$maxCaracteresUsername.' caracteres');
};

if(strlen($passPOST) > $maxCaracteresPassword) {
	die('La contraseña no puede superar los '.$maxCaracteresPassword.' caracteres');
};

//Pasamos el input del usuario a minúsculas para compararlo después con
//el campo "usernamelowercase" de la base de datos
$upperuser = $userPOST;
 
//Escribimos la consulta necesaria
$consulta = "SELECT * FROM `users` WHERE correo='".$upperuser."'";

//Obtenemos los resultados
$resultado = mysqli_query($conexion, $consulta);
$datos = mysqli_fetch_array($resultado);

//Guardamos los resultados del nombre de usuario en minúsculas
//y de la contraseña de la base de datos
$userBD = $datos['correo'];
$passwordBD = $datos['contrasenia'];

//Comprobamos si los datos son correctos
if($userBD == $upperuser and $passPOST== $passwordBD){ 
	session_start();
	$_SESSION['id'] = $datos['id'];
	$_SESSION['usuario'] = $datos['usuario'];
	$_SESSION['nombreapellido'] = $datos['nombreApellido'];
	$_SESSION['foto'] = $datos['foto'];
	$_SESSION['estado'] = 'Autenticado';
	//redirecciono
	header("Location:../redirect.html");
echo "ingresando";
//Si los datos no son correctos, o están vacíos, muestra un error
//Además, hay un script que vacía los campos con la clase "acceso" (formulario)
} else if ( $userBD != $upperuser || $userPOST == "" || $passPOST == "" || !password_verify($passPOST, $passwordBD) ) {
	die ('<script>$(".acceso").val("");</script>
		Los datos de acceso son incorrectos'.$userBD .$passwordBD );
} else {
	die('Error');
};

?>