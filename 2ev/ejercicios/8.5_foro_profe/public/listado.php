<?php
    require('../src/init.php');

    $title="Listado de usuarios";
    $pageHeader="Listado";
    $pageId="listado";
    $content="Esto es el contenido";

    //Obtiene info del modelo
    $DB->ejecuta("SELECT * FROM usuarios");
    $usuarios = $DB->obtenDatos();

    //Se lo pasa al template
    //no se lo lanza al cliente directamente, lo mete en un buffer
    ob_start();
?>

<table>
    <tr><td>Nombre</td></td>Foto</td></tr>

    <?php foreach ($usuarios as $usuario) { ?>
        <tr>
            <td><?=$usuario['nombre']?></td>
            <td><img src="<?=$usuario['img']?>" alt=""></td>
        </tr>
    <?php } ?>

</table>

<?php

    $content=ob_content_clean();

    require("template.php");

    
/*
?>

    <?php foreach ($usuarios as $usuario){?>
        <?php 
            print_r($usuario);
        ?>
    <?php } ?>
    */
?>
