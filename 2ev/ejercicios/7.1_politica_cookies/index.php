<?php

    //debugging
    //print_r($_COOKIE);

    //SOLUCIÓN JORGE
    $mensajeCookies = true;
    $showError = false;
    $reset = false;
    //¿el user acepta?
    if (isset($_GET['accion']) && $_GET['accion'] == "aceptar") {
        setcookie("verificado",1);
        $mensajeCookies = false;
    }

    if (isset($_COOKIE["verificado"]) && $_COOKIE["verificado"] == 1) {
        $mensajeCookies = false;
    }

    if (isset($_GET["showError"]) && $_GET["showError"] == 1){
        $showError = true;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{box-sizing: border-box;}
        body{position: relative;}
        .cookies{
            display: flex;
            flex-flow: row;
            gap: 50px;
            position: fixed;
            left:0;
            right:0;
            bottom:0;
            padding: 15px;
            height:100px;
            border: 1px solid black;
            background-color:lightgray;
        }
        .cookies__acciones{
            flex-grow:1;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        .cookies__texto{
            flex-grow:1;
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            gap:10px;
        }
        .error-cookies{
            position: fixed;
            bottom: 100px;
            left:0;
            right:0;
            height: 50px;
            background-color:red;
            color: #fff;
            text-align: center;
            animation: sube 500ms ease-out forwards;
        }
        @keyframes sube{
            from{transform: translateY(50px)}
            to{transform: translateY(0)}
        }
    </style> 
</head>
<body>
    <!-- SOLUCION JORGE -->
    <h1>Bienvenido</h1>
    <a href="configurado.php">ACCEDER</a>
    <?php if ($mensajeCookies) { ?>
        <?php if ($showError) { ?>
            <div class='error-cookies'>
                <p>Acepta las cookies!!</p>
            </div>
        <?php }?>
        <div class='cookies'>
            <div class='cookies__acciones'>
                <a href="?accion=aceptar">ACEPTAR</a>
                <a href="?accion=rechazar">RECHAZAR</a>
            </div>
            <p class='cookies__texto'>
                Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. 
                Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, 
                cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una 
                galería de textos y los mezcló de tal manera que logró hacer un libro de textos especi.
            </p>
        </div>
    <?php }?>
   
</body>
</html>