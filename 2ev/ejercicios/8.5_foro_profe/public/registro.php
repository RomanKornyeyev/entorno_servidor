<?php 
    require("../src/init.php");

    $insertado=false;
    if(isset($_POST['registrar'])){
        $DB->ejecuta(
            "INSERT INTO usuarios (nombre, passwd, correo) VALUES (?,?,?)",
            $_POST['nombre'],
            password_hash($_POST['passwd'], PASSWORD_DEFAULT),
            $_POST['correo']
        );
        $insertado = $DB->getExecuted();
        if($insertado){
            Mailer::sendEmail(
                $_POST['correo'],
                "Nuevo usuario",
                <<<EOL
                    Bienvenido $_POST['nombre'],
                    Has hecho bien en registrarte.
                EOL
            );
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
    <h1>REGISTRO</h1>
    <?php if(!$insertado) { ?>
    <form action="registro.php" method="POST">
        Nombre: <input type="text" name="nombre" id="nombre"></br>
        Passowrd: <input type="password" name="passwd" id="passwd"></br>
        Email:<input type="email" name="correo" id="correo">
        <input type="submit" name="registrar" value="Registrar">
    </form>
    <?php }else{ ?>
        <p>REGISTRADO!</p>
    <?php } ?>
</body>
</html>