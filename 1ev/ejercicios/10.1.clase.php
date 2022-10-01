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
        if($var[1] == 1){
            $resultado = "Señor";
        }else{
            $resultado = "Señora";
        }

        return $resultado." ".$var[0];
    }
    function imprimirArray($arr){
        for ($i = 0; $i < count($arr); $i++) {
            echo "<div class='lane'>".$arr[$i]."</div>";
        }
    }

    $lista = array_map("saludo", $personas);



    //=== 1.2 ====
    //Utiliza la función map_reduce para calcular la cantidad de calorías de la comida anterior.
    $comida = [
        0 => ["Banana", 3, 56],
        1 => ["Chuleta", 1, 256],
        2 => ["Pan", 1, 90]
    ];

    function myfunction($v1,$v2){
        return $v1+$v2;
    }
    
    
    print_r(array_reduce($a,"myfunction",$comida[2]));
    
    
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/generales.css">
    <!-- JS -->
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/sr-2.arrays.js" defer=""></script>
    <title>Clase 1</title>
</head>
<body>
    <div class="container">
        <div class="central">
            <?= imprimirArray($lista) ?>
        </div>
    </div>
</body>
</html>