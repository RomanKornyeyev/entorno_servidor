<?php
function directory(){
    // $cadena = [97, ];

    // for($i = 97; $i < 123; $i++){
    //     for ($j=97; $j[$i] < 123; $j++) { 
    //         for ($k=97; $k[$i][$j] < 123; $k++) { 
    //             for ($l=97; $l[$i][$j][$k] < 123; $l++) { 

    //                 if(password_hash($cadena, '$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72')){
    //                     echo 
    //                 }
    //             }
    //         }
    //     }
    // }

    // $cadena = 0;

    // for($i = 97; $i < 123; $i++){
    //     for ($j=97; $j < 123; $j++) { 
    //         for ($k=97; $k < 123; $k++) { 
    //             for ($l=97; $l < 123; $l++) { 
    //                 $cadena = "".to_char($i).to_char($j).to_char($k).to_char($l);
    //                 if(password_hash($cadena, '$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72')){
    //                     echo "GOT IT";
    //                 }
    //             }
    //         }
    //     }
    // }


    //método de javi

    $letras = ["a", "a", "a", "a"];

    foreach ($letras as $letra) {
        for ($i=0; $i < 35; $i++) { 
            if(password_hash($letras[0].$letras[1].$letras[2].$letras[3], PASSWORD_DEFAULT) == '$2y$10$0GNiidCkeO/VBBHPH0DP6e5tgz6l/FIOxs1RcFloJrXuTYmmAsW72'){
                echo "correcto";
            }else{
                $letra++;
            }

        }
    }
}
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