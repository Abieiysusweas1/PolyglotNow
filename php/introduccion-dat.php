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
   $
?>