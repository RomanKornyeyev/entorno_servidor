<?php

    //acceso a BD, sesión, etc. (tiene que ir en TODAS)
    require("../src/init.php");

    //seleccionamos toda la info de todos los usuarios
    $db->ejecuta("SELECT * FROM usuarios;");
    $consulta = $db->obtenDatos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- menu -->
    <?php include("menu.php"); ?>

    <!-- pintamos todos los users -->
    <?php foreach ($consulta as $key => $value) { ?>
        <p><b>Nombre: </b><a href="detalle.php?user=<?=$value['nombre']?>"><?=$value['nombre']?></a></p>
        <p><b>Correo: </b><?=$value['correo']?></p>
        <hr>
    <?php } ?>
</body>
</html>