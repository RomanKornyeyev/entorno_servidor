<?php 

    //apartado 1
    function pintaCabecera(...$var){
        $cabecera = "";
        foreach($var as $valor){
            $cabecera = $cabecera."<th>".$valor."</th>";
        }
        return "<tr>".$cabecera."</tr>";
    }
    
    //apartado 2
    function pintaContenido(...$var){
        $contenido = "";
        foreach($var as $valor){
            $contenido = $contenido."<td>".$valor."</td>";
        }
        return "<tr>".$contenido."</tr>";
    }

    const HORA_INI = 9;
    const HORA_FIN = 22;
    $horas = [];
    for ($i=HORA_INI; $i <= HORA_FIN; $i++) { 
        $horas[$i] = $i;
    }
    //apartado 3
    function pintaHorarioVacio(){
        global $horas;
        echo "<table>";
        array_walk($horas, function ($valor, $llave) {
            echo "$llave =>".pintaContenido(HORA_INI." - ".HORA_FIN, "servidor", "cliente", "despliegue", "empresa", "servidor");
        });
        echo pintaCabecera("", "lunes", "martes", "miercoles", "jueves", "viernes");
        echo pintaContenido(HORA_INI." - ".HORA_FIN, "servidor", "cliente", "despliegue", "empresa", "servidor");
        echo "</table>";
    }

    

    

?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Román">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funciones</title>
    <style>
        table{margin: 0 auto;}
        table, tr, td, th{border-collapse: collapse; border: 1px solid black;}
        td, th{padding: 15px;}
    </style>
</head>
<body>
    <?php 
        pintaHorarioVacio();
    ?>
</body>
</html>