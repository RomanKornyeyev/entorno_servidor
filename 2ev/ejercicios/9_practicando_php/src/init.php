<?php

    //primero clases externas y luego las nuestras
    require("config.php");
    require("DWESBaseDatos.php");
    require("recuerdame.php");

    $DB=DWESBaseDatos::obtenerInstancia();
    $DB->inicializa(
        $CONFIG['db_name'],
        $CONFIG['db_user'],
        $CONFIG['db_pass']
    );

    //pon la política de cookies
    session_start();

?>