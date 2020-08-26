<?php
require('../../conex/conexion.php');

if (isset($_POST['save'])) {
    $nombre = $_POST['name'];
    


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
 

 

  	$sql = "INSERT INTO `evento` (`id`, `nombre`, `imagen`) VALUES (NULL, '$nombre', '$uploadedFile'); ";
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