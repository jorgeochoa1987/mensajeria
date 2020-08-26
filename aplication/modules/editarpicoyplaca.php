<?php
require('../../conex/conexion.php');
if (isset($_POST['save'])) {
    $id = 1;
    $l1 = $_POST['l1'];
    $l2 = $_POST['l2'];
    $m1 = $_POST['m1'];
    $m2 = $_POST['m2'];
    $mi1 = $_POST['mi1'];
    $mi2 = $_POST['mi2'];
    $j1 = $_POST['j1'];
    $j2 = $_POST['j2'];
    $v1 = $_POST['v1'];
    $v2 = $_POST['v2'];
    $s1 = $_POST['s1']; 
    $s2 = $_POST['s2'];
    $d1 = $_POST['d1'];
    $d2 = $_POST['d2'];
 
 
  	$sql = "UPDATE `picoyplaca` SET   `l1` = '$l1', `l2` = '$l2', `m1` = '$m1', `m2` = '$m2', `mi1` = '$mi1', `mi2` = '$mi2', `j1` = '$j1', `j2` = '$j2', `v1` = '$v1', `v2` = '$v2', `s1` = '$s1', `s2` = '$s2', `d1` = '$d1', `d2` = '$d2' WHERE `picoyplaca`.`id` = $id;";
  	if (mysqli_query($conexion, $sql)) {
  	  $id = mysqli_insert_id($conexion);
     
      
      $Respuesta = 'Actualizado el pico y placa';
      echo $Respuesta;
        

  	}else {
  	  echo "Error: ". mysqli_error($conexion);
  	}
  	exit();
  }
  ?>