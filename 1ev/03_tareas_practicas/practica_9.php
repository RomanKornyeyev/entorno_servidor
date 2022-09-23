<?php
    $num = 0;

    if(isset($_GET['palabra'])){
        $palabra = $_GET['palabra'];
        if($palabra == ""){
            $error = true;
        }
    }else{
        $palabra = false;
    }

    function contarVocales($var){
        $vocales = "aeiouAEIOU";
        $cont = 0;
        for($i=0; $i<strlen($var); $i++){
            for($j=0; $j<strlen($vocales); $j++){
                if($var[$i] == $vocales[$j]){
                    $cont++;
                }
            }
        }

        return $cont;
    }

    function contarConsonantes($var){
        $consonantes = 0;
        $consonantes = strlen($var) - contarVocales($var);
        
        return $consonantes;
    }

    function esPalindromo($var){
        $palindromo = true;

        for($i=0; $i<strlen($var); $i++){
            if($var[strlen($var)-1-$i] != $var[$i]){
                $palindromo = false;
            }
        }

        return $palindromo;
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estilo_9.css">
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/scrollreveal.js" defer=""></script>
    <title>Analizador</title>
</head>
<body>
    <div class="container">
        <div class="central">
            <h1 class="titulo" >Analizador de palabras</h1>
            <form class="formulario" action="" method="get">
                <ul class="form-ul">
                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="palabra" id="" value="<?= $palabra ?>" placeholder="Introduce una palabra">
                        <label class="label-lane" for="palabra"></label> 
                    </li>
                </ul>

                <button class="button" type="submit">ANALIZAR</button>
            </form>
            <?php if ($error) { ?>
                <h3 class="error-message">ERROR: introduce una palabra</h3>
            <?php }else{ ?>

            <ul class="lista">
                <li class="lista__li">Número de consonantes: <strong><?= contarConsonantes($palabra) ?></strong></li>
                <li class="lista__li">Número de vocales: <strong><?= contarVocales($palabra) ?></strong></li>
                <li class="lista__li">¿Es palíndromo? <strong><?php echo esPalindromo($palabra)?'sí':'no' ?></strong></li>
            </ul>
            <?php } ?>
        </div class="central">
    </div>
</body>
</html>