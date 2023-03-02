<?php

    //acceso a BD, sesión, etc. (tiene que ir en TODAS)
    require("../src/init.php");

    //si no tiene sesión iniciada
    if (!isset($_SESSION['nombre'])) {
        //redirect al login
        header("Location: login.php");
        die();
    }

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
    <?php include("menu.php"); ?>

    <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
        Illo architecto ad labore sint mollitia consequatur nemo at expedita porro ipsum.
    </p>

</body>
</html>