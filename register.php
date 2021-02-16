<?php
session_start();
include 'connection.php';
$valido=0;
if(isset($_POST['contrasena'])){ //Se checa si se ha pulsado el botón a través del hecho de que si contraseña está puesta
  $user=$_POST['usuario_nuevo'];
  $pass=$_POST['contrasena'];
  $sql="SELECT * FROM users WHERE usuario='$user'";//Checa si hay una cuenta existente con ese usario
  $con=conect();
  $resultado=mysqli_query($con, $sql);
  while ($usado = mysqli_fetch_object($resultado)) {
   $valido++;
  }
  if($valido==0)
  {
    $sql="INSERT INTO users (usuario, pass) VALUES ('$user','$pass')";
    $resultado=mysqli_query($con, $sql);
    echo '<script type="text/javascript">window.location="index.php";</script>';
  }
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Register</title>
    <style media="screen">
      input{
        margin-bottom: 5px;
      }
    </style>
    <script type="text/javascript">
    function verificar(){//verifica si ambos campos de contraseña son iguales
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
    <h1 style="width:100%;text-align:center;">Regístrate</h1>
    <form id=formulario action="" method="post" style="width:100%;text-align:center;" name="formulario">
      <input id=user type="text" name="usuario_nuevo" placeholder="Ingresa el usuario a crear" required>
      <br>
      <input id=pass type="text" name="contrasena" placeholder="Ingresa la nueva contraseña"required>
      <br>
      <input id=pass_confirm type="text" name="contrasena_confirmar" placeholder="Ingresa de nuevo la nueva contraseña" required>
      <br>
      <input type="button" name="enviar" value="Enviar" onclick="verificar()">
      <?php if ($valido!=0): ?>
        <h2>Usuario en uso</h2>
      <?php endif; ?>
    </form>
  </body>
</html>
