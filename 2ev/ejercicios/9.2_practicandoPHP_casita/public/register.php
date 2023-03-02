<?php 

    //acceso a BD, sesión, etc. (tiene que ir en TODAS)
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

            //comprobación correo
            if (isset($_POST['correo']) && $_POST['correo'] != "" && $_POST['correo'] != null) $datos['correo'] = clean_input($_POST['correo']);
            else $errores['correo'] = "<span class='error'>*El campo correo no puede estar vacío</span>";

            //comprobación passwd
            if (isset($_POST['passwd']) && $_POST['passwd'] != "" && $_POST['passwd'] != null) $datos['passwd'] = password_hash(clean_input($_POST['passwd']), PASSWORD_DEFAULT);
            else $errores['passwd'] = "<span class='error'>*El campo passwd no puede estar vacío</span>";

            //si NO hay errores, buscamos al user en la BD
            if (count($errores) == 0) {
                //comprobamos si el nombre ya existe
                $db->ejecuta(
                    "SELECT * FROM usuarios WHERE nombre=?;",
                    $datos['nombre']
                );
                $consulta = $db->obtenElDato();

                //si la consulta está vacía, es que no hay ningún usuario con este nombre
                //entonces, procede a registrarme ese usuario
                if ($consulta == "") {
                    //insert de user en BD
                    $db->ejecuta(
                        "INSERT INTO usuarios (nombre, passwd, correo) VALUES (?,?,?);",
                        $datos['nombre'], $datos['passwd'], $datos['correo']
                    );

                    //si el insert se ha ejecutado con éxito (todo ha salido ok)
                    if ($db->getExecuted()) {
                        //hacemos otra consulta auxiliar, para cargar los datos en $consulta y poder meterlos al $_SESSION
                        $db->ejecuta(
                            "SELECT * FROM usuarios WHERE nombre=?;",
                            $nombre
                        );
                        $consulta = $db->obtenElDato();

                        //le iniciamos la sesión
                        $_SESSION['id'] = $consulta['id'];
                        $_SESSION['nombre'] = $datos['nombre'];
                        $_SESSION['correo'] = $datos['correo'];

                        //mail confirmación
                        Mailer::sendEmail(
                            $datos['correo'],
                            "Practicando PHP jeje",
                            "Bienvenido ".$datos['nombre'].", estoy practicando PHP jeje"
                        );

                        //redirigimos a la página anterior en caso de que viniese de una
                        header("Location: ".$paginaAnterior);
                        die();
                    }
                //si el nombre de usuario está repetido
                }else{
                    $errores['repetido'] = "El nombre de usuario ya existe";
                }
            }
        }

    //si el user tiene la sesión iniciada
    }else{
        //redirect a index
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

    <form action="" method="post">
        <!-- input nombre -->
        Nombre: <input type="text" name="nombre" id="nombre" value="<?=$datos['nombre']?>"><br>
        <?php if(isset($errores['nombre'])) echo $errores['nombre']."<br>" ?>

        <!-- input correo -->
        Correo: <input type="text" name="correo" id="correo" value="<?=$datos['correo']?>"><br>
        <?php if(isset($errores['correo'])) echo $errores['correo']."<br>" ?>

        <!-- input pass -->
        Password: <input type="password" name="passwd" id="passwd"><br>
        <?php if(isset($errores['passwd'])) echo $errores['passwd']."<br>" ?>

        <!-- error nombre repetido -->
        <div class="error">
            <?php if(isset($errores['repetido'])) echo $errores['repetido'] ?>
        </div>
        
        <!-- submit -->
        <input type="submit" value="enviar" name="enviar">
    </form>
</body>
</html>