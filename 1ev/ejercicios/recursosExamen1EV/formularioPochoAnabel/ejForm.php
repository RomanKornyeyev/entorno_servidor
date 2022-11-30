<?php
    $nombre="";
    $edad="";
    $comentarios="";
    $estado=""; //radius
    $idioma=""; //select
    $pasatiempos=""; //checkbox
    $datos=[];
    $errores=[];
    $sele="";
    $opcEstado = ["soltero", "casado", "divorciado"];
    $opcIdiomas = ["","español", "inglés", "francés"];
    $opcPasatiempos = ["Escuchar musica", "Leer", "Ver series", "Hacer deporte", "Hacer manualidades"];

    if (isset($_POST['enviar'])) {
        if (isset($_POST['nombre']) && $_POST['nombre']!="") {
            $datos['nombre'] = ucfirst($_POST['nombre']);
        } else {
            $errores['nombre']="*El campo nombre no puede estar vacío.";
        }
        
        if (isset($_POST['edad']) && $_POST['edad']!="") {
            $datos['edad'] = $_POST['edad'];
        } else {
            $errores['edad']="*El campo edad no puede estar vacío.";
        }

        if (isset($_POST['comentarios']) && $_POST['comentarios']!="") {
            $datos['comentarios'] = $_POST['comentarios'];
        } else {
            $errores['comentarios']="*El campo comentarios no puede estar vacío.";
        }

        if (isset($_POST['estado']) && $_POST['estado']!="") {
            $datos['estado'] = $_POST['estado'];
        } else {
            $errores['estado']="*El campo estado no puede estar vacío.";
        }
        
        if (isset($_POST['idioma']) && $_POST['idioma']!="") {
            $datos['idioma'] = $_POST['idioma'];
        } else {
            $errores['idioma']="*El campo idioma no puede estar vacío.";
        }
        if (isset($_POST['pasatiempos']) && !empty($_POST['pasatiempos'])) {
                $datos['pasatiempos'] = strtolower(implode(", ", $_POST['pasatiempos']));
        } else {
            $errores['pasatiempos']="*Debes seleccionar al menos una opción.";
        }


        if (count($errores) == 0) {
            $cadena=implode(";", $datos);
            echo $cadena;        
            file_put_contents('texto.txt', "$cadena;\n", FILE_APPEND);
            //Redirect
            header("Location: infoForm.php");
    
            //Exit
            exit();
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        p {
            color: red;
        }
    </style>
    <title>Campos Simples</title>
</head>
<body>
    <form action="" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?=$_POST['nombre']?>"><br>
        <?php
            if (isset($errores['nombre'])) {
                echo "<p>".$errores['nombre']."</p>";
            }
        ?>
        
        <label for="edad">Edad: </label>
        <input type="number" name="edad" id="edad" min=10 max=80 size=2 value="<?=$edad?>"><br>
        <?php
            if (isset($errores['edad'])) {
                echo "<p>".$errores['edad']."</p>";
            }
        ?>

        <label for="nombre">Comentarios:</label><br>
        <textarea name="comentarios" id="comentarios" cols="30" rows="10" placeholder="Escribe algo aquí..."><?=$comentarios?></textarea><br>
        <?php
            if (isset($errores['comentarios'])) {
                echo "<p>".$errores['comentarios']."</p>";
            }
        ?>
        
        <label for="estado">Selecciona tu estado civil: </label><br>
        <?php
            array_walk($opcEstado, function($value, $key, $estado) {
                $sele=($estado==$value)?"checked":"";
                echo "$value<input type='radio' name='estado' id='$value' value='$value' $sele><br>";
            }, $estado);
        ?>
        <?php
            if (isset($errores['estado'])) {
                echo "<p>".$errores['estado']."</p>";
            }
        ?>

        <br><label for="idioma">Idiomas: </label>
        <select name="idioma" id="idioma">
        <?php
            array_walk($opcIdiomas, function($value, $key, $idioma) {
                $sele=($idioma==$value)?"selected":"";
                echo "<option value='$value' $sele>$value</option>";
            }, $idioma);
        ?>
        </select>
        <?php
            if (isset($errores['idioma'])) {
                echo "<p>".$errores['idioma']."</p>";
            }
        ?>

        <label for="pasatiempos"><br>Selecciona tus pasatiempos favoritos:</label><br>
        <?php
            $sele;
            foreach ($opcPasatiempos as $value) {  
                if (!empty($_POST['pasatiempos'])) {
                    $sele=(in_array($value, $_POST['pasatiempos']))?"checked":"";
                }
                    echo "$value <input type='checkbox' name='pasatiempos[]' value='$value' $sele><br>";
            }
        ?>
        <?php
            if (isset($errores['pasatiempos'])) {
                echo "<p>".$errores['pasatiempos']."</p>";
            }
        ?>

        <br><input type="submit" value="enviar" name="enviar">
        <br><a href="infoForm.php">Ver listado</a>
    </form>
</body>
</html>