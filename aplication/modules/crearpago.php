<?php
require('../../conex/conexion.php');
if (isset($_POST['save'])) {
  $cuenta = $_POST['cuenta'];
  $cliente = $_POST['cliente'];
  $cartera= $_POST['cartera'];
  $valor = $_POST['valor'];
   
    if($cuenta=='')
    {
      $Respuesta = 'No encontramos el # de cuenta';
      echo $Respuesta;
      exit();
    }

  	$sql = "INSERT INTO `pago` (`id`, `id_cartera`, `valor`, `fechaPago`, `id_cliente`, `id_cuenta`) VALUES (NULL, '$cartera', '$valor', current_timestamp(), '$cliente', '$cuenta');";  
  	if (mysqli_query($conexion, $sql)) {
  	  $id = mysqli_insert_id($conexion);
      $sqlActualizar ="UPDATE `cuenta` SET `cuotas` =  `cuotas` +'1' WHERE `cuenta`.`id` = $cuenta";
     
      if (mysqli_query($conexion, $sqlActualizar))
      {$id2 = mysqli_insert_id($conexion);
        $tiempo = "se sumó a la couta";
      }



      $Respuesta = "Pago realizado, $tiempo";
      echo $Respuesta;

  	}else {
  	  echo "Error: ". mysqli_error($conexion);
  	}
  	exit();
  }
  ?>