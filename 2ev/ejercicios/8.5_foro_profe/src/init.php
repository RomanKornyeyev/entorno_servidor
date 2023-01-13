<?php 

    const LONG_TOKEN = 64;

    //primero clases externas y luego las nuestras
    require("config.php");

    require('../vendor/autoload.php');

    require("DWESBaseDatos.php");
    require("Mailer.php");
    


    $DB=DWESBaseDatos::obtenerInstancia();
    $DB->inicializa(
        $CONFIG['db_name'],
        $CONFIG['db_user'],
        $CONFIG['db_pass']
    );

    //pon la política de cookies
    session_start();


?>