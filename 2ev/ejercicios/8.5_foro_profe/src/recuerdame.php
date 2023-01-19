<?php

    // Si no está logueado
    if (!isset($_SESSION['nombre']) || $_SESSION['nombre'] == "") {
        // Si el usuario presenta una Cookie de recuerdame
        if (isset($_COOKIE['recuerdame'])) {
            // Obtengo de la base de datos el usuario de ese token
            $DB->ejecuta(
                "SELECT u.id, u.nombre, t.valor
                FROM usuarios u
                LEFT JOIN tokens t ON u.id = t.id_usuario
                WHERE t.valor = ? AND t.expiracion > NOW();",
                $_COOKIE['recuerdame']
            );
            $tokenInfodb = $DB->obtenElDato();
            if($tokenInfodb != null){
                //login
                $_SESSION['id'] = $tokenInfodb['id'];
                $_SESSION['nombre'] = $tokenInfodb['nombre'];
            }
            // Extiendo su vida otra semana
            //Vida de cookie
            //en $tokenInfodb tambn $_cookie['recuerdame']
            setcookie(
                "recuerdame",
                $tokenInfodb['valor'],
                [
                    "expires" => time() + 7 * 24 * 60 * 60,
                    /*"secure" => true,*/
                    "httponly" => true
                ]
            );

            //Vida del token
            $DB->ejecuta(
                "UPDATE tokens SET expiracion = NOW() + INTERVAL 7 DAY WHERE valor = ?",
                $tokenInfodb["valor"]
            );


        }
    }
            

?>