<?php 

    //función para evitar crossite scripting
    // --- solo para string, ¡¡NO ARRAYS!! ---
    function clean_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $estado = ""; //almacena el radio seleccionado de estado
    $datos = [];
    $errores = [];
    $selected = ""; //booleano para select o no
    $opcEstado = ["Soltero", "Casado", "Divorciado"];
    $opcIdioma = ["", "Español", "Inglés", "Francés"];
    $opcAficion = ["Videojuegos", "Ciclismo", "Leer", "Ver series", "Deporte"];
    
    //si el form se ha enviado
    if (isset($_POST['enviar'])) {
        //comprobación del campo nombre
        if (isset($_POST['nombre']) && $_POST['nombre'] != "" && $_POST['nombre'] != null) $datos['nombre'] = clean_input($_POST['nombre']); 
        else $errores['nombre'] = "*El campo nombre no puede estar vacío";

        //comprobación del campo edad
        if (isset($_POST['edad']) && $_POST['edad'] != "" && $_POST['edad'] != null) $datos['edad'] = clean_input($_POST['edad']);
        else $errores['edad'] = "*El campo edad no puede estar vacío";

        //comprobación del campo comentarios
        if (isset($_POST['comentarios']) && $_POST['comentarios'] != "" && $_POST['comentarios'] != null) $datos['comentarios'] = clean_input($_POST['comentarios']);
        else $errores['comentarios'] = "*El campo comentarios no puede estar vacío";

        //comprobación del campo estado
        if (isset($_POST['estado']) && $_POST['estado'] != "" && $_POST['estado'] != null) $datos['estado'] = clean_input($_POST['estado']);
        else $errores['estado'] = "*El campo estado no puede estar vacío";
        
        //comprobación del campo idioma
        if (isset($_POST['idioma']) && $_POST['idioma'] != "" && $_POST['idioma'] != null) $datos['idioma'] = clean_input($_POST['idioma']);
        else $errores['idioma'] = "*El campo idioma no puede estar vacío";  

        //comprobación del campo afición
        if (isset($_POST['aficion']) && !empty($_POST['aficion'])) $datos['aficion'] = strtolower(implode(", ", $_POST['aficion']));
        else $errores['aficion']="*Debes seleccionar al menos una opión";


        //si no hay errores (campos vacíos, etc.)
        if (count($errores) == 0) {
            //guardamos los datos
            //cadena va a ser cada línea del txt, en dicha línea guardamos cada dato, separándolo con ;
            $cadena=implode(";", $datos);
            //guardamos esto AL FINAL del archivo (como un >> en bash)
            file_put_contents('BD.txt', "$cadena;\n", FILE_APPEND);
            
            //Redirect a la lista
            header("Location: listaForm.php");
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
        <?php if(isset($errores['nombre'])) echo "<span class='error'>".$errores['nombre']."</span><br>" ?>

        <br>Edad <input type="number" name="edad" min="1" max="95" value="<?= $_POST['edad'] ?>"> <br>
        <?php if(isset($errores['edad'])) echo "<span class='error'>".$errores['edad']."</span><br>" ?>

        <br>Comentarios <br><textarea name="comentarios" cols="30" rows="7"><?= $_POST['comentarios'] ?></textarea><br>
        <?php if(isset($errores['comentarios'])) echo "<span class='error'>".$errores['comentarios']."</span><br>" ?>

        <br>Estado civil:<br>
        <?php 
            foreach ($opcEstado as $value) {
                ($_POST['estado'] == $value)? $selected = "checked" : $selected = "";
                echo "$value<input type='radio' name='estado' id='$value' value='$value' $selected><br>";
            }
            if(isset($errores['estado'])) echo "<span class='error'>".$errores['estado']."</span><br>";
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
        <?php echo "<br>"; if(isset($errores['idioma'])) echo "<span class='error'>".$errores['idioma']."</span><br>"; ?>

        <br>Aficiones:<br>
        <?php
            foreach ($opcAficion as $value) {
                if (!empty($_POST['aficion'])) {
                    (in_array($value, $_POST['aficion']))? $selected = "checked": $selected = "";
                }
                echo "$value<input type='checkbox' name='aficion[]' value='$value' $selected><br>";
            }
        ?>
        <?php if(isset($errores['aficion'])) echo "<span class='error'>".$errores['aficion']."</span><br>"; ?>



        <br><br><input type="submit" name="enviar" value="ENVIAR"><br><br>
        <a href="listaForm.php">Ver listado</a><br><br>
        
    </form>
</body>
</html>