<?php 

    require("../src/DWESBaseDatos.php");
    require("../src/config.php");

    $DB=DWESBaseDatos::obtenerInstancia();
    $DB->inicializa(
        $CONFIG['db_name'],
        $CONFIG['db_user'],
        $CONFIG['db_pass']
    );


?>