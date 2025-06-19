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

    $sql = "SELECT * FROM usuarios WHERE usuario = '$user'";

    $result = mysqli_query($conexion,$sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        if ($row['contra'] === $contra) {
            $mensaje = "<h4 style='text-align: center;'>La cuenta ya existe</h4>";
        } else {
            $mensaje = "<h4 style='text-align: center;'>La contraseña no es correcta</h4>";
        }
    } else {
        $mensaje = "<h4 style='text-align: center;'>El usuario no existe o no coincide</h4>";
    }
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
    </div>
    <div class="pri" style="margin: 0 auto">
        <?php echo $mensaje ?>
    </div>
    <p>Haz <a href="../html/sesion/sesion.html">clic aquí</a> para volver al inicio de sesión.</p>
</body>
</html>