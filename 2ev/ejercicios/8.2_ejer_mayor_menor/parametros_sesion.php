<?php 

    session_name("ejer_8_2");
    session_start();
    print_r($_SESSION);

    $intentos = 3;
    $acertado = false;

    $random=isset($_SESSION["random"])?$_SESSION["random"]:random_int(0,10);
    $intentos=isset($_SESSION["intentos"])?$_SESSION["intentos"]:3;
    $acertado=isset($_SESSION["acertado"])?$_SESSION["acertado"]:false;
    
?>