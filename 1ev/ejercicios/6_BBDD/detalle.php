<?php 

    require('./accesoBD.php');

    

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
    <div class="global">
        <?php 
            $id = $_GET['id'];
            //si el ID es null, error
            if($id == null){
                echo "Error 404, ID nulo.";
            }else{
                $stmt = $mbd->prepare("SELECT * FROM Ciclistas where id=:id");
                $stmt->bindParam(':id', $id);
                $stmt->setFetchMode(PDO::FETCH_ASSOC);
                $stmt->execute();
                $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
                //si el ID introducido no devuelve ninguna row, es un ID inexistente
                if (count($datos) == 0) {
                    echo "Error 404, ID inexistente.";
                }else{
                    foreach ($datos as $dato) {
                        echo "Ciclista: ".$dato['nombre']."<br>ID: ".$dato['id']."<br>Número de trofeos: ";
                        for ($i=0; $i < $dato['num_trofeos']; $i++) {echo "<i class='fa-solid fa-trophy'></i>";}
                    }
                }        
            }
        
            echo "<br><a href='php_pdo.php'>Volver al listado</a>";
        
            //Ya se ha terminado; se cierra
            $mbd = null;
        ?>
    </div>
</body>
</html>