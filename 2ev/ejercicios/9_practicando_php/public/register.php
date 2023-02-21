<?php

    require("../src/init.php");

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

                $_SESSION['nombre'] = $nombre;
                $_SESSION['correo'] = $consulta['correo'];
                $_SESSION['id'] = $consulta['id'];
                header("Location: ".$paginaAnterior);
                die();
            }else{
                echo "el nombre de usuario ya existe";
            }
            //print_r($consulta);
        }else{
            echo "hay errores";
        }
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
    <hr>

    <form action="" method="post">
        Nombre <input type="text" name="nombre" id="nombre">
        Correo <input type="text" name="correo" id="correo">
        Pass <input type="password" name="pass" id="pass">
        <input type="submit" value="enviar" name="enviar">
    </form>
</body>
</html>