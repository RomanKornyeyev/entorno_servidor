<?php

    // **** ACLARACIÓN ****
    // He inicializado tiempo como VARCHAR(255) porque nos lo permitiste
    // Y he llamado a la variable tiempo en vez de timestamp
    // Por lo demás es todo igual


    require('./accesoBD.php');

    // Prepare
    $stmt = $mbd->prepare("INSERT INTO Logs (navegador, tiempo) VALUES (:navegador, :tiempo)");
    // Bind
    $navegador = $_SERVER["HTTP_USER_AGENT"]; //string
    $tiempo = date("H:i:s"); //string
    $stmt->bindParam(':navegador', $navegador);
    $stmt->bindParam(':tiempo', $tiempo);
    // Excecute
    $stmt->execute();


?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Román">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASE DE DATOS</title>
</head>
<body>
    <h1>Hola mundo!</h1>
    <a href="registros.php">Ir a registros</a>
</body>
</html>