<?php

    require('./Coche.php');
    require('./CocheConRemolque.php');
    require('./CocheGrua.php');

    $coche1 = new Coche("53453", "BMW", 120);
    $remolque1 = new CocheConRemolque("12345", "Audi", 100, 30);
    $remolque2 = new CocheConRemolque("13246", "Toyota", 120, 40);
    $cocheGrua1 = new CocheGrua("13246", "Toyota", 120, $coche1);

    echo "<h2>Coches:</h2>";
    print $coche1->mostrar(); echo "<br>";
    echo "<h2>Coches con remolque:</h2>";
    print $remolque1->mostrar(); echo "<br>";
    print $remolque2->mostrar(); echo "<br>";
    echo "<h2>Coches Grúa:</h2>";
    print $cocheGrua1->mostrar(); echo "<br>";


    echo "<h2>Cargamos coche remolque 1:</h2>";
    $cocheGrua1->cargar($remolque1);
    print $cocheGrua1->mostrar(); echo "<br>";


    echo "<h2>DEScargamos coche:</h2>";
    $cocheGrua1->descargar($remolque1);
    print $cocheGrua1->mostrar(); echo "<br>";

?>