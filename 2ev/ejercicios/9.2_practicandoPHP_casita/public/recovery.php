<?php

    //acceso a BD, sesión, etc. (tiene que ir en TODAS)
    require("../src/init.php");

    //errores para form
    $datos = [];
    $errores = [];

    // desde esta página se va a gestionar todo, tanto introducir el email para el recovery
    // como el recovery en sí con el token, la lógica que se sigue es si entras a esta página SIN el get
    // de token, tienes que poner el correo al cual va a ir la recuperación
    // y si entras CON el get del token (y este coincide con un user), procedes a updatear la password

    //si no está establecido el get del token, mostramos el form para enviar el correo de recuperación
    if (!isset($_GET['token'])) {
        
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

    <h2>¿Contraseña olvidada?</h2>
    <!-- form para introducir el correo de recuperación -->
    <?php if (!isset($_GET['token'])) { ?>
        <form action="" method="post">
            <!-- input correo -->
            Correo: <input type="text" name="correo" id="correo" value="<?=$datos['correo']?>"><br>
            <?php if(isset($errores['correo'])) echo $errores['correo']."<br>" ?>

            <!-- error -->
            <div class="error">
                <?php if(isset($errores['incorrecto'])) echo $errores['incorrecto'] ?>
            </div>

            <!-- submit -->
            <input type="submit" value="recuperar" name="enviar">
        </form>
    <?php } ?>
</body>
</html>