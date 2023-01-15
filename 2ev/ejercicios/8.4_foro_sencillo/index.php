<?php 

    require('./init.php');

    $resultado = $mbd->prepare("SELECT * FROM TEMAS");
    $resultado->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ForoSencillo - Inicio</title>
</head>
<body>
    
</body>
</html>