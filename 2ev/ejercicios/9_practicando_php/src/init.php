<?php

    //conexión a BD
    require("config.php");
    //librería de PDO
    require("DWESBaseDatos.php");
    //lo del mailer
    require("../vendor/autoload.php");
    require("Mailer.php");

    //instencia de acceso a BD
    $db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa(
        $CONFIG['db_name'],
        $CONFIG['db_user'],
        $CONFIG['db_pass']
    );

    //sesión
    session_start();

    //estos tienen que ir debajo del session_start(), porque si no, NO EXISTE $_SESSION
    require("recuerdame.php");
    require("paginaAnterior.php");
    $username = (isset($_SESSION['nombre']))? $_SESSION['nombre']:'anonimo';

?>