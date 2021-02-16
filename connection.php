<?php
function conect(){
  $db="project-php";
  $user="root";
  $pass="";
  $host="localhost";
  $con=mysqli_connect($host,$user,$pass,$db);
  return $con;
}
?>
