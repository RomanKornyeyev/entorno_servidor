<?php 
    require('./accesoBD.php');

    $datos = [];
    $errores = [];
    $idComparador = "";
    

    if (isset($_POST['enviar'])) {
        if (isset($_POST['id']) && $_POST['id'] != "" && $_POST['id'] != null) $datos['id'] = $_POST['id'];
        else $errores['id'] = "<span class='error'>*El campo id no puede estar vacío</span>";

        if (isset($_POST['nombre']) && $_POST['nombre'] != "" && $_POST['nombre'] != null) $datos['nombre'] = $_POST['nombre'];
        else $errores['nombre'] = "<span class='error'>*El campo nombre no puede estar vacío</span>";

        if (isset($_POST['trofeos']) && $_POST['trofeos'] != "" && $_POST['trofeos'] != null) $datos['trofeos'] = $_POST['trofeos'];
        else $errores['trofeos'] = "<span class='error'>*El campo trofeos no puede estar vacío</span>";

        //comprobaremos cuál es el último ID de la tabla, para insertar ese ID+1
        $resultado = $mbd->query('SELECT id FROM Ciclistas');
        //para que saque solo el nombre de las tablas y no el número con el ID asociativo
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        $idExiste = false;
        foreach ($resultado as $key => $value) {
            if ($_POST['id'] == $value['id']) {
                $idExiste = true;
                $idComparador = $value['id'];
            }
        }

        //insert de datos
        if(count($errores) == 0 && $idExiste){
            // Prepare
            $stmt = $mbd->prepare("UPDATE Ciclistas SET nombre = :nombre, num_trofeos = :num_trofeos WHERE id = :id");
            // Bind
            $id = $datos['id'];
            $nombre = $datos['nombre'];
            $num_trofeos = $datos['trofeos'];
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':num_trofeos', $num_trofeos);
            // Excecute
            $stmt->execute();
            header("Location: listado.php");
        }
        
        
        //cerramos y reseteamos
        $resultado = null;
        $mbd = null;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .error{color:red;}
    </style>
</head>
<body>
    <form action="" method="post">
    ID <input type="text" name="id" value="<?= $_POST['id'] ?>"> <br>
    <?php if(isset($errores['id'])) echo $errores['id']."<br>" ?>

    <br>Nombre <input type="text" name="nombre" value="<?= $_POST['nombre'] ?>"> <br>
    <?php if(isset($errores['nombre'])) echo $errores['nombre']."<br>" ?>

    <br>Número trofeos <input type="number" name="trofeos" min="1" max="95" value="<?= $_POST['trofeos'] ?>"> <br>
    <?php if(isset($errores['trofeos'])) echo $errores['trofeos']."<br>" ?>

    <br><br><input type="submit" name="enviar" value="ENVIAR"><br><br>
    </form>
    <a href="listado.php">lista</a>
</body>
</html>