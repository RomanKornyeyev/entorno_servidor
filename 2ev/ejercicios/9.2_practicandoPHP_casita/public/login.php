<?php

    require("../src/init.php");

    //errores para form
    $datos = [];
    $errores = [];

    //si el user no tiene sesión iniciada
    if (!isset($_SESSION['nombre'])) {
        //si el form se ha enviado
        if (isset($_POST['enviar'])) {
            //comprobación nombre
            if (isset($_POST['nombre']) && $_POST['nombre'] != "" && $_POST['nombre'] != null) $datos['nombre'] = clean_input($_POST['nombre']);
            else $errores['nombre'] = "<span class='error'>*El campo nombre no puede estar vacío</span>";

            //comprobación passwd
            if (isset($_POST['passwd']) && $_POST['passwd'] != "" && $_POST['passwd'] != null) $datos['passwd'] = clean_input($_POST['passwd']);
            else $errores['passwd'] = "<span class='error'>*El campo passwd no puede estar vacío</span>";

            //si NO hay errores, buscamos al user en la BD
            if (count($errores) == 0) {
                $db->ejecuta(
                    "SELECT * FROM usuarios WHERE nombre=?",
                    $datos['nombre']
                );
                $consulta = $db->obtenElDato();
                //si hay un user que coincide
                if ($consulta != "") {
                    //verificamos la pass, si es correcta metemos valores a $_SESSION
                    if(password_verify($datos['passwd'], $consulta["passwd"])){
                        $_SESSION['nombre'] = $consulta['nombre'];
                        $_SESSION['correo'] = $consulta['correo'];
                        $_SESSION['id'] = $consulta['id'];

                        //si el usuario ha pedido recuerdame
                        if (isset($_POST['recuerdame']) && $_POST['recuerdame'] == "on") {
                            //generamos token
                            $token = bin2hex(openssl_random_pseudo_bytes(DWESBaseDatos::LONG_TOKEN));

                            //insertamos token en BD
                            $db->ejecuta(
                                "INSERT INTO tokens (id_usuario, valor) VALUES (?, ?);",
                                $_SESSION['id'], $token
                            );

                            //creamos la cookie
                            setcookie(
                                "recuerdame",
                                $token,
                                [
                                    "expires" => time() + 7 * 24 * 60 * 60,
                                    /*"secure" => true,*/
                                    "httponly" => true
                                ]
                            );
                        }

                        //si viniese de otra página, se le redirige
                        header("Location: ".$paginaAnterior);
                        die();
                    }else{
                        echo "nombre/pass incorrectas";
                    }
                }else{
                    echo "nombre/pass incorrectas";
                }
            }
        }
    //si está logueado, redirect al index
    }else{
        header("Location: index.php");
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
    <style>.error{color:red}</style>
</head>
<body>
    <h1>LOGIN, hola <?=$username?></h1>
    <a href="index.php">index</a>
    <a href="login.php">login</a>
    <a href="register.php">register</a>
    <a href="private.php">private</a>
    <a href="logout.php">logout</a>
    <hr>

    <form action="" method="post">
        Nombre: <input type="text" name="nombre" id="nombre"><br>
        <?php if(isset($errores['nombre'])) echo $errores['nombre']."<br>" ?>

        Password: <input type="password" name="passwd" id="passwd"><br>
        <?php if(isset($errores['passwd'])) echo $errores['passwd']."<br>" ?>

        Recuerdame: <input type="checkbox" name="recuerdame" id="recuerdame"><br>
        <input type="submit" value="enviar" name="enviar">
    </form>
</body>
</html>