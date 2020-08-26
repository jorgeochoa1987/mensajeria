<?php
require('../../conex/conexion.php');

  $id = $_POST['id'];
   
 
    if($id=='')
    {
      $Respuesta = 'Esta vacio la identificación de la cartera';
      echo $Respuesta;
      exit();
    }
  	$sql = "DELETE FROM `moto` WHERE id  = '$id'";  
  	if (mysqli_query($conexion, $sql)) {
  	  $id = mysqli_insert_id($conexion);
    
      echo $sql; 

  	}else {
  	  echo "Error: ". mysqli_error($conexion);
  	}
  ?>