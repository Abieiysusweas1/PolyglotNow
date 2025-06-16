<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar cuenta</title>
    <link rel="stylesheet" href="../../css/sesion.css">
    <link rel="icon" href="../../img/icon.png">
</head>
<body>
   <?php
   /* CONEXIÓN A LA BASE DE DATOS */

      $host = "localhost";
      $usuario = "root";
      $contrasena = "";
      $base_datos = "PolyglotNow";

      $conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos) or die("Error de conexión: " . mysqli_connect_error());
   
      /* CAPTAR LOS DATOS DEL FORMULARIO */

      $user = $_POST["user"];
      $contra = $_POST["password"];
      $lan = $_POST["lan"];
      $c_ing = $_POST["c_ing"];
      $c_esp = $_POST["c_esp"];
      $c_fra = $_POST["c_fra"];
      $c_ita = $_POST["c_ita"];
      $c_ale = $_POST["c_ale"];
      $c_rum = $_POST["c_rum"];

      $conexion = mysqli_connect($host,$usuario,$contrasena,$base_datos) or die("Hubo un error en la conexión.");

      mysqli_query($conexion,"INSERT INTO usuarios(usuario,contra,idioma,c_ing,c_esp,c_fra,c_ita,c_ale,c_rum) VALUES ('$_REQUEST[$user]',
      '$_REQUEST[$contra]','$_REQUEST[$lan]','$_REQUEST[$c_ing]','$_REQUEST[$c_esp]','$_REQUEST[$c_fra]','$_REQUEST[$c_ita]','$_REQUEST[$c_ale]','$_REQUEST[$c_rum]')") or die("Ocurrió un error en la consulta");

      mysql_close($conexion);

      echo "<div class='pri'>"
      echo "<h4>La cuenta ha sido creada exitósamente.</h4>"
      echo "<h5>Haz <a href='../html/sesion/sesion.html'>clic aquí</a> para volver al inicio de sesión.</h5>"
      echo "</div>"
   ?>
</body>
</html>