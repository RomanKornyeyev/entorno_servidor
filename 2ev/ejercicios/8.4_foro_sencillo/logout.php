<?php

    session_name("LoginForoSencillo");
    session_start();
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
    }
    session_destroy();

    header('Location: login.php');
    die();

?>