<?php 

    //require('./accesoDB.php');

    $mbd = new PDO('mysql:host=localhost;dbname=mibasededatos', "roman", "123456");
    $id = $_GET['id'];
    $detalleCiclista = $mbd->prepare("SELECT * FROM Ciclistas where id=:id");
    $detalleCiclista->setFetchMode(PDO::FETCH_ASSOC);
    $detalleCiclista->bindParam(':id', $id);
    $detalleCiclista->execute();
    $datos = $detalleCiclista->fetch(PDO::FETCH_OBJ);
    echo "Ciclista: ".$datos->nombre."<br>ID: ".$datos->id."<br>Número de trofeos: ";
    for ($i=0; $i < $datos->num_trofeos; $i++) { 
        echo "<i class='fa-solid fa-trophy'></i>";
    }
    echo "(".$datos->num_trofeos.")";

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
    body{
        font-size: 2em;
    }
  </style>
</head>
<body>

</body>
</html>