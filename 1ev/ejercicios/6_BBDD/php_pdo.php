<?php

// PDO
// =========================================
// testConnectionPDO.php

try {
  $mbd = new PDO('mysql:host=localhost;dbname=mibasededatos', "roman", "123456"); //roman nombre, 123456 contra
  

  // Utilizar la conexión aquí
  $resultado = $mbd->query('SELECT * FROM Ciclistas');
  //para que saque solo el nombre de las tablas y no el número con el ID asociativo
  $resultado->setFetchMode(PDO::FETCH_ASSOC);

  foreach ($resultado as $key => $fila) {
    echo "<ul>";
    foreach ($fila as $clave => $valor) {
      echo "<li>" . $clave . ": <b>" . $valor . "</b></li>";        
    }
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