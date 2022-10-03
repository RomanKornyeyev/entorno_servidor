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
        echo "<div class='lane up-1250'>".$var."</div>";
    }
    function imprimirArray($arr){
        for ($i = 0; $i < count($arr); $i++) {
            echo "<div class='lane up-1250'>".$arr[$i]."</div>";
        }
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
        echo "<div class='lane up-1250'>".$valor[0]."</div>";
    }
    //hacemos una función para llamarla en HTML
    function walkearArray($array){
        array_walk($array, "recorrerArray");
    }
    
    
   
    

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/generales.css">
    <link rel="stylesheet" href="./css/10.clase.css">
    <!-- JS -->
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/sr-10.1.clase.js" defer=""></script>
    <title>Clase</title>
</head>
<body>
    <div class="container">
        <form action="" method="post">
            <button class="button" type="submit" name="10.1">Ejercicio 10.1</button>
        </form>
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
                <h3 class="sub-title up-1250">Hombres:</h3>
                <?= walkearArray($listaHombres) ?>
                <h3 class="sub-title up-1250">Mujeres:</h3>
                <?= walkearArray($listaMujeres) ?>
            </div>
        </div>
    </div>
</body>
</html>