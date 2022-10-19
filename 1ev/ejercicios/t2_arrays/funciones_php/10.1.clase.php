<!-- 
1 Jorge (Profe)
Funciones: array_walk, array_map, array_filter, array_reduce

$personas = [
    [Jorge, 1],
    [Bea, 0],
    [Paco, 1],
    [Amparo, 0],
];

Utiliza alguna de las funciones para generar un array de cadenas indicando el nombre de la persona y cómo tratarle con formalidad. Si el valor entero detrás del nombre es un 1 Hay que poner "Señor <nombre>", si es 0 hay que poner "Señora <nombre>"

$resultado = ["Señor Jorge", "Señora Bea", "Señor Paco", "Señora Amparo"];

--

$comida = [
    0 => ["Banana", 3, 56],
    1 => ["Chuleta", 1, 256],
    2 => ["Pan", 1, 90]
]
    
Utiliza la función map_reduce para calcular la cantidad de calorías de la comida anterior.

--

Con el array de personas anterior, utiliza el array_filter para sacar un listado de Hombre y otro listado de mujeres.
-->
<?php

    //=== 1.1 ====
    $personas = [
        ["Jorge", 1],
        ["Bea", 0],
        ["Paco", 1],
        ["Amparo", 0],
    ];

    function saludo($var){
        $resultado = 0;
        if($var[1] == 1) $resultado = "Señor";
        else $resultado = "Señora";

        return $resultado." ".$var[0];
    }

    $listaSaludo = array_map("saludo", $personas);


    //=== 1.2 ====
    //Utiliza la función array_reduce para calcular la cantidad de calorías de la comida anterior.
    $comida = [
        0 => ["Banana", 3, 56],
        1 => ["Chuleta", 1, 256],
        2 => ["Pan", 1, 90]
    ];

    function calcularCalorias($carry, $item){
        return $carry += ($item[1] * $item[2]);
    }

    $listaCalorias = array_reduce($comida,"calcularCalorias");


    //=== 1.3 ===
    //Con el array de personas anterior, utiliza el array_filter para sacar un listado de Hombre y otro listado de mujeres.
    function hombres($var){ //filtramos hombres
        return ($var[1] == 1);
    };
    function mujeres($var){ //filtramos mujeres
        return !($var[1] == 1);
    };
    //volcamos los resultados en 2 arrays
    $listaHombres = array_filter($personas, "hombres");
    $listaMujeres = array_filter($personas, "mujeres");

    //recorremos el array e imprimimos los valores
    function recorrerArray($valor, $llave){
        echo $valor[0].", ";
    }
    //hacemos una función para llamarla en HTML
    function walkearArray($array){
        array_walk($array, "recorrerArray");
    }
?>