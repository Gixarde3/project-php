<?php
session_start();
include 'connection.php';
$valido=0;
if (!isset($_SESSION['usuario'])){
  echo '</title>script type="text/javascript">window.location="index.php";</script>';
}
if(isset($_POST['contrasena'])){
  $user=$_SESSION['usuario'];
  $pass=$_POST['contrasena'];
  $con=conect();
  $sql="UPDATE users SET pass='$pass' WHERE usuario='$user'";
  $resultado=mysqli_query($con, $sql);
  echo '<h2>Contraseña cambiada con éxto</h2>';
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Cambiar la contraseña de <?php echo $_SESSION['usuario'] ?></title>
    <style media="screen">
      input{
        margin-bottom: 5px;
      }
    </style>
    <script type="text/javascript">
    function verificar(){
      var pass=document.getElementById('pass').value;
      var pass_confirm=document.getElementById('pass_confirm').value;
      var form=document.getElementById('formulario');
      if(pass!=pass_confirm){
        form.innerHTML=form.innerHTML+"<h2>Las contraseñas no son iguales</h2>";
      }else{
        document.formulario.submit();
      }
    }
    </script>
  </head>
  <body>
    <h1 style="width:100%;text-align:center;">Cambiar la contraseña de <?php echo $_SESSION['usuario'] ?></h1>
    <form id=formulario action="" method="post" style="width:100%;text-align:center;" name="formulario">
      <input id=pass type="text" name="contrasena" placeholder="Ingresa la nueva contraseña"required>
      <br>
      <input id=pass_confirm type="text" name="contrasena_confirmar" placeholder="Ingresa de nuevo la nueva contraseña" required>
      <br>
      <input type="button" name="enviar" value="Enviar" onclick="verificar()">
    </form>
  </body>
</html>
