<?php
    
    // === LECTURA DE COOKIES ===
    include("parametros_cookies.php");

    // === FORMULARIO ===
    if (isset($_POST['submit'])) {
        if(isset($_POST['bgColor'])){
            $bgColor = $_POST['bgColor'];
            $_SESSION["bgColor"] = $bgColor;
        }

        if(isset($_POST['fontColor'])){
            $fontColor = $_POST['fontColor'];
            $_SESSION["fontColor"] = $fontColor;
        }

        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $_SESSION["nombre"] = $nombre;
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
    <link rel="stylesheet" href="styles.css">
    <style>
        *{
            background-color: <?php echo $bgColor ?>;
            color: <?php echo $fontColor ?>;
        }
    </style>
</head>
<body>
    <?php include('menu.php'); ?>
    <form action="config.php" method="post">
        <div>
            <input type="color" id="bgColor" name="bgColor" value="<?php echo $bgColor ?>">
            <label for="bgColor">BG COLOR</label>
        </div>
        <div>
            <input type="color" id="fontColor" name="fontColor" value="<?php echo $fontColor ?>">
            <label for="fontColor">FONT COLOR</label>
        </div>
        <div>
            <label for="fontColor">NOMBRE</label>
            <input type="text" id="nombre" name="nombre" placeholder="nombre" value="<?php echo $nombre ?>">
        </div>
        <input type="submit" name="submit" value="ENVIAR">
    </form>
   
</body>
</html>