<?php


$host= $_SERVER["HTTP_HOST"];
if($host=='javierperezb.com')
{
   $conexion = new mysqli("localhost", "u492238651_prestoapp", "Veu[N+=K", "u492238651_prestoapp");

   if($conexion === false) { 
      echo 'Ha habido un error <br>'.mysqli_connect_error(); 
     } else {
  
  
      
     } 

} 
else
{
   $conexion = new mysqli("localhost", "root", "", "u465803286_prestoapp");

   if($conexion === false) { 
      echo 'Ha habido un error <br>'.mysqli_connect_error(); 
     } else {
  
  
     } 
}



?>
