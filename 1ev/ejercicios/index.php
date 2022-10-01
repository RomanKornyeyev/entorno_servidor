<?php
function directory(){
    $dir = './';
    $files = scandir($dir,$sorting_order = SCANDIR_SORT_ASCENDING);
    sort($files, $sort_flags = SORT_NATURAL);

    echo "<ul class='lista'>";
    foreach ($files as $file) {
        if (preg_match("/\.php/", $file)) {
            if (!preg_match("/index.php/", $file)){ //muestra todos los archivos que no sean el index (este archivo)
                echo "<li class='elemento'><a class='button' href=" . $dir . "/" . $file . ">" . $file . "</a></li>";
            }
        }
    }
    echo "</ul>";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- JS -->
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/sr-index.js" defer=""></script>
    <!-- CSS -->
    <link rel="preload" href="./css/index.css" as="styles">
    <link rel="stylesheet" href="./css/index.css">
    <title>Inicio</title>
</head>

<body>
    <main class="container">
        <div class="title-wrapper">
            <h2 class="title">Ejercicios de Román Kornyeyev</h2>
        </div>
        <?php
            directory();
        ?>
    </main>
</body>

</html>