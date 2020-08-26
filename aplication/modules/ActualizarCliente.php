<?php
require('../../conex/conexion.php');
if (isset($_POST['save'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $image =$_POST['image'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $notes = $_POST['notes'];


    if($number=='' or $name =='')
    {
      $Respuesta = 'Para actualizar se requiere cédula y nombre';
      echo $Respuesta;
      exit();
    }
  	$sql = " UPDATE `cliente` SET `nombre` = '$name', `apellido` = '$lastname', `correo` = '$email',  
    `correo` = '$email',`telefono` = '$phone',`cedula` = '$number' ,`direccion` = '$address',`notas` = '$notes',`foto` = '$image' WHERE `id` = $id ;";
  	if (mysqli_query($conexion, $sql)) {
  	  $id = mysqli_insert_id($conexion);
    
     
      $Respuesta = 'Actualizado el cliente  '.$name.' con cédula  :'.$number;
      echo $Respuesta;
        

  	}else {
  	  echo "Error: ". mysqli_error($conexion);
  	}
  	exit();
  }
  ?>