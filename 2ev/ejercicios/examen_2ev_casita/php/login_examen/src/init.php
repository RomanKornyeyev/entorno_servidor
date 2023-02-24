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

    $userName = "anónimo";
    $userGroup = "anónimo";
    //si el user tiene sesión iniciada, significa que tiene establecido sesion de id, nb grupo, etc.
    if (isset($_SESSION['nombre'])) {
        //cargamos en las variables el nombre
        $userName = $_SESSION['nombre'];
        //y el grupo del usuario
        $userGroup = $_SESSION['nb_grupo'];
    }

    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>