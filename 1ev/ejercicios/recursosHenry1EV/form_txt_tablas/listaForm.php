<?php
    $data=file_get_contents('BD.txt');
    $lineas=explode("\n", $data);
?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Román">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista Form Pocho</title>
    <style>
        * {
            font-family: 'Montserrat', sans-serif;
            /* font-weight:500; */
        }
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            text-align: center;
        }
        tr, td, th {
            padding:0.5%;
        }
        table {
            margin-bottom:2%;
            width:100%;
        }
        th {
            background-color: #007e98;
            color: #FFF;
        }

        a {
            text-decoration: none;
            padding:1.2%;
            background-color: #007e98;
            color: #FFF;
            border-radius:10px;
        }
        a:hover {
            background-color: rgba(255, 255, 255, 0);
            box-shadow: inset 0px 0px 0px 3px #007e98;
            color: #007e98;
        }
    </style>
</head>
<body>
    <!-- tabla -->
    <table>
        <!-- thead -->
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Edad</th>
                <th>Comentario</th>
                <th>Estado civil</th>
                <th>Idiomas</th>
                <th>Aficiones</th>
            </tr>
        </thead>

        <!-- tbody -->
        <tbody>
            <?php
                //recorremos todo el archivo línea a línea
                foreach ($lineas as $linea) {
                    echo "<tr>";
                    //separamos cada elemento de cada celda con ;
                    $celdas = explode(";", $linea);
                    //quita el último ; del array (en el archivo hay un ; al final)
                    array_pop($celdas);
                    //recorremos nuestro array de celdas
                    foreach ($celdas as $celda) {
                        //y pintamos un td con cada celda
                        echo "<td>".$celda."</td>";
                    }
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>
    <a href="index.php">Introduce otra entrada</a>
</body>
</html>