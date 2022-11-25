<?php

// PDO
// =========================================

  require('./accesoBD.php');


  // Utilizar la conexión aquí
  $resultado = $mbd->query('SELECT * FROM Ciclistas');
  //para que saque solo el nombre de las tablas y no el número con el ID asociativo
  $resultado->setFetchMode(PDO::FETCH_ASSOC);

  

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
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
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        font-size: 25px;
    }

    .tabla {
        border: 1px solid black;
        text-align: center;
        padding: 25px;
    }

    .tabla-titulo {
        background-color: lightgray;
    }
    </style>
</head>

<body>
    <div class="global">
      <?php 
        //arrays asociativos
        $primeraFila = true;
        foreach ($resultado as $key => $fila) {
          if($primeraFila) foreach ($fila as $llave => $value)if($llave != 'id') echo "<div class='tabla tabla-titulo'>$llave</div>";
          $primeraFila = false;
          echo "<div class='tabla tabla-valor'><a href='detalle.php?id=" . $fila['id'] . "'>" . $fila['nombre'] . "</a></div>";
          echo "<div class='tabla tabla-valor'>";
          for ($i = 0; $i < $fila['num_trofeos']; $i++) {echo "<i class='fa-solid fa-trophy'></i>";}
          echo "(" . $fila['num_trofeos'] . ")</div>";
        }

        // Ya se ha terminado; se cierra
        $resultado = null;
        $mbd = null;
      ?>
    </div>
</body>

</html>