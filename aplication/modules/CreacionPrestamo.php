<?php
require('../../conex/conexion.php');
if (isset($_POST['save'])) {
    $value = $_POST['value'];
    $interes = $_POST['interes'];
    $cartera = $_POST['cartera'];
 
    $cliente = $_POST['cliente'];
    $date = $_POST['date'];
    $notas = $_POST['notas'];
    $mesespago = $_POST['mesespago'];
    $valpagar = $_POST['valpagar'];
    $mesesaumentar = strtotime("+$mesespago month");
    $fechaFin = date("Y-m-d H:i:s", $mesesaumentar); 

    $fechaprestamo = $_POST['fechaprestamo'];
 
    
    $category1 = $_POST['category1'];
    $category2 = $_POST['category2'];
    $category3 = $_POST['category3'];
    $category4 = $_POST['category4'];
    $category5 = $_POST['category5'];
    $category6 = $_POST['category6'];
    $category7 = $_POST['category7'];
    $category8 = $_POST['category8'];
    $category9 = $_POST['category9'];
        

    if($value=='' )
    {
      $Respuesta =  "Es obligatorio tener un valor" ;
      echo $Respuesta;      exit();
    }
  

  	$sql = "INSERT INTO `cuenta` (`id`, `id_cliente`, `id_prestamista`, `prestamo`, `fecha_prestamo`, `interes`, `fechaVisita1`, `valorPagar`, `meses`, `fechaFin`) VALUES (NULL, '$cliente ', '$cartera', '$value', '$fechaprestamo', '$interes', '$date', '$valpagar', '$mesespago', '$fechaFin');";
  	if (mysqli_query($conexion, $sql)) {
      $id = mysqli_insert_id($conexion);
      
      $idget = "SELECT `id` FROM `cuenta` order by id desc limit 1";
      $getid = $conexion -> query($idget);
      while ($row=$getid->fetch_assoc()){
       $rest =  $row['id'];
       };
      $sql2 = "INSERT INTO `dias` (`id`, `id_cliente`,`id_cuenta`, `lunes`, `martes`, `miercoles`, `jueves`, `viernes`, `sabado`, `domingo`,`quincenal`, `mensual`) VALUES  (NULL, '$cliente', '$rest', '$category1', '$category2', '$category3', '$category4', '$category5', '$category6', '$category7', '$category8', '$category9')";
      if (mysqli_query($conexion, $sql2))
      {$id2 = mysqli_insert_id($conexion);
        $tiempo = "Creados tiempos de cobro";
      }else
      {
        $tiempo = "No se creó los tiempos";

      } 
        $Respuesta =  "Prestamo creado, $tiempo, fecha de prestamo $fechaprestamo" ;
        echo $Respuesta;
      }else{
      $Respuesta =  "Error: ". mysqli_error($conexion);
      echo $Respuesta;}
 

  	exit();
  }
  ?>