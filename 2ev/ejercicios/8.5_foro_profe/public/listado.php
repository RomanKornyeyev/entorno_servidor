<?php
    require('../src/init.php');

    $DB->ejecuta("SELECT * FROM usuarios");
    $data = $DB->obtenDatos();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$CONFIG['title']?></title>
</head>
<body>
    <h1>HOla mundo</h1>
    <?php foreach ($data as $dato){?>
        <?php 
            print_r($dato);
        ?>
    <?php } ?>
</body>
</html>