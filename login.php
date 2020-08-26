  <?php
//Iniciamos la sesión
session_start();

//Pedimos el archivo que controla la duración de las sesiones
require('recursos/sesiones.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Formulario inicio de sesión</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/bg-01.jpg');">
			<div class="wrap-login100">
				<form class="login100-form validate-form" id="acceso">
					<span class="login100-form-logo">
					<img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 85px;" src="aplication/images/menu.svg" alt="">
					</span>

					<span class="login100-form-title p-b-34 p-t-27">
						Inicio de sesión
					</span>
					<div id="mensaje" style="border:1px solid #CCC; padding:10px;"></div>


					<div class="wrap-input100 validate-input" data-validate = "Ingrese Usuario">
						<input class="input100" type="text" name="username" placeholder="usuario">
						<span class="focus-input100" data-placeholder="&#xf207;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Ingrese Contraseña">
						<input class="input100" type="password" name="pass" placeholder="contraseña">
						<span class="focus-input100" data-placeholder="&#xf191;"></span>
					</div>

					<div class="contact100-form-checkbox">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Recordarme
						</label>
					</div>

					<input style="background:white; color:black;" type="submit" name="acceso" class="login100-form-btn" value="Iniciar">

					
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->


	<script>
//Guardamos el controlador del div con ID mensaje en una variable
var mensaje = $("#mensaje");
//Ocultamos el contenedor
mensaje.hide();

//Cuando el formulario con ID acceso se envíe...
$("#acceso").on("submit", function(e){

	//Evitamos que se envíe por defecto
	e.preventDefault();
	//Creamos un FormData con los datos del mismo formulario
	var formData = new FormData(document.getElementById("acceso"));
	

	//Llamamos a la función AJAX de jQuery
	$.ajax({
		//Definimos la URL del archivo al cual vamos a enviar los datos
		url: "recursos/acceder.php",
		//Definimos el tipo de método de envío
		type: "POST",
		//Definimos el tipo de datos que vamos a enviar y recibir
		dataType: "HTML",
		//Definimos la información que vamos a enviar
		data: formData,
		//Deshabilitamos el caché
		cache: false,
		//No especificamos el contentType
		contentType: false,
		//No permitimos que los datos pasen como un objeto
		processData: false
	}).done(function(echo){
		//Una vez que recibimos respuesta
		//comprobamos si la respuesta no es vacía
		if (echo !== "") {
			//Si hay respuesta (error), mostramos el mensaje
			mensaje.html(echo);
			mensaje.slideDown(500);
		} else {
			//Si no hay respuesta, redirecionamos a donde sea necesario
			//Si está vacío, recarga la página
			window.location.replace("");
		}
	}
	
	);
});

</script>
</body>
</html>