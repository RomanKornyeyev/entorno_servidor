<?php

    require('./Coche.php');
    require('./CocheConRemolque.php');
    require('./CocheGrua.php');

    // $coche1 = new Coche("53453", "BMW", 120);
    // $remolque1 = new CocheConRemolque("12345", "Audi", 100, 30);
    // $remolque2 = new CocheConRemolque("13246", "Toyota", 120, 40);
    // $cocheGrua1 = new CocheGrua("13246", "Toyota", 120, $coche1);

    // echo "<h2>Coches:</h2>";
    // print $coche1->mostrar(); echo "<br>";
    // echo "<h2>Coches con remolque:</h2>";
    // print $remolque1->mostrar(); echo "<br>";
    // print $remolque2->mostrar(); echo "<br>";
    // echo "<h2>Coches Grúa:</h2>";
    // print $cocheGrua1->mostrar(); echo "<br>";


    // echo "<h2>Cargamos coche remolque 1:</h2>";
    // $cocheGrua1->cargar($remolque1);
    // print $cocheGrua1->mostrar(); echo "<br>";


    // echo "<h2>DEScargamos coche:</h2>";
    // $cocheGrua1->descargar($remolque1);
    // print $cocheGrua1->mostrar(); echo "<br>";

    $listaCoches = [];
    $coche1 = new Coche("1000", "BMW", 30);
    $coche2 = new CocheConRemolque("1001", "Audi", 30, 200);
    $coche3 = new Coche("1002", "Porche", 40); //el porche a cargar
    $coche4 = new Coche("1003", "Renault", 20);
    $grua = new CocheGrua("1111", "XD", 200);
    $gruaVacia = new CocheGrua("1112", "XD", 200);

    $grua->cargar($coche3);

    array_push($listaCoches, $coche1, $coche2, $coche4, $grua, $gruaVacia);

    // array_walk($listaCoches, function($value, $key){
    //     print "<div class='caja'>".$value->mostrar()."</div>";
    // });

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coches</title>
    <style>
        *, *::before, *::after{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }
        .container{
            display: flex;
            justify-content: center;
            align-items: center;
            flex-flow: column;
            gap: 15px;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            min-height: 100vh;
        }
        .caja{
            width: 100%;
            padding: 15px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
            array_walk($listaCoches, function($value, $key){
                print "<div class='caja'>".$value->mostrar()."</div>";
            });
        ?>
    </div>
</body>
</html>