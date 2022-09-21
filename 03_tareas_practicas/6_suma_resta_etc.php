<?php
    $num1 = 2;
    $num2 = 5;
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
            line-height: 3rem;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <p>
            <b>Suma:</b> <?php echo $num1." + ".$num2." = ".$num1+$num2 ?>
            <br>
            <b>Resta:</b> <?php echo $num1." - ".$num2." = ".$num1-$num2 ?>
            <br>
            <b>Multiplicación:</b> <?php echo $num1." * ".$num2." = ".$num1*$num2 ?>
            <br>
            <b>División:</b> <?php echo $num1." + ".$num2." = ".$num1/$num2 ?>
        </p>
    </div>
</body>
</html>