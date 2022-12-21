<?php 

    session_start();

    if( !isset($_SESSION['user']) ){
        header('Location: login.php?error=Área privada&url='.$_SERVER["REQUEST_URI"]);
        exit;
    }

?>