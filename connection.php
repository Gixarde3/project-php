<?php
function conect(){
  $db="project-php";
  $user="root";
  $pass="";
  $host="localhost";
  $con=mysqli_connect($host,$user,$pass,$db);//Crea la conexión con la base de datos
  return $con;
}
?>
