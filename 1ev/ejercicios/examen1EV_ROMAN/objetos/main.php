<?php

    //autoload 
    spl_autoload_register(function ($class) {
        $classPath = realpath("./");
        $file = str_replace('\\','/', $class);
        $include = "$classPath/${file}.php";
        require($include);
    });

    //examen fácil
    $a = new ExamenFacil('prueba');
    echo $a->obtenerNota();
    $a->setFecha("10/10/2023");

    //examen chungo
    $b = new ExamenChungo('prueba');
    echo $b->obtenerNota();
    $b->setFecha("10/10/2024");

    //examen hp
    $c = new ExamenHP('prueba');
    echo $c->obtenerNota();
    $c->setFecha("10/10/2025");

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Román">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examenes</title>
</head>
<body>
    
</body>
</html>