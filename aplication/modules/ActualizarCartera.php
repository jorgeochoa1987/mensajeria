<?php
require('../../conex/conexion.php');
if (isset($_POST['save'])) {
  $id = $_POST['id'];
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

    if($id=='')
    {
      $Respuesta = 'Para actualizar se requiere nombre';
      echo $Respuesta;
      exit();
    }
    $sql = " UPDATE `cartera` SET `nombre` = '$name', `Apellido` = '$lastname', `cedula` = '$number', `correo` = '$email', `telefono` = '$phone', `ciudad` = '$city', `direccion` = '$address', `valorIni` = '$valIni', `notasAdicionales` = '$notes' WHERE `id` = $id ;";
  	if (mysqli_query($conexion, $sql)) {
  	  $id = mysqli_insert_id($conexion);
    
     
      $Respuesta = 'Actualizado la cartera  '.$name.' con cédula  :'.$number;
      echo $Respuesta;
        

  	}else {
  	  echo "Error: ". mysqli_error($conexion);
  	}
  	exit();
  }
  ?>