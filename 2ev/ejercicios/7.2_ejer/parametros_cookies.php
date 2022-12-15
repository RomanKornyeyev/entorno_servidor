<?php 

    $bgColor = "#ffffff";
    $fontColor = "#000000";
    $nombre = "anónimo";

    // === COOKIES ===
    if (isset($_COOKIE['bgColor'])) {
        $bgColor = $_COOKIE['bgColor'];
    }
    if (isset($_COOKIE['fontColor'])) {
        $fontColor = $_COOKIE['fontColor'];
    }
    if (isset($_COOKIE['nombre'])) {
        $nombre = $_COOKIE['nombre'];
    }

?>