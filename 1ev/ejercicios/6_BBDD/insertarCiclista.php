<?php 
    require('./accesoBD.php');
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
    <form action="./listado.php?id=" method="get">
        <?php
            echo "<input type='text' placeholder='Introduce el NOMBRE'><br>";
            echo "<input type='number' placeholder='Introduce el NUM TROFEOS'>";
        ?>
    </form>
    <a href="listado.php">lista</a>
</body>
</html>