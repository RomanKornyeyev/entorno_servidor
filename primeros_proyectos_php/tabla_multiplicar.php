<?php
    $cosa = "Hola soy PHP";
    $cosa = 5;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Hola mundo de php</title>
</head>
<body>
    <!-- forma cutre -->
    <?php //
    //     for($i=0;$i < $cosa; $i++) {
    //         echo "<h1>Hola esto es un bucle " . $i . " de " . $cosa . "</h1>";
    //     }
    // ?>
    <!-- forma buena -->
    <?php // for($i=0;$i < $cosa; $i++) { ?>
        <h1>Hola esto es un bucle <?php echo $i . " de " . $cosa ?></h1>
    <?php // } ?>
    
    <!-- reto -->
    <table>
        <?php for($i=1;$i < 10; $i++) { ?>
        <tr>
            <td>5x<?php echo $i ?></td>
            <td><?php echo 5 * $i?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>