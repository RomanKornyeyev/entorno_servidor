<?php
 
$arrayReemplazo = [1=>20, 3=>7, 4=>13];
 
$arrays = [
  $array1 = [1,2,13,4,15,6,7,18,9],
  $array2 = [1,12,13,14,5,6,7,18,19],
  $arrayFusionada = array_replace(array_intersect($array1,$array2), $arrayReemplazo)
];
 
$busqueda = array_search(13, $arrayFusionada); //devolvería el 4 (el índice)
 
//Función para imprimir arrays
function imprimirArray($arr){
 for ($i=0;$i<count($arr);$i++) {
    echo "<div class='lane'>";
    for ($j=0;$j<count($arr[$i]);$j++){
       echo " " . $arr[$i][$j];
    }
    echo "</div>";
 }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/styles-arrays.css">
    <!-- JS -->
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/scrollreveal.js" defer=""></script>
    <title>CRUM</title>
</head>
<body>
    <main class="container">
        <div class="central">
        <h1 class="title">CRUM</h1>
            <?php
                imprimirArray($arrays);
                echo "<div class='lane'> ¿En qué índice está el 13? - En el índice " . $busqueda . "</div>";
            ?>
        </div>
    </main>
</body>
</html>