<?php 

    require('./accesoBD.php');

    //seleccionamos todo
    $resultado = $mbd->query('SELECT * FROM Logs');
    //para que saque solo el nombre de las tablas y no el número con el ID asociativo
    $resultado->setFetchMode(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Román">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REGISTROS</title>
    <style>
    *,
    *::before,
    *::after {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .global {
        min-width: 100vw;
        ming-height: 100vh;
    }
    .heading{background-color: lightgrey;}
    table{margin: 0 auto;}
    table, tr, td{border-collapse: collapse; border: 1px solid black;}
    td{padding: 15px;}
    </style>
</head>
<body>
    <div class="global">
        <table>
            <?php 
                //arrays asociativos
                $primeraFila = true;
                foreach ($resultado as $key => $fila) {
                    //pintamos heading
                    if($primeraFila){
                        echo "<tr>";
                        foreach ($fila as $llave => $value)if($llave != 'id'){
                            echo "<td class='heading'><b>$llave</b></td>";
                        }
                        echo "</tr>";
                    }
                    $primeraFila = false;

                    //pintamos cuerpo
                    echo "<tr>";
                    echo "<td>". $fila['navegador']."</td>";
                    echo "<td>". $fila['tiempo']."</td>";
                    echo "</tr>";
                }

                // Ya se ha terminado; se cierra
                $resultado = null;
                $mbd = null;
            ?>
        </table>
    </div>
</body>
</html>