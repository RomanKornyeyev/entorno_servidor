<?php

/*
Debes definir una estructura adecuada para este problema
*/

function generarTablero(){
    $tablero = [
        array("&nbsp;", "&nbsp;", "&nbsp;"),
        array("&nbsp;", "&nbsp;", "&nbsp;"),
        array("&nbsp;", "&nbsp;", "&nbsp;")
    ];

    echo "<table>";
    for ($i=0; $i < $tablero; $i++) { 
        echo "<tr>";
        for ($j=0; $j < $tablero[$i]; $j++) { 
            echo "<td>".$tablero[$i][$j]."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}


$jugador;
$posx;
$posy;
//si se envía
function lecturaGuardado(){
    if(isset($_POST['submit'])){
        $ocupada = false;
        $outRange = false;
        //jugador (X o O)
        $jugador = $_POST['turno'];
    
        //posicion de inserción
        $posx = $_POST['posx'];
        $posy = $_POST['posy'];
    
    
        //===CSV
        $data = file_get_contents("datos.csv");
        $lines = explode("\n", $data);
        foreach ($lines as $line) {
            $fields = explode(";", $line);
            if($posx > 3 ||  $posy > 3){
                $outRange = true;
            }else if($posx == $fields[1] && $posx == $fields[2]){
                $ocupada = true;
            }
        }
        //guardo
        if ($ocupada || $outRange) {
            echo "<div class='error'>
                        ERROR
                    </div>";
        }else{
            file_put_contents(
                "datos.csv",
                "$jugador;$posx;$posy\n",
                FILE_APPEND
            );
        }
    }
}


?>

<html>
<head>
  <link rel="stylesheet" type="text/css" media="all" href="css/estilo.css">
  <title>3 en Raya</title>
</head>
<body>
  <h1>3 en raya</h1>
  <?=generarTablero()?>
  <?=lecturaGuardado()?>
  <div class="error">
    Jugador AAA ha ganado
    <a href="">Juego nuevo</a>
  </div>
  <form action="#" method="post">
      turno:
      <select name="turno">
        <option value="X">X</option>
        <option value="O">O</option>
      </select>
      <br>
      x: <input type="text" name="posx" value="<?=$_POST['posx']?>"><br>
      y: <input type="text" name="posy" value="<?=$_POST['posy']?>"><br>
      <button type="submit" name="submit">Jugar</button>
  </form>
</body>
</html>
