<?php

    //Se comprueba la cookie si el usuario NO tiene sesión iniciada
    if (!isset($_SESSION['nombre'])) {
        //comprobamos si el usuario tiene la cookie de recuerdame
        if($_COOKIE['recuerdame']){
            //si la tiene, cogemos el valor y comprobamos a ver si coincide con alguno de la base de datos
            $tkn = $_COOKIE['recuerdame'];
            $db->ejecuta(
                "SELECT * FROM usuarios WHERE id=(SELECT id_usuario FROM tokens WHERE valor=?);",
                $tkn
            );
            
            $consulta = $db->obtenElDato();
            $_SESSION['nombre'] = $consulta['nombre'];
            $_SESSION['correo'] = $consulta['correo'];
            $_SESSION['id'] = $consulta['id'];
        }
    }
    

?>