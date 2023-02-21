<?php

    require("config.php");
    require("DWESBaseDatos.php");

    $db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa(
        $CONFIG['db_name'],
        $CONFIG['db_user'],
        $CONFIG['db_pass']
    );

    session_start();

    require("paginaAnterior.php");
    $username = (isset($_SESSION['nombre']))? $_SESSION['nombre']:'anonimo';

?>