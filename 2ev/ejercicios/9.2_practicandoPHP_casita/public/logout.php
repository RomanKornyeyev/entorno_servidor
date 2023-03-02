<?php

    //acceso a BD, sesión, etc. (tiene que ir en TODAS)
    require("../src/init.php");

    //Destruimos la sesión
    session_destroy();

    //Destruimos las cookies (necesario para el recuerdame)
    setcookie("PHPSESSID", null, time()-1);
    setcookie("recuerdame", null, time()-1);
    
    //redirect a página anterior
    header('Location: '.$paginaAnterior);
    die();

?>