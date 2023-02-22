<?php

    require("../src/init.php");

    //si no está logueado, revisame el form de registro
    if (!isset($_SESSION['nombre'])) {
        if ($_POST['enviar']) {
            if (isset($_POST['nombre']) && $_POST['nombre']!="" && isset($_POST['pass']) && $_POST['pass']!="" && isset($_POST['correo']) && $_POST['correo']!="") {
                //no confundir con la variable $username de init
                $nombre = $_POST['nombre'];
                $pass = password_hash($_POST['pass'], PASSWORD_DEFAULT);
                $correo = $_POST['correo'];
    
                //nos envian la info de login
                //comprobamos en la BD si esa info coincide
                $db->ejecuta(
                    "SELECT * FROM usuarios WHERE nombre=?",
                    $nombre
                );
                $consulta = $db->obtenElDato();
                //si la consulta está vacía, es que no hay ningún usuario con este nombre
                //entonces, procede a registrarme ese usuario
                if ($consulta == "") {
                    $db->ejecuta(
                        "INSERT INTO usuarios (nombre, passwd, correo) VALUES (?,?,?);",
                        $nombre, $pass, $correo
                    );

                    if ($db->getExecuted()) {
                        $db->ejecuta(
                            "SELECT * FROM usuarios WHERE nombre=?;",
                            $nombre
                        );
                        $consulta = $db->obtenElDato();

                        //si todo ha salido ok, le ponemos la sesión
                        $_SESSION['nombre'] = $nombre;
                        $_SESSION['correo'] = $correo;
                        $_SESSION['id'] = $consulta['id'];

                        //enviamos correo de registro
                        Mailer::sendEmail(
                            $correo,
                            "Practicando PHP jeje",
                            "Bienvenido, estoy practicando PHP jeje"
                        );

                        //redirigimos a la página anterior en caso de que viniese de una
                        header("Location: ".$paginaAnterior);
                        die();
                    }
                }else{
                    echo "el nombre de usuario ya existe";
                }
            }else{
                echo "hay errores";
            }
        }
    //si el user está logueado, redireccionalo a index.php
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
</head>
<body>
    <h1>REGISTER</h1>
    <a href="index.php">index</a>
    <a href="login.php">login</a>
    <a href="register.php">register</a>
    <a href="private1.php">private1</a>
    <a href="private2.php">private2</a>
    <a href="private3.php">private3</a>
    <a href="logout.php">logout</a>
    <hr>

    <form action="" method="post">
        Nombre <input type="text" name="nombre" id="nombre">
        Correo <input type="text" name="correo" id="correo">
        Pass <input type="password" name="pass" id="pass">
        <input type="submit" value="enviar" name="enviar">
    </form>
</body>
</html>