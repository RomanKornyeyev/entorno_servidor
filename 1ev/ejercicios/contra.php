<?php

    $letras = ["a", "a", "a", "a"];
    $position = 0;
    $incorrecto = false;
    $cont = 1;

    while (!$correcto) {

        for ($i=97; $i < 123; $i++) { 
            $letras[$position] = chr($i);
            if(password_hash($letras[0].$letras[1].$letras[2].$letras[3], PASSWORD_DEFAULT) == '$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72'){
                echo "correcto";
                $correcto = true;
            }
        }

        if(!$correcto){
            if(ord($letras[$position+$cont]) < 122){
                $letras[$position+$cont] = chr(ord($letras[$position+$cont] + 1));
            }else{
                $cont++;
            }
        }

    }
    

    //método de javi

    // foreach ($letras as $letra) {
    //     for ($i=0; $i < 28; $i++) { 
    //         if(password_hash($letras[0].$letras[1].$letras[2].$letras[3], PASSWORD_DEFAULT) == '$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72'){
    //             echo "correcto";
    //         }else{
    //             ord($letra);
    //             $letra++;
    //             chr($letra);
    //         }

    //     }
    // }

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    <main class="container">


    </main>
</body>
</html>