<?php
require('../../conex/conexion.php');
if (isset($_POST['save'])) {
    $name = $_POST['feFirstName'];
    $lastname = $_POST['feLastName'];
    $email = $_POST['feEmailAddress'];
    $phone = $_POST['fephone'];
    $city = $_POST['feInputCity'];
    $number = $_POST['fenumber'];

    $notes = $_POST['fenotes'];

    if($number=='' or $name =='')  
    {
      echo "Es Obligatorio llenar la cedula y nombre" ;
      exit();
    }


    if(empty($_FILES['file']['name']))
    {
  //      echo "No hay foto" ;
//exit();
    }  


    $uploadedFile = '';
    if(!empty($_FILES["file"]["type"])){
        $fileName = time().'_'.$_FILES['file']['name'];
        $valid_extensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["file"]["name"]);
        $file_extension = end($temporary);
        
            $sourcePath = $_FILES['file']['tmp_name'];
            $targetPath = "uploads/".$fileName;
            if(move_uploaded_file($sourcePath,$targetPath)){
                $uploadedFile = $fileName;
            }
         
     
    }
  


  	$sql = "INSERT INTO `cliente` (`id`, `nombre`, `apellido`, `cedula`, `correo`, `telefono`, `ciudad`, `notas`, `foto`)  VALUES (NULL, '$name', '$lastname', '$number', '$email', '$phone', '$city', '$notes','$uploadedFile');"; 
  	if (mysqli_query($conexion, $sql)) {
  	  $id = mysqli_insert_id($conexion);
    
     
        
        $Respuesta ="Creado el $name";
        echo $Respuesta;
        

  	}else {
  	  echo "Error: ". mysqli_error($conexion);
  	}
  	exit();
  }
  ?>