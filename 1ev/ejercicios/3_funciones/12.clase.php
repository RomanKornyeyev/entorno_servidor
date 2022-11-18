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

    //version ifs
    $a = mt_rand(1,10);
    $b = mt_rand(1,10);
    $c = mt_rand(1,10);

    function printearHs2($a, $b, $c){
        if($a > $b){
            //a es mayor que b ¿como es respecto a c?
            if($a > $c){
                $mayor = $a;
                if($b > $c){
                    $mediano = $b;
                    $menor = $c;
                }else{
                    $mediano = $c;
                    $menor = $b;
                }
            }else{
                //c es mayor que a y que b
                $mayor = $c;
    
                $mediano = $a;
                $menor = $b;
            }
        }else{
            // b es más grande que a
            if($b > $c){
                $mayor = $b;
                if($a > $c){
                    $mediano = $a;
                    $menor = $c;
                }else{
                    $mediano = $c;
                    $menor = $a;
                }
            }else{
                $mayor = $c;
    
                $mediano = $b;
                $menor = $a;
            }
        }

        echo "<h1 class='central'>".$mayor."</h1>";
        echo "<h2 class='central central--md'>".$mediano."</h2>";
        echo "<h3 class='central central--sm'>".$menor."</h3>";
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
        $num=0;//si se rompe, quitar el = 0
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

    //ejer 5
    function printearTabla(){
        foreach ($_GET as $key => $value) {
            echo "<tr><td>$key</td><td>$value</td></tr>";
        }
    }

    //ejer 6
    function sumarNums($ini, $fin){
        $resultado = $ini;
        for ($i=$ini; $i < $fin; $i++) { 
            $resultado += $i+1;
        }

        echo "Resultado: $resultado, ";
    }

    //ejer 7
    function juntar($delim, ...$cadena){
        echo implode($delim, $cadena);
    }
    //variante
    function concatenar(string $separador, string ...$cadenas7): string
    {
        $salida = "";
        foreach ($cadenas7 as $key7 => $cadena7) {
            $salida .= (($key7 == 0)?"":$separador).$cadena7;
        }
        return $salida;
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
                1. Crea una página web que genere 3 números aleatorios "mt_rand()", 
                con sentencias condicionales los asigna a tres variables: mayor, mediano y pequeño. 
                Después los mostrará en h1, h2 y h3 respectivamente.
            </p>
        </header>
        <div class="container__main">
            <?php echo printearHs2($a, $b, $c); ?>
        </div>

        <!-- ej 2 -->
        <header class="cabecera">
            <p class="title-description">
                2. Crea una página web que recorra una variable de tipo cadena accediendo a cada letra y escriba cada una en un h4.
                Usa for.
            </p>
        </header>
        <div class="container__main">
            <?php echo printear($cadena); ?>
        </div>

        <!-- ej 3 -->
        <header class="cabecera">
            <p class="title-description">
                3. Crea una web similar a la anterior pero que pare al finalizar la cadena o al encontrar el carácter 'a',
                tanto minúscula como mayúscula. Usa While
            </p>
        </header>
        <div class="container__main">
            <?php echo printearFinA($cadena); ?>
        </div>

        <!-- ej 4 -->
        <header class="cabecera">
            <p class="title-description">
                4. Crea una página web que escriba span con números aleatorios entre 0 y 100, el proceso parará cuando
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
                5. Crea una función que escriba lo parámetros recibidos por la URL en una tabla.
            </p>
        </header>
        <div class="container__main">
            <div class="central">
                <table>
                    <thead>
                        <tr>
                            <td><strong>Tabla</strong></td>
                            <td><strong>Valor</strong></td>
                        </tr>
                    </thead>
                    <tbody>
                        <?= printearTabla() ?>
                    </tbody>
                </table>
            </div>            
        </div>


        <!-- ej 6 -->
        <header class="cabecera">
            <p class="title-description">
                6. [15 min] Crea una función que sume todos los números entre dos parámetros dados: inicio y fin.
                PRUEBAS: Escribe una web que llame a la función 10 veces con números aleatorios entre 0 y 20.
            </p>
        </header>
        <div class="container__main">
            <div class="central">
                <?php for ($i=0; $i < 10; $i++) { 
                    sumarNums(mt_rand(0, 20), mt_rand(0, 20));
                }?>
            </div>            
        </div>


        <!-- ej 7 -->
        <header class="cabecera">
            <p class="title-description">
            7. [15 min] Crea una función que concatene todas las cadenas pasadas como parámetro utilizando el primer parámetro como seprador.
            PRUEBAS: Escribe una web que llame a la función 3 veces con cadenas.
            </p>
        </header>
        <div class="container__main">
            <div class="central">
               <?= juntar(" ", "hola","qtal?"); ?>
               <br>
               <?= juntar(" ", "Hola","Mundo!"); ?>
               <br>
               <?= juntar(" ", "JI","JI","JI","JA"); ?>
               <br>
               <?= concatenar(", ", "Variante", "2", "XD"); ?>
            </div>            
        </div>


        
    </div>
</body>
</html>