<?php

    require('../src/init.php');

    //cogemos el user del get (sí, del GET)
    if(isset($_GET['user'])){
        //area de admin (modificar datos del perfil, INSERTS, etc)
        //si el usuario está logueado y es el mismo al buscado en el get
        if (isset($_SESSION['nombre']) && $_SESSION['nombre'] == $_GET['user']) {
            //activa el area de administración (edición del perfil)
            $administrador = true;

            //si el usuario ha enviado el form de modificar el perfil
            if (isset($_POST["enviar"])) {
                //para cambiar la descripcion
                if (isset($_POST["descripcion"]) && $_POST["descripcion"] != "") {
                    $descripcion = $_POST["descripcion"];
                    $db->ejecuta(
                        "UPDATE usuarios SET descripcion=? WHERE id=?",
                        $descripcion, $_SESSION['id']
                    );
                }
                //para cambiar la img
                if (isset($_FILES['img'])) {                    
                    //subir img
                    $imagen = $_FILES['img'];
                    $nombreTmp = $imagen['tmp_name'];
                    $nombre = $imagen['name'];
                    $tipo = $imagen['type'];

                    $ruta = "upload/".$nombre;
                    if ($imagen['error'] == 0) {
                        if (move_uploaded_file($nombreTmp, $ruta)) {
                            $db->ejecuta(
                                "UPDATE usuarios SET img=? WHERE id=?",
                                $ruta, $_SESSION['id']
                            ); 
                        }
                    }
                }
            }
        }else{
            $administrador = false;
        }
        //leemos los datos del user
        $db->ejecuta(
            "SELECT * FROM usuarios WHERE nombre=?;",
            $_GET['user']
        );
        $consulta = $db->obtenElDato();
    //si llegamos a detalle sin user en el get, no hay info a mostrar, ergo lo devolvemos al index
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
    <h1>DETALLE, hola <?=$username?></h1>
    <a href="index.php">index</a>
    <a href="login.php">login</a>
    <a href="register.php">register</a>
    <a href="private1.php">private1</a>
    <a href="private2.php">private2</a>
    <a href="private3.php">private3</a>
    <a href="logout.php">logout</a>
    <hr>

    <?php
        echo "<h2>nombre: ".$consulta["nombre"]."</h2>";       
        echo "<h2>id: ".$consulta["id"]."</h2>";
        echo "<h2>correo: ".$consulta["correo"]."</h2>";
        echo "<h2>img: ".$consulta["img"]."</h2>";
        echo "<img src='".$consulta["img"]."' alt='img'><br>"; //img de perfil
        echo "<h2>descripcion: ".$consulta["descripcion"]."</h2>";
    ?>

    <?php if($administrador){ ?>
    
        <form action="" method="post" enctype="multipart/form-data">
            Imagen: <input type="file" name="img" id="img"><br>
            Descripción: <input type="text" name="descripcion" id="descripcion"><br>
            <input type="submit" value="enviar" name="enviar">
        </form>
    <?php } ?>
</body>
</html>