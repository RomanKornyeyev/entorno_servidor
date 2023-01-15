<?php 

    require('./init.php');

    $resultado = $mbd->prepare("SELECT * FROM TEMAS");
    $resultado->execute();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>ForoSencillo - Inicio</title>
</head>
<body>
    <?php include('menu.php'); ?>
    <main class="main limit-width-1200">
        <h1 class="titulo">TEMAS</h1>
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
                    echo "<td>". "<a href='tema.php?tema=".$fila['TNOMBRE']."'>".$fila['TNOMBRE']."</a>" ."</td>";
                    echo "<td>". $fila['DESCRIPCION']."</td>";
                    echo "</tr>";
                }

                // Ya se ha terminado; se cierra
                $resultado = null;
                $mbd = null;
            ?>
        </table>
    </main>
    <?php include('footer.php'); ?>
</body>
</html>