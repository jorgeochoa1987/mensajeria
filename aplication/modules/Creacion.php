<?php
require('../../conex/conexion.php');
if (isset($_POST['save'])) {
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $valIni = $_POST['valIni'];
    $notes = $_POST['notes'];
    if($number=='' or $valIni =='')
    {
       $Respuesta = 'Se debe ingresar cédula y valor inicial para crear un registro' ;
       echo $Respuesta;
      exit();
    }
  	$sql = "INSERT INTO `cartera` (`id`, `nombre`, `Apellido`, `cedula`, `correo`, `telefono`, `ciudad`, `direccion`, `valorIni`, `notasAdicionales`, `saldo`)  VALUES (NULL, '$name', '$lastname', '$number', '$email', '$phone', '$city', ' $address', '$valIni', '$notes', '$valIni');";
  	if (mysqli_query($conexion, $sql)) {
  	  $id = mysqli_insert_id($conexion);
    
      $Respuesta = 'Creado la cartera de '.$name.' valor por:'.$valIni;
        echo $Respuesta;

  	}else {
  	  echo "Error: ". mysqli_error($conexion);
  	}
  	exit();
  }
  ?>