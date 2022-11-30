<?php 

    $nombre="";
    $edad="";
    $comentarios="";
    $errores = [];

    if (isset($_POST['enviar'])) {
        if (isset($_POST['nombre']) && $_POST['nombre'] != "" && $_POST['nombre'] != null) {
            $nombre = $_POST['nombre'];
        }
    }


?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Román">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        Nombre <input type="text" name="nombre" value="<?= $_POST['nombre'] ?>"> <br>
        <input type="submit" name="enviar" value="ENVIAR">
    </form>
</body>
</html>