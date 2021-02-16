<?php
session_start();
include 'connection.php';
$valido=0;
if(isset($_POST['enviar'])){
  $user=$_POST['usuario'];
  $pass=$_POST['contrasena'];
  $sql="SELECT * FROM users WHERE usuario='$user' && pass='$pass'";//Checa si la cuenta biscada conicide con los datos
  $con=conect();
  $resultado=mysqli_query($con, $sql);
  $valido=2;
  while ($usado = mysqli_fetch_object($resultado)) {
   $valido=1;
  }
  if ($valido==1) {
    $_SESSION['usuario']=$user;//Pone en la sesión el usuario que está en ella, para cambiar la contraseña
  }
}
?>
<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Log-in</title>
    <style media="screen">
      input{
        margin-bottom: 5px;
      }
    </style>
  </head>
  <body>
    <?php if ($valido==0): ?>
      <h1 style="width:100%;text-align:center;">Log-in</h1>
      <form action="" method="post" style="width:100%;text-align:center;" name="formulario">
        <input type="text" name="usuario" placeholder="Ingresa el usuario" required>
        <br>
        <input type="text" name="contrasena" placeholder="Ingresa la contraseña"required>
        <br>
        <input type="submit" name="enviar" value="Enviar" onclick="verificar()">
        <a href="regiter.php"><p>Registrarse</p></a>
      </form>
    <?php endif; ?>
      <?php if ($valido==2): ?>
        <h2>Usuario o contraseña incorrectos</h2>
      <?php endif; ?>
      <?php if ($valido==1): ?>
        <h2>Bienvenido <?php echo $_SESSION['usuario'] ?></h2>
        <a href="change-password.php"><p>Cambiar contraseña</p></a>
      <?php endif; ?>
    </form>
  </body>
</html>
