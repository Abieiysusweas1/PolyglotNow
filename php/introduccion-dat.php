<?php
/* CONEXIÓN A LA BASE DE DATOS */

   $host = "localhost";
   $usuario = "root";
   $contrasena = "";
   $base_datos = "polyglotnow";

   $conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos) or die("Error de conexión: " . mysqli_connect_error());

   /* CAPTAR LOS DATOS DEL FORMULARIO */

   $user = mysqli_real_escape_string($conexion,$_POST["user"]);
   $contra = mysqli_real_escape_string($conexion,$_POST["password"]);
   $lan = mysqli_real_escape_string($conexion,$_POST["lan"]);
   $c_ing = isset($_POST["c_ing"]) ? 1 : 0;
   $c_esp = isset($_POST["c_esp"]) ? 1 : 0;
   $c_fra = isset($_POST["c_fra"]) ? 1 : 0;
   $c_ita = isset($_POST["c_ita"]) ? 1 : 0;
   $c_ale = isset($_POST["c_ale"]) ? 1 : 0;
   $c_rum = isset($_POST["c_rum"]) ? 1 : 0;

   $sql = "INSERT INTO usuarios(usuario,contra,idioma,c_ing,c_esp,c_fra,c_ita,c_ale,c_rum) 
   VALUES ('$user','$contra','$lan',$c_ing,$c_esp,$c_fra,$c_ita,$c_ale,$c_rum)";
   
   mysqli_query($conexion,$sql) or die("Ocurrió un error en la consulta".mysqli_error($conexion));

   mysqli_close($conexion);
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
   <div class="pri" style="margin: 0 auto">
      <h4>La cuenta ha sido creada exitósamente.</h4>
      <h5>Haz <a href="../html/sesion/sesion.html">clic aquí</a> para volver al inicio de sesión.</h5>
   </div>
   </div>
</body>
</html>