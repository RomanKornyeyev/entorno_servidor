<?php

    require("../src/init.php");

    //si no está logueado, revisame el form de login
    if (!isset($_SESSION['nombre'])) {
        if ($_POST['enviar']) {
            if (isset($_POST['nombre']) && $_POST['nombre']!="" && isset($_POST['pass']) && $_POST['pass']!="") {
                //no confundir con la variable $username de init
                $nombre = $_POST['nombre'];
                $pass = $_POST['pass'];

                //nos envian la info de login
                //comprobamos en la BD si esa info coincide
                $db->ejecuta(
                    "SELECT * FROM usuarios WHERE nombre=?",
                    $nombre
                );
                $consulta = $db->obtenElDato();
                //como el nombre es único, nos devolvería o una row o ninguna
                //si la consulta NO está vacía, es que coincide el user, es decir, existe el user
                //ahora pasaremos a verificar la pass
                if ($consulta != "") {
                    //si el usuario y la pass es correcta, lo guardamos en un $_SESSION
                    if (password_verify($pass, $consulta["passwd"])) {
                        $_SESSION['nombre'] = $nombre;
                        $_SESSION['correo'] = $consulta['correo'];
                        $_SESSION['id'] = $consulta['id'];

                        //si el user ha pedido recuerdame
                        if(isset($_POST['recuerdame']) && $_POST['recuerdame'] == "on"){
                            //generamos token
                            $token = bin2hex(openssl_random_pseudo_bytes(DWESBaseDatos::LONG_TOKEN));

                            //insertar token en BD
                            $db->ejecuta(
                                "INSERT INTO tokens (id_usuario, valor) VALUES (?,?);",
                                $_SESSION['id'], $token
                            );

                            //settear la cookie al usuario
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
                        header("Location: ".$paginaAnterior);
                        die();
                    }else{
                        echo "contra incorrecta";
                    }
                }else{
                    echo "no existe el usuario";
                }
                print_r($consulta);
            }else{
                echo "hay errores";
            }
        }
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
    <h1>LOGIN</h1>
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
        Pass <input type="password" name="pass" id="pass">
        Recuerdame <input type="checkbox" name="recuerdame" id="recuerdame">
        <input type="submit" value="enviar" name="enviar">
    </form>
</body>
</html>