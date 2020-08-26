<?php
require('../../conex/conexion.php');

if (isset($_POST['save'])) {
    $id_mensajero = $_POST['mensajero'];
    $id_moto = $_POST['moto'];


  	$sql = "INSERT INTO `emparejados` (`id`, `id_domiciliario`, `id_moto`, `maleta`, `fecha`, `modifica`) VALUES (NULL, '$id_mensajero', '$id_moto', ' ', current_timestamp(), current_timestamp());";
  	if (mysqli_query($conexion, $sql)) {
        echo $marca;
      } else {
        echo "Error_ take this notes please: " . mysqli_error($conexion);
      }
      
      mysqli_close($conexion);
  
  }
  else
  {
      echo "_No save avaliable";
  }
  ?>