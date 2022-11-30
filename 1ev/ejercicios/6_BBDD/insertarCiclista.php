<?php 
    require('./accesoBD.php');

    $datos = [];
    $errores = [];
    $ultimoId = "";

    if (isset($_POST['enviar'])) {
        if (isset($_POST['nombre']) && $_POST['nombre'] != "" && $_POST['nombre'] != null) $datos['nombre'] = $_POST['nombre'];
        else $errores['nombre'] = "<span class='error'>*El campo nombre no puede estar vacío</span>";

        if (isset($_POST['trofeos']) && $_POST['trofeos'] != "" && $_POST['trofeos'] != null) $datos['trofeos'] = $_POST['trofeos'];
        else $errores['trofeos'] = "<span class='error'>*El campo trofeos no puede estar vacío</span>";

        //comprobaremos cuál es el último ID de la tabla, para insertar ese ID+1
        $resultado = $mbd->query('SELECT id FROM Ciclistas');
        //para que saque solo el nombre de las tablas y no el número con el ID asociativo
        $resultado->setFetchMode(PDO::FETCH_ASSOC);
        foreach ($resultado as $key => $value) {
            $ultimoId = $value['id'];
        }
        echo $ultimoId;

        //insert de datos
        
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
    Nombre <input type="text" name="nombre" value="<?= $_POST['nombre'] ?>"> <br>
    <?php if(isset($errores['nombre'])) echo $errores['nombre']."<br>" ?>

    <br>Número trofeos <input type="number" name="trofeos" min="1" max="95" value="<?= $_POST['trofeos'] ?>"> <br>
    <?php if(isset($errores['trofeos'])) echo $errores['trofeos']."<br>" ?>

    <br><br><input type="submit" name="enviar" value="ENVIAR"><br><br>
    </form>
    <a href="listado.php">lista</a>
</body>
</html>