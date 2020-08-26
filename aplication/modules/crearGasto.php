<?php
require('../../conex/conexion.php');
if (isset($_POST['save'])) {
    $notes = $_POST['notes'];
    $valor = $_POST['valor'];

    if( $valor =='')
    {
      echo "Es obligatorio ingresar el valor" ;
      exit();
    }
  	$sql = "INSERT INTO `gasto` (`id`, `valor`, `descripcion`, `fecha`) VALUES (NULL, '$valor', '$notes', current_timestamp());";
  	if (mysqli_query($conexion, $sql)) {
  	  $id = mysqli_insert_id($conexion);
    
        
        $Respuesta ="Creado el   $valor";
        echo $Respuesta;
        

  	}else {
  	  echo "Error: ". mysqli_error($conexion);
  	}
  	exit();
  }
  ?>