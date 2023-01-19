<?php 

    require("../src/init.php");

    if (!isset($_SESSION['nombre']) || $_SESSION['nombre'] == "") {
        header("Location: login.php?redirect=edit.php");
        die();
    }

    if (isset($_POST['actualizar'])) {
        //Actualizo todos los campos escritos, en este caso solo textarea
        $DB->ejecuta(
            "UPDATE usuarios SET descripcion = ? WHERE id = ?",
            $_POST['descripcion'],
            $_SESSION['id']
        );

        //Proceso la imagen

        

        if (isset($_FILES['imagen'])) {
            $nombreTmp = $_FILES['imagen']['tmp_name'];
            $nombre = $_FILES['imagen']['name'];
            $tipo = $_FILES['imagen']['type'];

            if ($tipo == "image/png" || $tipo == "image/jpeg") {
                if ($_FILES['imagen']['error'] == 0) {
                    //Mover el fichero a su posición final
                    move_uploaded_file($nombreTmp, "upload/perfiles/".$_SESSION['id'].".png"); //meter este upload/perfiles  en config
                    //actualizar la bd
                    $DB->ejecuta(
                        "UPDATE usuarios SET img = ? WHERE id = ?",
                        "upload/perfiles/".$_SESSION['id'].".png",
                        $_SESSION['id']
                    );
                }
            }else{
                //mostrar error
            }

        }
    }

    $DB->ejecuta(
        "SELECT * 
        FROM usuarios
        WHERE id = ?",
        $_SESSION['id']
    );
    $usuario = $DB->obtenElDato();

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
    <h1>Aquí va el formulario para editar tu perfil</h1>
    <h3>Esta es tu información</h3>
    <h4><?=$usuario['nombre']?></h4>
    <form action="" method="post" enctype="multipart/form-data">
        <?php if ($usuario['img'] != "") { ?>
            <img src="<?=$usuario['img']?>" alt="foto-perfil">
        <?php } ?>
        Imagen de perfil: <input type="file" accept="image/png,image/jpeg" name="imagen" id="imagen"><br>
        Descripción:<br>
        <textarea name="descripcion" id="descripcion" cols="30" rows="10"><?=$usuario['descripcion']?></textarea>
        <input type="submit" value="Actualizar" name="actualizar">
    </form>
</body>
</html>