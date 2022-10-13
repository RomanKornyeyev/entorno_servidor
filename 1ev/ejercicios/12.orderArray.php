<?php 
/* Crea una página web que genere 3 números aleatorios "mt_rand()",
con sentencias condicionales los asigna a tres variables: mayor, mediano y pequeño. 
Después los mostrará en h1, h2 y h3 respectivamente. */

    $num1 = mt_rand(1,100);
    $num2 = mt_rand(1,100);
    $num3 = mt_rand(1,100);

    if($num1 > $num2){
        
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
        <header class="cabecera">
            <h2 class="title">Funciones: random</h2>
            <br>
            <p class="title-description">
            Crea una página web que genere 3 números aleatorios "mt_rand()",
            con sentencias condicionales los asigna a tres variables: mayor, mediano y pequeño. 
            Después los mostrará en h1, h2 y h3 respectivamente.
            </p>
        </header>

        <div class="container__main">
            <p class="central">
                
            </p>
        </div>
    </div>
</body>
</html>