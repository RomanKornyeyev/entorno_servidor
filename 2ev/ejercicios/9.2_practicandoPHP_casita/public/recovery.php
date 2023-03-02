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
        //si el formulario se ha enviado
        if (isset($_POST['enviar'])) {
            //comprobación nombre
            if (isset($_POST['correo']) && $_POST['correo'] != "" && $_POST['correo'] != null) $datos['correo'] = clean_input($_POST['correo']);
            else $errores['correo'] = "<span class='error'>*El campo correo no puede estar vacío</span>";

            //si no hay campos vacíos
            if (count($errores) == 0) {
                //comprueba si existe este correo en la BD
                $db->ejecuta(
                    "SELECT * FROM usuarios WHERE correo=?;",
                    $datos['correo']
                );
                $consulta = $db->obtenElDato();

                //si el correo existe (si la consulta no está vacía)
                if ($consulta != "") {
                    //generamos el token de recovery
                    $token = bin2hex(openssl_random_pseudo_bytes(DWESBaseDatos::LONG_TOKEN));

                    //insertamos token en BD
                    $db->ejecuta(
                        "INSERT INTO tokens (id_usuario, valor) VALUES (?, ?);",
                        $consulta['id'], $token
                    );

                    //mail de recovery
                    Mailer::sendEmail(
                        $consulta['correo'],
                        "Account recovery",
                        "Hola ".$consulta['nombre'].", has solicitado recuperar la contraseña. Haz click en este enlace para recuperarla:
                        <a target='_blank' href='http://localhost:8000/public/recovery.php?token=".$token."'>recuperar</a>"
                    );

                    //redirect a esta misma página con GET "enviado"
                    header('Location: recovery.php?enviado=si');
                    die();
                }
            }
        }
    //si el user ha llegado a esta página con un token
    }else if(isset($_GET['token'])){
        echo "recuperando contraseña";
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

    <!-- form para introducir el correo de recuperación -->
    <?php if (!isset($_GET['token']) && !isset($_GET['enviado'])) { ?>
        <h2>¿Contraseña olvidada?</h2>
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

    <?php if (isset($_GET['enviado']) && $_GET['enviado'] == "si") { ?>
        <h2>¡¡Correo de recuperación enviado, revisa tu email!!</h2>
    <?php } ?>
</body>
</html>