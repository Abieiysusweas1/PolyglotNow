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

    // Consulta CORRECTA para obtener los idiomas del usuario
    $sql = "SELECT idioma, c_ing, c_esp, c_fra, c_ita, c_ale, c_rum FROM usuarios WHERE usuario = '$user'";
    $result = mysqli_query($conexion, $sql);

    if (!$result || mysqli_num_rows($result) === 0) {
        die("Error: Usuario no encontrado en la base de datos.");
    }

    $row = mysqli_fetch_assoc($result);

    // Procesar idioma nativo
    $idioma_usuario = strtolower(trim($row['idioma']));
    $idioma_usuario = str_replace(['ñ', 'á', 'é', 'í', 'ó', 'ú'], ['n', 'a', 'e', 'i', 'o', 'u'], $idioma_usuario);

    if (strpos($idioma_usuario, 'english') !== false || strpos($idioma_usuario, 'ingles') !== false) {
        $idioma_usuario = 'english';
    } elseif (strpos($idioma_usuario, 'espanol') !== false || strpos($idioma_usuario, 'español') !== false) {
        $idioma_usuario = 'espanol';
    } else {
        $idioma_usuario = 'espanol';
    }

    $traducciones = [
        'espanol' => [
            'titulo' => 'Eliminando idioma',
            'ing' => 'Inglés',
            'esp' => 'Español',
            'fra' => 'Francés',
            'ita' => 'Italiano',
            'ale' => 'Alemán',
            'rum' => 'Rumano',
            'max_idiomas' => 'Has alcanzado el máximo de idiomas (5)',
            'min_idiomas' => 'No tienes ningún idioma agregado',
            'atr' => 'Volver'
        ],
        'english' => [
            'titulo' => 'Deleting language',
            'ing' => 'English',
            'esp' => 'Spanish',
            'fra' => 'French',
            'ita' => 'Italian',
            'ale' => 'German',
            'rum' => 'Romanian',
            'max_idiomas' => 'You have reached the maximum languages (5)',
            'min_idiomas' => 'You don\'t have any languages added',
            'atr' => 'Return'
        ]
    ];

    // Eliminar idiomas
    $sql2 = "SELECT (c_ing + c_esp + c_fra + c_ita + c_ale + c_rum) AS total_cursos_activos FROM usuarios WHERE usuario = '$user';";
    $result_idi = mysqli_query($conexion, $sql2);
    $row2 = mysqli_fetch_assoc($result_idi);
    $idiomas_activos = $row2['total_cursos_activos'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idioma'])) {
        $nuevo_idioma = $_POST['idioma'];

        $campos_validos = ['c_ing', 'c_esp', 'c_fra', 'c_ita', 'c_ale', 'c_rum'];
        if (!in_array($nuevo_idioma, $campos_validos)) {
            die("Error: Idioma no válido.");
        }

        if ($row[$nuevo_idioma] == 1) {
            $update = "UPDATE usuarios SET $nuevo_idioma = 0 WHERE usuario = '$user'";
            if (mysqli_query($conexion,$update)) {
                header("Location: cursos.php");
                exit;
            } else {
                $mensaje = "<p>Error al eliminar el idioma: " . mysqli_error($conexion) . "</p>";
            }
        } else {
            $mensaje = "<p>Este idioma no está activado.</p>";
        }
    }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $traducciones[$idioma_usuario]['titulo'] ?></title>
    <link rel="stylesheet" href="../css/sesion.css">
    <link rel="stylesheet" href="../css/idiomas.css">
    <link rel="icon" href="../img/icon.png">
</head>
<body>
    <?php 
    if (isset($mensaje)) {
        echo $mensaje;
    }
    ?>
</body>
</html>