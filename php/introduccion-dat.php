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
   $c_ing = isset($_POST["c_ing"]) ? 1 : 0;
   $c_esp = isset($_POST["c_esp"]) ? 1 : 0;
   $c_fra = isset($_POST["c_fra"]) ? 1 : 0;
   $c_ita = isset($_POST["c_ita"]) ? 1 : 0;
   $c_ale = isset($_POST["c_ale"]) ? 1 : 0;
   $c_rum = isset($_POST["c_rum"]) ? 1 : 0;

   $conexion = mysqli_connect($host,$usuario,$contrasena,$base_datos) or die("Hubo un error en la conexión.");

   $sql = "INSERT INTO usuarios(usuario,contra,idioma,c_ing,c_esp,c_fra,c_ita,c_ale,c_rum) VALUES ('$_REQUEST[$user]',
   '$_REQUEST[$contra]','$_REQUEST[$lan]','$_REQUEST[$c_ing]','$_REQUEST[$c_esp]','$_REQUEST[$c_fra]','$_REQUEST[$c_ita]','$_REQUEST[$c_ale]','$_REQUEST[$c_rum]')";
   
   mysqli_query($conexion,$sql) or die("Ocurrió un error en la consulta".mysqli_error($conexion));

   mysql_close($conexion);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar cuenta</title>
    <link rel="stylesheet" href="../css/sesion.css">
    <link rel="icon" href="../img/icon.png">
</head>
<body>
   <div class="cab">
      <img class="logo" src="../img/logo.png">
   <div class="pri">
      <h4>La cuenta ha sido creada exitósamente.</h4>
      <h5>Haz <a href="../html/sesion/sesion.html">clic aquí</a> para volver al inicio de sesión.</h5>
   </div>
   </div>
</body>
</html>