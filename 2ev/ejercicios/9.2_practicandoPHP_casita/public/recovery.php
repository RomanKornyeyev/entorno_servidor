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

    //si no está establecido el get del token y el user NO TIENE LA SESIÓN INICIADA, mostramos el form para enviar el correo de recuperación
    if (!isset($_GET['token']) && !isset($_SESSION['nombre'])) {
        //si el formulario se ha enviado
        if (isset($_POST['enviar'])) {
            //comprobación correo
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
                }else{
                   //redirect a esta misma página con GET "enviado"
                   // (en este caso no se habría enviado, pero por temas de seguridad no lo decimos)
                   header('Location: recovery.php?enviado=si');
                   die(); 
                }
            }
        }
    //si el user ha llegado a esta página con un token y NO TIENE LA SESIÓN INICIADA
    //procedemos a hacer las comprobaciones y resetear la contraseña
    }else if(isset($_GET['token']) && !isset($_SESSION['nombre'])){
        //comprobamos si es un token válido
        $db->ejecuta(
            "SELECT * FROM usuarios WHERE id=(SELECT id_usuario FROM tokens WHERE valor=?);",
            $_GET['token']
        );
        $consulta = $db->obtenElDato();

        //si el token concuerda con un id de usuario
        //es decir, si la consulta anterior no está vacía
        //pasamos a procesar la nueva password enviada
        if ($consulta != "") {
            if (isset($_POST['enviar_passwd'])) {
                //comprobación passwd
                if (isset($_POST['passwd']) && $_POST['passwd'] != "" && $_POST['passwd'] != null) $datos['passwd'] = password_hash(clean_input($_POST['passwd']), PASSWORD_DEFAULT);
                else $errores['passwd'] = "<span class='error'>*El campo passwd no puede estar vacío</span>";

                //si no hay campos vacíos
                if (count($errores) == 0) {
                    //actualizamos la password
                    $db->ejecuta(
                        "UPDATE usuarios SET passwd=? WHERE id=?;",
                        $datos['passwd'], $consulta['id']
                    );
                    //eliminamos el token
                    $db->ejecuta(
                        "DELETE FROM tokens WHERE valor=?;",
                        $_GET['tokens']
                    );

                    //redirect a esta misma página, con mensaje de éxito
                    header("Location: recovery.php?exito=si");
                    die();
                }
            }
        }
    //si el user entra con la sesión iniciada     
    }else{
        //redirect al index
        header('Location: index.php');
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

    <!-- form para introducir el correo de recuperación -->
    <?php if (!isset($_GET['token']) && !isset($_GET['enviado']) && !isset($_GET['exito'])) { ?>
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

    <!-- si el correo de recuperación se ha enviado -->
    <?php if (isset($_GET['enviado']) && $_GET['enviado'] == "si") { ?>
        <h2>Si el correo está registrado, se ha enviado un correo de recuperación</h2>
    <?php } ?>

    <!-- si el user ha entrado con un token -->
    <?php if (isset($_GET['token'])) { ?>
        <form action="recovery.php?token=<?=$_GET['token']?>" method="post">
            <!-- input passwd -->
            Nueva password: <input type="password" name="passwd" id="passwd" value="<?=$datos['passwd']?>"><br>
            <?php if(isset($errores['passwd'])) echo $errores['passwd']."<br>" ?>

            <!-- error -->
            <div class="error">
                <?php if(isset($errores['incorrecto'])) echo $errores['incorrecto'] ?>
            </div>

            <!-- submit -->
            <input type="submit" value="recuperar" name="enviar_passwd">
        </form>
    <?php } ?>

    <!-- si la contraseña se ha actualizado -->
    <?php if (isset($_GET['exito']) && $_GET['exito'] == "si") { ?>
        <h2>La contraseña ha sido cambiada!</h2>
    <?php } ?>
</body>
</html>