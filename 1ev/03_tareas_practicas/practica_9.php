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
    <title>Hola mundo de php</title>

    <!-- <meta http-equiv="refresh" content=".5"> -->

    <style>
        *{
            margin:0;
            padding:0;
            box-sizing: border-box;
            font-family: arial;
        }
        html{
            font-size: 62.5%;
        }
        body{
            font-size: 1.6rem;
            background-color: #eaeaea;
        }
		
		.container{
            margin: 0 auto;
            width: 120rem;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 5rem;
            flex-flow: column;
        }
        .titulo{
            font-size: 3rem;
            line-height: 4rem;
        }
        form{
            width: 50rem;
            display: flex;
            flex-flow: row wrap;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            border: 1px solid black;
        }
        input{
            height: 3rem;
        }
        .label{
            width: 20%;
            line-height: 3rem;
        }
        .input-text{
            width: 80%;
        }
        .button{
            width: 100%;
            height: 3rem;
            margin-left: 2rem;
            border: none;
            background-color: grey;
            color: #000;
        }
        .button:hover{
            background-color: #000;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="titulo" >Analizador de palabras</h1>
        <form action="" method="get">
            <label class="label" for="palabra">Palabra: </label><input class="input-text" type="text" name="palabra" id="" value="<?= $palabra ?>">
            <input class="button" type="submit" value="Comprobar">
        </form>
        <?php if ($error) { ?>
            <h3>Eres un poco manazas</h3>
        <?php } ?>

        <ul class="lista">
            <li>Número de vocales: <strong><?= contarVocales($palabra) ?></strong></li>
            <li>Número de consonantes: <strong><?= contarConsonantes($palabra) ?></strong></li>
            <li>Palíndromo: <strong><?php echo esPalindromo($palabra)?'sí':'no' ?></strong></li>
        </ul>
    </div>
</body>
</html>