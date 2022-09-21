<?php
    $nombre = "Roman";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo_4.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>¡Hola mundo!</h1>
        <p>Esta página está programada por <span><?= $nombre ?></span></p>
    </div>
</body>
</html>