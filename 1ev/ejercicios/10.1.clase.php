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

    //=== FUNCIONES GENERALES ===
    function imprimirVariable($var){
        echo "<div class='lane'>".$var."</div>";
    }
    function imprimirArray($arr){
        for ($i = 0; $i < count($arr); $i++) {
            echo "<div class='lane'>".$arr[$i]."</div>";
        }
    }
    function imprimirMatriz($matr){ //es necesario usar array_walk
        foreach ($matr as $v1) {
            foreach ($v1 as $v2) {
                echo "<div class='lane'>".$v2."</div>";
            }
        }
        // for ($i = 0; $i < count($matr); $i++) {
        //     for ($j=0; $j <= count($matr[$i]); $j++) { 
        //         echo "<div class='lane'>".$matr[$i][$j]."</div>";
        //     }
            
        // }
    }


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

    $lista1 = array_map("saludo", $personas);
    


    //=== 1.2 ====
    //Utiliza la función map_reduce para calcular la cantidad de calorías de la comida anterior.
    $comida = [
        0 => ["Banana", 3, 56],
        1 => ["Chuleta", 1, 256],
        2 => ["Pan", 1, 90]
    ];

    function calcularCalorias($carry, $item){
        return $carry += ($item[1] * $item[2]);
    }
    
    $lista2 = array_reduce($comida,"calcularCalorias");
    

    //=== 1.3 ===
    //Con el array de personas anterior, utiliza el array_filter para sacar un listado de Hombre y otro listado de mujeres.
    function hombres($var){
        return ($var[1] == 1);
    };
    function mujeres($var){
        return !($var[1] == 1);
    };
    
    $listaHombres = array_filter($personas, "hombres");
    $listaMujeres = array_filter($personas, "mujeres");
    print_r(array_filter($personas, "hombres"));

    // Array ( 
    //     [0] => Array ( [0] => Jorge [1] => 1 )
    //     [1] => Array ( [0] => Bea [1] => 0 )
    //     [2] => Array ( [0] => Paco [1] => 1 )
    //     [3] => Array ( [0] => Amparo [1] => 0 ) 
    // );
    // Array (
    //     [1] => Array ( [0] => Bea [1] => 0 )
    //     [3] => Array ( [0] => Amparo [1] => 0 )
    // );
    // Array (
    //     [0] => Array ( [0] => Jorge [1] => 1 )
    //     [2] => Array ( [0] => Paco [1] => 1 )
    // );
   
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/10.1.clase.css">
    <!-- JS -->
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/sr-10.1.clase.js" defer=""></script>
    <title>Clase 1</title>
</head>
<body>
    <div class="container">
        <div class="container__main">
            <div class="central">
                <h2 class="title">array_map</h2>
                <?= imprimirArray($lista1) ?>
            </div>
            <div class="central">
                <h2 class="title">array_reduce</h2>
                <?= imprimirVariable($lista2) ?>
            </div>
            <div class="central">
                <h2 class="title">array_filter</h2>
                <?= imprimirMatriz($listaHombres) ?>
                <?= imprimirMatriz($listaMujeres) ?>
            </div>
        </div>
    </div>
</body>
</html>