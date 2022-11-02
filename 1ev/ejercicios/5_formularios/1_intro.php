<?php

    // echo "<pre>";
    // print_r($_SERVER);
    // echo "</pre>";
    // echo "<hr>";

    // echo "<pre>";
    // print_r($_GET);
    // echo "</pre>";
    // echo "<hr>";

    // echo "<pre>";
    // print_r($_POST);
    // echo "</pre>";
    // echo "<hr>";

    print "<b>Sistema opertivo y navegador:</b> ".$_SERVER["HTTP_USER_AGENT"];
    echo "<hr>";

    $lenguaje = explode("-", $_SERVER['HTTP_ACCEPT_LANGUAGE']);
    print "<b>Lenguaje:</b> ".strtoupper($lenguaje[0]).", ";
    switch ($lenguaje[0]) {
        case 'es': print "Bienvenido";break;
        case 'en': print "Welcome";break;
        case 'uk': print "Вітати";break;
        case 'ru': print "Добро пожаловать";break;
        case 'fr': print "Accueillir";break;
        
        default:print "We don't know your language dude =(";break;
    }
    echo "<hr>";

    $error = false;
    $nombre = "";
    if(isset($_GET['nombre'])){
        $nombre = $_GET['nombre'];
        if($nombre == ""){
            $nombre = "anónimo";
            $error = true;
        }
    }else{
        $nombre = "anónimo";
    }


?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intro</title>
    <style>
        body{
            padding: 25px;
        }
    </style>
</head>
<body>
    <form action="" method="get">
        Nombre: <input name="nombre" type="text" value=<?= "$nombre" ?>>
        <button type="submit" name="enviar">enviar</button>
        <?php if ($error) { ?>
            <p>Eres un poco manazas, rellena el campo</p>
        <?php } ?>
    </form>
</body>
</html>