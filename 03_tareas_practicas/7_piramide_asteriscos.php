<?php
    $num = 0;

    function crearPiramide($filas) {
        $cadena = null;
        for ($i = 1; $i <= $filas; $i++) {
            for ($j = $i; $j <= $i; $j++) {
                $cadena .= "*";
            }
            echo $cadena."<br />";
        }
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hola mundo de php</title>
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
            width: 100vw;
            height: 100vh;
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-flow: column;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php crearPiramide(7) ?>
    </div>
</body>
</html>