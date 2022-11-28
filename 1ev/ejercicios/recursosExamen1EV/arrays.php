<?php

    // === ARRAYS 1 DIMENSIÓN ===
    $usuarios = [
        "1234",
        "admin",
        "jeje"
    ];
    //es lo mismo, cambiando índices
    $usuarios = [
        "jorge" => "1234",
        "amparo" => "admin",
        "mary" => "jeje"
    ];




    // === ARRAYS BIDIMENSIONALES ===
    $personas = [
        ["Jorge", 1],
        ["Bea", 0],
        ["Paco", 1],
        ["Amparo", 0],
    ];
    $personas = [
        'cero' => ["Jorge", 1],
        'uno' => ["Bea", 0],
        'dos' => ["Paco", 1],
        'tres' => ["Amparo", 0],
    ];
    $personas = [
        'cero' => array("Jorge", 1),
        'uno' => array("Bea", 0),
        'dos' => array("Paco", 1),
        'tres' => array("Amparo", 0),
    ];
    print_r($personas);

?>