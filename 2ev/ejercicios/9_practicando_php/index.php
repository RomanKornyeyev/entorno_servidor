<?php

    require("src/init.php");
    
    //Obtiene info del modelo
    $DB->ejecuta("SELECT * FROM usuarios");
    $usuarios = $DB->obtenDatos();
    print_r($usuarios);

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
    <h1>INDEX</h1>
</body>
</html>