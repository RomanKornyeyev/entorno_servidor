<?php 

    $estado = ""; //almacena el radio seleccionado de estado
    $datos = [];
    $errores = [];
    $selected = ""; //booleano para select o no
    $opcEstado = ["Soltero", "Casado", "Divorciado"];
    $opcIdioma = ["", "Español", "Inglés", "Francés"];
    $opcAficion = ["Videojuegos", "Ciclismo", "Leer", "Ver series", "Deporte"];

    if (isset($_POST['enviar'])) {
        if (isset($_POST['nombre']) && $_POST['nombre'] != "" && $_POST['nombre'] != null) $datos['nombre'] = $_POST['nombre'];
        else $errores['nombre'] = "<span class='error'>*El campo nombre no puede estar vacío</span>";

        if (isset($_POST['edad']) && $_POST['edad'] != "" && $_POST['edad'] != null) $datos['edad'] = $_POST['edad'];
        else $errores['edad'] = "<span class='error'>*El campo edad no puede estar vacío</span>";

        if (isset($_POST['comentarios']) && $_POST['comentarios'] != "" && $_POST['comentarios'] != null) $datos['comentarios'] = $_POST['comentarios'];
        else $errores['comentarios'] = "<span class='error'>*El campo comentarios no puede estar vacío</span>";

        if (isset($_POST['estado']) && $_POST['estado'] != "" && $_POST['estado'] != null) $datos['estado'] = $_POST['estado'];
        else $errores['estado'] = "<span class='error'>*El campo estado no puede estar vacío</span>";
        
        if (isset($_POST['idioma']) && $_POST['idioma'] != "" && $_POST['idioma'] != null) $datos['idioma'] = $_POST['idioma'];
        else $errores['idioma'] = "<span class='error'>*El campo idioma no puede estar vacío</span>";  

        if (isset($_POST['aficion']) && !empty($_POST['aficion']))  $datos['aficion'] = strtolower(implode(", ", $_POST['aficion']));
        else $errores['aficion']="<span class='error'>*Debes seleccionar al menos una opión</span>";


        //guardado de datos
        if (count($errores) == 0) {
            $cadena=implode(";", $datos);
            file_put_contents('BD.txt', "$cadena;\n", FILE_APPEND);
            //Redirect
            header("Location: listaForm.php");
    
            //Exit
            exit();
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
        .error{color:red}
    </style>
</head>
<body>
    <form action="" method="post">
        Nombre <input type="text" name="nombre" value="<?= $_POST['nombre'] ?>"> <br>
        <?php if(isset($errores['nombre'])) echo $errores['nombre']."<br>" ?>

        <br>Edad <input type="number" name="edad" min="1" max="95" value="<?= $_POST['edad'] ?>"> <br>
        <?php if(isset($errores['edad'])) echo $errores['edad']."<br>" ?>

        <br>Comentarios <br><textarea name="comentarios" cols="30" rows="10"><?= $_POST['comentarios'] ?></textarea><br>
        <?php if(isset($errores['comentarios'])) echo $errores['comentarios']."<br>" ?>

        <br>Estado civil:<br>
        <?php 
            foreach ($opcEstado as $value) {
                ($_POST['estado'] == $value)? $selected = "checked" : $selected = "";
                echo "$value<input type='radio' name='estado' id='$value' value='$value' $selected><br>";
            }
            if(isset($errores['estado'])) echo $errores['estado']."<br>";
        ?>

        <br>Idiomas:<br>
        <select name="idioma">
            <?php
                foreach ($opcIdioma as $value) {
                    ($_POST['idioma'] == $value)? $selected = "selected" : $selected = "";
                    echo "<option value='$value' $selected>$value</option>";
                }
            ?>
        </select>
        <?php echo "<br>"; if(isset($errores['idioma'])) echo "<br>".$errores['idioma']."<br>"; ?>

        <br>Aficiones:<br>
        <?php
            foreach ($opcAficion as $value) {
                if (!empty($_POST['aficion'])) {
                    (in_array($value, $_POST['aficion']))? $selected = "checked": $selected = "";
                }
                echo "$value<input type='checkbox' name='aficion[]' value='$value' $selected><br>";
            }
        ?>
        <?php if(isset($errores['aficion'])) echo "<br>".$errores['aficion']."<br>"; ?>



        <br><br><input type="submit" name="enviar" value="ENVIAR"><br><br>
        <a href="listaForm.php">Ver listado</a>
        
    </form>
</body>
</html>