<?php

    if (!isset($_COOKIE["verificado"]) || $_COOKIE["verificado"] != 1) {
        header("Location: index.php?showError=1");
    }

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
    <h1>CONFIGURADO BROSKI</h1>
    <a href="index.php">Volver a inicio</a>
</body>
</html>