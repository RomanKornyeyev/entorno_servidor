<?php 

    require("DWESBaseDatos.php");
    require("config.php");
    require('../vendor/autoload.php');


    $DB=DWESBaseDatos::obtenerInstancia();
    $DB->inicializa(
        $CONFIG['db_name'],
        $CONFIG['db_user'],
        $CONFIG['db_pass']
    );


?>