<?php
    session_start();

    if(!isset($_SESSION['user'])) {
        die("Error: Usuario no autenticado. <a href='../html/sesion/sesion.html'>Volver al inicio de sesión</a>");
    }

    $host = "localhost";
    $usuario = "root";
    $contrasena = "";
    $base_datos = "polyglotnow";
    $conexion = mysqli_connect($host, $usuario, $contrasena, $base_datos) or die("Error de conexión: " . mysqli_connect_error());

    $user = $_SESSION['user'];

    $sql = "SELECT idioma, c_ing, c_esp, c_fra, c_ita, c_ale, c_rum FROM usuarios WHERE usuario = '$user'";
    $result = mysqli_query($conexion, $sql);

    if (!$result || mysqli_num_rows($result) === 0) {
        die("Error: Usuario no encontrado en la base de datos.");
    }

    $row = mysqli_fetch_assoc($result);

    $idioma_usuario = strtolower(trim($row['idioma']));
    $idioma_usuario = str_replace(['ñ', 'á', 'é', 'í', 'ó', 'ú'], ['n', 'a', 'e', 'i', 'o', 'u'], $idioma_usuario);
    
    if (strpos($idioma_usuario, 'english') !== false || strpos($idioma_usuario, 'ingles') !== false) {
        $idioma_usuario = 'english';
    } elseif (strpos($idioma_usuario, 'espanol') !== false || strpos($idioma_usuario, 'español') !== false) {
        $idioma_usuario = 'espanol';
    } else {
        $idioma_usuario = 'espanol'; // Valor por defecto
    }
    
    $traducciones = [
        'espanol' => [
            'titulo' => 'SELECCIONA UN IDIOMA',
            'ing' => 'Inglés',
            'esp' => 'Español',
            'fra' => 'Francés',
            'ita' => 'Italiano',
            'ale' => 'Alemán',
            'rum' => 'Rumano'            
        ],
        'english' => [
            'titulo' => '\SELECT A LANGUAGE',
            'ing' => 'English',
            'esp' => 'Spanish',
            'fra' => 'French',
            'ita' => 'Italian',
            'ale' => 'German',
            'rum' => 'Romanian'
        ]
    ];

    $idiomas_activos = 0;
    if ($idioma_usuario != 'english' && $row['c_ing']) $idiomas_activos++;
    if ($idioma_usuario != 'espanol' && $row['c_esp']) $idiomas_activos++;
    if ($row['c_fra']) $idiomas_activos++;
    if ($row['c_ita']) $idiomas_activos++;
    if ($row['c_ale']) $idiomas_activos++;
    if ($row['c_rum']) $idiomas_activos++;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicia sesión</title>
    <link rel="stylesheet" href="../../css/sesion.css">
    <link rel="icon" href="../../img/icon.png">
</head>
<body>
    <div class="cab">
        <img class="logo" src="../../img/logo.png">
    </div>
    <div class="pri">
        <h1><?php echo $traducciones[$idioma_usuario]['titulo'];?></h1>
        <?php
            $cursos_mostrados = false
            if () {
                
            }
        ?>
    </div>
</body>
</html>