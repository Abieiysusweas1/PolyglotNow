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
$sql = "SELECT c_ing, c_esp, c_fra, c_ita, c_ale, c_rum FROM usuarios WHERE usuario = '$user'";
$result = mysqli_query($conexion, $sql);

if (!$result || mysqli_num_rows($result) === 0) {
    die("Error: Usuario no encontrado en la base de datos.");
}

$row = mysqli_fetch_assoc($result);

    // Normalizar el valor del idioma
    $idioma_usuario = strtolower(trim($row['idioma']));
    $idioma_usuario = str_replace(['ñ', 'á', 'é', 'í', 'ó', 'ú'], ['n', 'a', 'e', 'i', 'o', 'u'], $idioma_usuario);

    // Mapeo de valores posibles a 'english' o 'espanol'
    if (strpos($idioma_usuario, 'english') !== false || strpos($idioma_usuario, 'ingles') !== false) {
        $idioma_usuario = 'english';
    } elseif (strpos($idioma_usuario, 'espanol') !== false || strpos($idioma_usuario, 'español') !== false) {
        $idioma_usuario = 'espanol';
    } else {
        $idioma_usuario = 'espanol'; // Valor por defecto
    }

/* $idioma_usuario = $row['idioma']; */

$traducciones = [
    'espanol' => [
        'titulo' => 'Bienvenido',
        'cursos' => 'Mis cursos',
        'ing' => 'Inglés',
        'esp' => 'Español',
        'fra' => 'Francés',
        'ita' => 'Italiano',
        'ale' => 'Alemán',
        'rum' => 'Rumano',
        'no_cursos' => 'No estás inscrito en ningún curso'
    ],
    'english' => [
        'titulo' => 'Welcome',
        'cursos' => 'My courses',
        'ing' => 'English',
        'esp' => 'Spanish',
        'fra' => 'French',
        'ita' => 'Italian',
        'ale' => 'German',
        'rum' => 'Romanian',
        'no_cursos' => 'You are not enrolled in any courses'
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
    <title><?php echo $traducciones[$idioma_usuario]['titulo']; ?></title>
    <link rel="stylesheet" href="../../css/sesion.css">
    <link rel="icon" href="../../img/icon.png">
</head>
<body>
    <div class="cab">
        <img class="logo" src="../../img/logo.png">
    </div>
    <div class="pri">
        <h1><?php echo $traducciones[$idioma_usuario]['titulo']; ?></h1>
        <?php
            $cursos_mostrados = false;
            
            // Mostrar inglés solo si no es idioma nativo y está seleccionado
            if ($idioma_usuario != 'english' && $row['c_ing']) {
                echo '<div class="lang"><img class="ban"><h2 class="let-tit">' . $traducciones[$idioma_usuario]['ing'] . '</h2></div>';
                $cursos_mostrados = true;
            }
            
            // Mostrar español solo si no es idioma nativo y está seleccionado
            if ($idioma_usuario != 'espanol' && $row['c_esp']) {
                echo '<div class="lang"><img class="ban"><h2 class="let-tit">' . $traducciones[$idioma_usuario]['esp'] . '</h2></div>';
                $cursos_mostrados = true;
            }
            
            // Mostrar otros idiomas (siempre que estén seleccionados)
            if ($row['c_fra']) {
                echo '<div class="lang"><img class="ban"><h2 class="let-tit">' . $traducciones[$idioma_usuario]['fra'] . '</h2></div>';
                $cursos_mostrados = true;
            }
            if ($row['c_ita']) {
                echo '<div class="lang"><img class="ban"><h2 class="let-tit">' . $traducciones[$idioma_usuario]['ita'] . '</h2></div>';
                $cursos_mostrados = true;
            }
            if ($row['c_ale']) {
                echo '<div class="lang"><img class="ban"><h2 class="let-tit">' . $traducciones[$idioma_usuario]['ale'] . '</h2></div>';
                $cursos_mostrados = true;
            }
            if ($row['c_rum']) {
                echo '<div class="lang"><img class="ban"><h2 class="let-tit">' . $traducciones[$idioma_usuario]['rum'] . '</h2></div>';
                $cursos_mostrados = true;
            }
            
            // Mensaje si no hay cursos
            if (!$cursos_mostrados) {
                echo '<p>' . $traducciones[$idioma_usuario]['no_cursos'] . '</p>';
            }
        ?>
    </div>
</body>
</html>
<?php mysqli_close($conexion); ?>