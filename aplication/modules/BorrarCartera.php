<?php
require('../../conex/conexion.php');
if (isset($_POST['save'])) {
  $id = $_POST['id'];
   

    if($id=='')
    {
      $Respuesta = 'Esta vacio la identificación de la cartera';
      echo $Respuesta;
      exit();
    }
  	$sql = "DELETE FROM `cartera` WHERE id  = '$id'";  
  	if (mysqli_query($conexion, $sql)) {
  	  $id = mysqli_insert_id($conexion);
    
      

  	}else {
  	  echo "Error: ". mysqli_error($conexion);
  	}
  	exit();
  }
  ?>