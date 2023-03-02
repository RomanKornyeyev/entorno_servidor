<?php

    //acceso a BD, sesión, etc. (tiene que ir en TODAS)
    require('../src/init.php');

    //cogemos el user del get (sí, del GET)
    if(isset($_GET['user'])){
        //area de admin (modificar datos del perfil, INSERTS, etc)
        //si el usuario está logueado Y ES EL MISMO al buscado en el get
        if (isset($_SESSION['nombre']) && $_SESSION['nombre'] == $_GET['user']) {
            //activa el area de administración (edición del perfil)
            $administrador = true;

            //si el usuario ha enviado el form de modificar el perfil
            if (isset($_POST["enviar"])) {
                //cambiar la descripción
                if (isset($_POST["descripcion"]) && $_POST["descripcion"] != "") {
                    $descripcion = $_POST["descripcion"];
                    $db->ejecuta(
                        "UPDATE usuarios SET descripcion=? WHERE id=?",
                        $descripcion, $_SESSION['id']
                    );
                }
                //cambiar la img
                if (isset($_FILES['img'])) {
                    $nombreTmp = $_FILES['img']['tmp_name'];
                    $nombre = $_FILES['img']['name'];
                    $tipo = $_FILES['img']['type'];
        
                    if ($tipo == "image/png" || $tipo == "image/jpeg") {
                        if ($_FILES['img']['error'] == 0) {
                            //Mover el fichero a su posición final
                            move_uploaded_file($nombreTmp, "upload/perfiles/".$_SESSION['id'].".png"); //meter este upload/perfiles  en config
                            //actualizar la bd
                            $db->ejecuta(
                                "UPDATE usuarios SET img = ? WHERE id = ?;",
                                "upload/perfiles/".$_SESSION['id'].".png",
                                $_SESSION['id']
                            );
                        }
                    }else{
                        //mostrar error
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
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <!-- menu -->
    <?php include("menu.php"); ?>

    <!-- info del user -->
    <?php
        echo "<h2>nombre: ".$consulta["nombre"]."</h2>";       
        echo "<h2>id: ".$consulta["id"]."</h2>";
        echo "<h2>correo: ".$consulta["correo"]."</h2>";
        echo "<h2>img: ".$consulta["img"]."</h2>";
        echo "<img src='".$consulta["img"]."' alt='img'><br>"; //img de perfil
        echo "<h2>descripcion: ".$consulta["descripcion"]."</h2>";
    ?>

    <!-- si es el mismo user logueado, puede editar su info -->
    <?php if($administrador){ ?>
        <!-- importante el enctype="multipart/form-data" para poder subir imgs -->
        <form action="" method="post" enctype="multipart/form-data">
            Imagen: <input type="file" name="img" id="img"><br>
            Descripción: <input type="text" name="descripcion" id="descripcion"><br>
            <input type="submit" value="enviar" name="enviar">
        </form>
    <?php } ?>
</body>
</html>