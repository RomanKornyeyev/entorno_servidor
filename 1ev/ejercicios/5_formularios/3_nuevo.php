<?php 

    $temazo="";
    $hora=date("h");
    $min=date("i");
    $opcionesMinuto= [0,15,30,45];

    $mayores = array_filter($opcionesMinuto, function($m){
        global $min;
        return $m > $min;
    });

    if(empty($mayores)){
        $min = 0;
        $hora++;
    }else{
        $min = array_shift($mayores);
    }

    $errores = [];

    //1. Ver si el user envía la info
    if(isset($_POST['enviar'])){
        if(isset($_POST['temazo']) && $_POST['temazo'] != "")$temazo = $_POST['temazo'];
        else $errores['temazo'] = 'No puede estar vacío';

        if(isset($_POST['hora']) && $_POST['hora'] != "")$hora = $_POST['hora'];
        else $errores['hora'] = 'No puede estar vacío';

        if(isset($_POST['min']) && $_POST['min'] != "") $min = $_POST['min'];
        else $errores['min'] = 'No puede estar vacío';

        //2. Si no hay errores
        if(count($errores) == 0){
            //guardo
            file_put_contents(
                "temazos.csv",
                "$temazo;$hora;$min\n",
                FILE_APPEND
            );
            //redirect
            header("Location: 3.1_listado.php");
            exit();
        }
    }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

        .error{
            color: red;
            font-size: 12px;
            margin-bottom:10px;
        }
        .error p{
            margin:0;
        }
    </style>
</head>
<body>
    <h1>Never Ending Party</h1>
    <form action="" method="post">
        Temazo: <input name="temazo" type="text" placeholder="Temazo" value="<?=$temazo?>"><br>
        <?php

            if(isset($errores['temazo'])){
                echo "<div class='error'>";
                echo "<p>".$errores['temazo']."</p>";
                echo "</div>";
            }

        ?>
        Hora: <input type="number" name="hora" min="0" max="23" size="1" placeholder="Hora" value="<?=$hora?>">
        Minuto:
        <select name="min" id="">
            <?php 
                array_walk($opcionesMinuto, function($op, $key, $d){
                    $sel = ($op==$d)?"selected":""; //$d = $min (argumento extra)
                    echo "<option value='$op' $sel>$op</option>";
                }, $min);
            ?>
        </select>
        <?php

            if(isset($errores['hora'])){
                echo "<div class='error'>";
                echo "<p>".$errores['hora']."</p>";
                echo "</div>";
            }

            if(isset($errores['min'])){
                echo "<div class='error'>";
                echo "<p>".$errores['min']."</p>";
                echo "</div>";
            }

        ?>
        <br>
        <input type="submit" name="enviar" value="Enviar">
        <?php if ($error) { ?>
            <p>Eres un poco manazas, rellena el campo</p>
        <?php } ?>
    </form>
</body>
</html>