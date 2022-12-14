<?php

    print_r($_COOKIE);

    // $enlaceAcceso;
    // if (isset($_GET['verificado'])) {
    //     setcookie("verificado", "true");
    //     $enlaceAcceso = "configurado.php";
    // }else{
    //     $enlaceAcceso = "";
    // }

    //SOLUCIÓN JORGE
    $mensajeCookies = true;
    //¿el user acepta?
    if (isset($_GET['accion']) && $_GET['accion'] == "aceptar") {
        setcookie("verificado",1);
        $mensajeCookies = false;
    }

    if (isset($_COOKIE["verificado"]) && $_COOKIE["verificado"] == 1) {
        $mensajeCookies = false;
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
        body{position: relative;}
        .cookies{
            display: flex;
            flex-flow: row;
            gap: 15px;
            position: fixed;
            left:0;
            bottom:0;
            padding: 15px;
            width: 100%;
            min-height:100px;
            border: 1px solid black;
            background-color:lightgray;
        }
        .cookies>form{flex-grow:1}
        .cookies>p{flex-grow:1}
        .form{
            display: flex;
            flex-flow: column;
            justify-content: center;
            align-items: center;
            gap:10px;
        }
        /* solucion jorge */
        .cookies-profe{
            position: fixed;
            left:0;
            bottom:0;
            right:0;
            min-height: 75px;
            border: 1px solid black;
            background-color: lightgray;
        }
    </style> 
</head>
<body>
    <h1>Bienvenido</h1>
    <a href="<?php $enlaceAcceso ?>">ACCESO</a>

    <?php 
        // if(isset($_COOKIE['verificado']) && $_COOKIE['verificado'] == "true"){
            
        // }else{
            //echo "<div class='cookies'>
            //<div class='form'>
            //    <a href='index.php?verificado=true' name='verificado'>ACEPTAR</a>
            //    <a href='index.php' name='verificado'>RECHAZAR</a>
            //</div>
            //<p>
            //Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.
            //Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, 
            //cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una 
            //galería de textos y los mezcl. Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto.
            //Lorem Ipsum ha sido el texto.
            //</p>
            //</div>";
        //}
    ?>
    <!-- SOLUCION JORGE -->
    Bienvenido
    <?php if ($mensajeCookies) { ?>
        <div class='cookies-profe'>
            <a href="?accion=aceptar">Aceptar</a>
            <a href="?accion=rechazar">RECHAZAR</a>
        </div>
    <?php }?>
   
</body>
</html>