<?php 

    $datos = [];
    $errores = [];
    $selected = ""; //booleano para select o no
    $opcAficion = ["Caja madera", "Tarjeta regalo", "Envío urgente", "Panecillos", "Membrillo"];

    if (isset($_POST['enviar'])) {
        if (isset($_POST['nombre']) && $_POST['nombre'] != "" && $_POST['nombre'] != null) $datos['nombre'] = $_POST['nombre'];
        else $errores['nombre'] = "<span class='error'>*El campo nombre no puede estar vacío</span>";

        if (isset($_POST['direccion']) && $_POST['direccion'] != "" && $_POST['direccion'] != null) $datos['direccion'] = $_POST['direccion'];
        else $errores['direccion'] = "<span class='error'>*El campo dirección no puede estar vacío</span>"; 

        if (isset($_POST['extras']) && !empty($_POST['extras']))  $datos['extras'] = strtolower(implode(", ", $_POST['extras']));
        else $errores['extras']="<span class='error'>*Debes seleccionar al menos una opión</span>";


        //mensaje GRACIAS
        function mensajeGracias(){
            global $errores;
            if (count($errores) == 0) {
                echo "<span class='green'>Gracias por su pedido</span>";
            }
        }
        //vaciado de datos si todo está ok
        if (count($errores) == 0) {
            $_POST['nombre'] = "";
            $_POST['direccion'] = "";
            $_POST['extras'] = "";
        }
        
    }


?>
<!DOCTYPE html>
<html lang="es-ES">
<head>
    <meta charset="UTF-8">
    <meta name="author" content="Román">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Pocho</title>
    <style>
        .error{color:red;}
        .green{color:green;font-size: 2rem;}
    </style>
</head>
<body>
    <form action="" method="post">
        Nombre del queso <input type="text" name="nombre" value="<?= $_POST['nombre'] ?>"> <br>
        <?php if(isset($errores['nombre'])) echo $errores['nombre']."<br>" ?>

        Dirección del envío <input type="text" name="direccion" value="<?= $_POST['direccion'] ?>"> <br>
        <?php if(isset($errores['direccion'])) echo $errores['direccion']."<br>" ?>

        <br>Extras:<br>
        <?php
            foreach ($opcAficion as $value) {
                if (!empty($_POST['extras'])) {
                    (in_array($value, $_POST['extras']))? $selected = "checked": $selected = "";
                }
                echo "$value<input type='checkbox' name='extras[]' value='$value' $selected><br>";
            }
        ?>
        <?php if(isset($errores['extras'])) echo "<br>".$errores['extras']."<br>"; ?>



        <br><br><input type="submit" name="enviar" value="ENVIAR"><br><br>
        
        <?php mensajeGracias(); ?>

    </form>
</body>
</html>