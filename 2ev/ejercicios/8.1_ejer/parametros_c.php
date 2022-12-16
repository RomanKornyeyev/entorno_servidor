<?php 

    session_name("manoloFramework");
    session_start();

    $bgColor = "#ffffff";
    $fontColor = "#000000";
    $nombre = "anónimo";

    // === COOKIES ===
    $bgColor=isset($_SESSION["bgColor"])?$_SESSION["bgColor"]:$bgColor;
    $fontColor=isset($_SESSION["fontColor"])?$_SESSION["fontColor"]:$fontColor;
    $nombre=isset($_SESSION["nombre"])?$_SESSION["nombre"]:$nombre;

?>