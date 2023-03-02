<?php 

    //iniciamos la sesión
    session_start();

    //datos de la BD
    require("config.php");
    //librería de PDO
    require("DWESBaseDatos.php");
    //mailer (vendor + mailer)
    require("../vendor/autoload.php");
    require("Mailer.php");

    //inicializamos BD
    $db = DWESBaseDatos::obtenerInstancia();
    $db->inicializa(
        $CONFIG['db_name'],
        $CONFIG['db_user'],
        $CONFIG['db_pass']
    );

    //---estos requires tienen que ir debajo de session_start, ya que van con sesiones---
    //para los redirects a páginas anteriores al hacer login
    require("paginaAnterior.php");
    //para el token de recuerdame
    require("recuerdame.php");

    //username
    $username = (isset($_SESSION['nombre']))? $_SESSION['nombre'] : "anonimo";

    //función para evitar crossite scripting
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

?>