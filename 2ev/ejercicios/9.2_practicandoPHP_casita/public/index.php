<?php

    require("../src/init.php");

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
</head>
<body>
    <h1>INDEX, hola <?=$username?></h1>
    <a href="index.php">index</a>
    <a href="login.php">login</a>
    <a href="register.php">register</a>
    <a href="private.php">private</a>
    <a href="logout.php">logout</a>
    <hr>

    <?php
    
        foreach ($consulta as $key => $value) {
            echo "<p><b>Nombre: </b>".$value['nombre']."</p>";
            echo "<p><b>Correo: </b>".$value['correo']."</p>";
            echo "<hr>";
        }

    ?>

</body>
</html>