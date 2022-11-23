<?php

// PDO
// =========================================
// testConnectionPDO.php

try {
  //mysql:servidor:database, usuario(roman), contra(123456)
  $mbd = new PDO('mysql:host=localhost;dbname=mibasededatos', "roman", "123456");
  

  // Utilizar la conexión aquí
  $resultado = $mbd->query('SELECT * FROM Ciclistas');
  //para que saque solo el nombre de las tablas y no el número con el ID asociativo
  $resultado->setFetchMode(PDO::FETCH_ASSOC);

  foreach ($resultado as $key => $fila) {
    echo "<ul>";
    echo "<a href='detalle.php?id=".$fila['id']."'>";
    foreach ($fila as $clave => $valor) {
      echo "<li>" . $clave . ": <b>" . $valor . "</b></li>";        
    }
    echo "</a>";
    echo "</ul>";
  }

  // Ya se ha terminado; se cierra
  $resultado = null;
  $mbd = null;

} catch (PDOException $e) {
  print "¡Error!: " . $e->getMessage() . "\n";
  die();
}

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
    ul{
      border: 1px solid black;
      padding: 15px 35px;
      background-color: lightgray;
    }
    li{
      list-style: none;
    }
  </style>
</head>
<body>

</body>
</html>