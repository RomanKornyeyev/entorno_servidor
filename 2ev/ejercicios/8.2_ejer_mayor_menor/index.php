<?php
    
    // === LECTURA DE SESIÓN ===
    include("parametros_sesion.php");

    // === FORMULARIO ===
    if (isset($_POST['submit'])) {
        if($intentos > 0) $intentos--;
        if(isset($_POST['respuesta'])){
            $respuesta = $_POST['respuesta'];
            $_SESSION["respuesta"] = $respuesta;
            if ($respuesta == $random) {
                $acertado = true;
            }
        }
    }

    //guardado (siempre abajo)
    $_SESSION["intentos"]=$intentos;
    $_SESSION["random"]=$random;
    $_SESSION["acertado"]=$acertado;

    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "<br>intentos restantes: $intentos <br>"; ?>
    <?php if ($intentos > 0) { ?>
    <form action="index.php" method="post">
        <div>
            <label for="respuesta">RESPUESTA</label><br>
            <input type="number" id="respuesta" name="respuesta" placeholder="respuesta" value="<?php echo $respuesta ?>">
        </div>
        <input type="submit" name="submit" value="ENVIAR">
    </form>
    <?php } ?>
    <?php 
        //echo $random;
        //echo $respuesta;
        if($acertado) echo "ACERTASTE!!";
    ?>
</body>
</html>