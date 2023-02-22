<?php

    require("../src/init.php");

    //si no tiene sesión iniciada, le mandamos al login
    if (!isset($_SESSION['nombre'])) {
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
</head>
<body>
    <h1>ÁREA PRIVADA, hola <?=$username?></h1>
    <a href="index.php">index</a>
    <a href="login.php">login</a>
    <a href="register.php">register</a>
    <a href="private.php">private</a>
    <a href="logout.php">logout</a>
    <hr>

    <p>
        Lorem, ipsum dolor sit amet consectetur adipisicing elit.
        Illo architecto ad labore sint mollitia consequatur nemo at expedita porro ipsum.
    </p>

</body>
</html>