<?php 

    //ejer 1
    $nums = [];
    for ($i=0; $i < 3; $i++){array_push($nums, mt_rand(1, 100));} 
    rsort($nums);
    function printearHs($nums){
        echo "<h1 class='central'>".$nums[0]."</h1>";
        echo "<h2 class='central central--md'>".$nums[1]."</h2>";
        echo "<h3 class='central central--sm'>".$nums[2]."</h3>";
    }
    

    //ejer 2
    $cadena = "hola";
    function printear($cadena){
        for($i = 0; $i < strlen($cadena); $i++){
            echo "<h4 class='central'>".substr($cadena, $i, 1)."</h4>";
        }
    }

    //ejer 3
    function printearFinA($cadena){
        $i = 0;
        while(strnatcasecmp("a", substr($cadena, $i, 1)) && $i<strlen($cadena)){
            echo "<h4 class='central'>".substr($cadena, $i, 1)."</h4>";
            $i++;
        }
    }

    //ejer 4
    function printearNums(){
        $num;
        $primo = false;
        while($num != 17 && !$primo){
            $num = mt_rand(1,100);
            echo $num.", ";
            $primo = esPrimo($num);
        }
    }
    function esPrimo($numero){
        for ($i = 2; $i < $numero; $i++) {
            if (($numero % $i) == 0) {
                // No es primo 
                return false;
            }
        }
        // Es primo 
        return true;
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
        <!-- ej 1 -->
        <header class="cabecera">
            <p class="title-description">
                Crea una página web que genere 3 números aleatorios "mt_rand()", 
                con sentencias condicionales los asigna a tres variables: mayor, mediano y pequeño. 
                Después los mostrará en h1, h2 y h3 respectivamente.
            </p>
        </header>
        <div class="container__main">
            <?php echo printearHs($nums); ?>
        </div>

        <!-- ej 2 -->
        <header class="cabecera">
            <p class="title-description">
                Crea una página web que recorra una variable de tipo cadena accediendo a cada letra y escriba cada una en un h4.
                Usa for.
            </p>
        </header>
        <div class="container__main">
            <?php echo printear($cadena); ?>
        </div>

        <!-- ej 3 -->
        <header class="cabecera">
            <p class="title-description">
                Crea una web similar a la anterior pero que pare al finalizar la cadena o al encontrar el carácter 'a',
                tanto minúscula como mayúscula. Usa While
            </p>
        </header>
        <div class="container__main">
            <?php echo printearFinA($cadena); ?>
        </div>

        <!-- ej 4 -->
        <header class="cabecera">
            <p class="title-description">
                Crea una página web que escriba span con números aleatorios entre 0 y 100, el proceso parará cuando
                el número acabe en 17 o sea primo.
            </p>
        </header>
        <div class="container__main">
            <span class="central">
                <?php echo printearNums(); ?>
            </span>            
        </div>

        
        <!-- ej 5 -->
        <header class="cabecera">
            <p class="title-description">
                Crea una función que escriba lo parámetros recibidos por la URL en una tabla.
            </p>
        </header>
        <div class="container__main">
            <span class="central">
                
            </span>            
        </div>
    </div>
</body>
</html>