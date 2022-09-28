<?php

    $dwec = "Cliente";
    $dwes = "Servidor";
    $emp = "Empresa";
    $ing = "Inglés";
    $diw = "Interfaces";
    $daw = "Despliegue";
    

    $horario = [
        0 => ["", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes"], 
        1 => ["16:00", $dwec, $ing, $diw, $emp, $dwes], 
        2 => ["16:55", $dwec, $daw, $diw, $daw, $dwes], 
        3 => ["17:50", $dwec, $daw, $diw, $daw, $dwes],
        4 => ["18:45", "P", "A", "T", "I", "O"],
        5 => ["19:10", $emp, $diw, $dwes, $dwes, $dwec],
        6 => ["20:05", $emp, $diw, $dwes, $dwes, $dwec],
        7 => ["21:50", $ing, $diw, $dwes, $dwes, $dwec],
    ];

    function generarHorario(){

        global $horario;
        $cont = 1;
        $i_aux = 0;

        for ($i = 0; $i < count($horario); $i++) {
            echo "<tr class='tr'>";
            for($j = 0; $j < count($horario[$i]); $j++){
                $i_aux = $i;
                while($horario[$i_aux][$j] == $horario[$i_aux+1][$j]){ //si el td de abajo es igual, rowspan++ (cont++)
                    $cont++;
                    $i_aux++; 
                }
                if($horario[$i-1][$j] != $horario[$i][$j] || $horario[$i-1][$j] == null){ //si el td de arriba es igual o nulo, no pintes nada
                    echo "<td class='td' rowspan='$cont'>".$horario[$i][$j]."</td>";
                }
                $cont = 1;
            }
            echo "</tr>";
        }
    };

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="./css/styles.css">
    <!-- JS -->
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/scrollreveal.js" defer=""></script>
    <title>HORARIO</title>
</head>
<body>
    <main class="container">
        <h1 class="title">HORARIO</h1>
        <div class="central">
            <table class="table">
                <tbody>
                    <?php generarHorario() ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>