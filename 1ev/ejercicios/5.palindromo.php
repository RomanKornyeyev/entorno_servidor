<?php

    require('./funciones_php/funciones_5.php');

    $palabra = "";
    $vocales = 0;
    $consonantes = 0;
    $palindromo = false;
    $envio = false;
    $error = false;
    
    if(isset($_GET['palabra'])){
        $palabra = $_GET['palabra'];
        $envio = true;
        $vocales = contarVocales($palabra);
        $consonantes = contarConsonantes($palabra);
        $palindromo = esPalindromo($palabra);
        if($palabra == ""){
            $error = true;
        }
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

            <?php if ($envio) { ?>
                <?php if ($error) { ?>
                    <h3 class="error-message">ERROR: introduce una palabra</h3>
                <?php }else{ ?>  
                <ul class="lista">
                    <li class="lista__li">Número de consonantes: <strong><?= $consonantes ?></strong></li>
                    <li class="lista__li">Número de vocales: <strong><?= $vocales ?></strong></li>
                    <li class="lista__li">¿Es palíndromo? <strong><?= ($palindromo)?'sí':'no' ?></strong></li>
                </ul>
                <?php } ?>
            <?php } ?>
            
        </div>
    </div>
</body>
</html>