<?php
    $nombre = "Román";
    $r = 0;
    $error = false;
    $pi = 3.14;
    /* M_PI es pi */
    // $_GET Información de la cabereca
    if(isset($_GET['radio'])){
        $r = $_GET['radio'];
        if($r == ""){
            $r = 0;
            $error = true;
        }
    }else{
        $r = 0;
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
            justify-content: center;
            align-items: center;
            gap: 2rem;
            flex-flow: column;
        }
        .circulo{
            border: 1px solid black;
            border-radius: 50%;
        }
    </style>
</head>
<body>
    <div class="container">
        <p>Buenas <b><?php echo $nombre ?></b></p>
        <div>
            <?php if ($error) { ?>
                <h3>Eres un poco manazas</h3>
            <?php } ?>
            <form action="" method="get">
                <label for="radio">Radio: </label><input type="number" step="0.1" name="radio" id="" value="<?= $r ?>"><br>
                <input type="submit" value="Calcular">
            </form>
        </div>
        <p>Area: <?=$r*$r*M_PI?></p>
        <p>Longitud: <?=2*$r*M_PI?></p>
    </div>
</body>
</html>