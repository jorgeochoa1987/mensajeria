<?php
require('../../conex/conexion.php');
if (isset($_POST['save'])) {
  $id = $_POST['id'];
    $image = $_POST['image'];
    $name = $_POST['name'];
    $user = $_POST['user'];
    $email = strtoupper($_POST['email']);
    $pass = $_POST['pass'];

    if($name=='' )
    {
      echo '<div class="comment_box" id="Respuesta"> No se puede guardar sin nombre </div>';
      exit();
    }

   

  	$sql = " UPDATE `users` SET `nombreApellido` = '$name', `correo` = '$email',  `usuario` = '$user',`contrasenia` = '$pass' ,`foto` = '$image'  WHERE `users`.`id` = $id;";
  	if (mysqli_query($conexion, $sql)) {
  	  $id = mysqli_insert_id($conexion);
    
      $Respuesta = 'Actualizada la información del usuario' ;
       echo $Respuesta;

    }
    else {
  	  echo "Error: ". mysqli_error($conexion);
  	}
  	exit();
  }
  ?>