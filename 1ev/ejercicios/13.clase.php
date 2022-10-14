<?php

    require('funciones_php/funcionesGenerales.php');

    //ejer 8
    function analizaParametros(...$params)
    {
        //declaramos array vacío
        $listaTipos = [];
        //por cada uno de los PARAMETROS RECIBIDOS, hacemos estas comprobaciones
        foreach ($params as $value) {
            $tipo = gettype($value); //sacamos el tipo del elemento del array
            if (array_key_exists($tipo, $listaTipos)){ //si el tipo existe en las keys de la lista vacía que hemos declarado
                $listaTipos[$tipo]++;   //le sumamos uno
            }else{ //si no existe
                $listaTipos[$tipo] = 1; //lo inicializamos con esa key como 1
            }
        }

        print_r($listaTipos);
    }

    //ejer 9
    $var1 = "hola";
    $var2 = 2;
    function intercambiarValores($var1, $var2)
    {
        $aux = $var1;
        $var1 = $var2;
        $var2 = $aux;
        
        return "valores intercambiados: $var1, $var2";
    }

    //ejer 10
    function aleatorio($longitud = 10, $maximo = 10, $minimo=0){
        $lista = [];
        for ($i=0; $i < $longitud; $i++) { 
            array_push($lista, mt_rand($minimo, $maximo));
        }
        imprimirArrayEach($lista);
    }

    //ejer 11
    function tipos(...$lista11){
        $listaAux = $lista11;
        
        foreach ($lista11 as $key => $value) {
            $contAux = 2;
            if(gettype($value) == "integer"){
                $listaAux[$key] = pow($value, $contAux);
                $contAux++;
            }else if(gettype($value) == "double"){
                $listaAux[$key] = -($value); //no hace falta un if
            }else if(gettype($value) == "string"){
                $palabra = "";
                for($i = 0; $i < strlen($value); $i++){
                    $letra = $value[$i];
                    (ctype_upper($letra))? $letra=strtolower($letra) : $letra=strtoupper($letra);
                    $palabra = $palabra.$letra;
                }
                $listaAux[$key] = $palabra;
            }
        }

        print_r($listaAux);
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
    <link rel="stylesheet" href="./css/11.clase.css">
    <title>12 Clase</title>
</head>
<body>
    <div class="container limit-width-120">
        <!-- ej 8 -->
        <header class="cabecera">
            <p class="title-description">
                8. [25 min] Crea una función que genere un array asociativo que contenga información de los parámetros.
                La función irá descubriendo los tipos.
                <br>
                Funciones: gettype, array_key_exists o in_array o isset
            </p>
        </header>
        <div class="container__main">
            <div class="central">
                <?= analizaParametros(1, "hola", [1, 2], "hola", 1.2, 2, 3.2, 4, 5, false); ?>
            </div>            
        </div>


        <!-- ej 9 -->
        <header class="cabecera">
            <p class="title-description">
                9. [10 min]Crea una función que reciba dos variables cualesquiera e intercambie su valor. Las variables tendrá ese valor fuera de la función.
                PRUEBA: Crea una web en la que se muestre cómo se comporta esta función con variables de distinto tipo.
            </p>
        </header>
        <div class="container__main">
            <div class="central">
                <?= intercambiarValores($var1, $var2) ?>
            </div>            
        </div>


        <!-- ej 10 -->
        <header class="cabecera">
            <p class="title-description">                
                10. [10 min] Crea una función que genera un array aleatorio con parámetros variables Por defecto generará 10 valores entre 0 y 10
                Puedes especificar el número de valores como primer parámetro, Puedes especificar el valor máximo como segundo parámetro o Puedes especificar
                número de valores, máximo y mínimo.
                <br><br>
                aleatorio(); // [n,n,n,n,n,n,n,n,n,n]
                <br>
                aleatorio(5) // [n,n,n,n,n]
                <br>
                aleatorio(5,50)
                <br>
                aleatorio(5,50,-50)
            </p>
        </header>
        <div class="container__main">
            <div class="central">
                <?= aleatorio(); ?>
                <br>
                <?= aleatorio(5); ?>
                <br>
                <?= aleatorio(5, 50); ?>
                <br>
                <?= aleatorio(5, 50, -50); ?>
            </div>            
        </div>


        <!-- ej 11 -->
        <header class="cabecera">
            <p class="title-description">                
                11. 
            </p>
        </header>
        <div class="container__main">
            <div class="central">
                <?= tipos(2, 3, 4, 2.3, -2.4, "hOlA", [1, 2]); ?>                
            </div>            
        </div>
    </div>
</body>
</html>