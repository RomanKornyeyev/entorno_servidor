<?php
    $cosa = 1;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Hola mundo de php</title>
    <style>
        table{
            /*border-collapse: collapse;*/
        }
        td{
            width: 50px;
            text-align: center;
            border: 1px solid black;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <table>
        <?php for($i=0;$i < 10; $i++) { ?>
            <tr>
            <?php for($j=0;$j < 10; $j++) { ?>
                <td><?php echo $cosa ?></td>
            <?php $cosa++; } ?>
            </tr>
        <?php } ?>
    </table>
</body>
</html>