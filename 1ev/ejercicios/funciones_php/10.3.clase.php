<!-- 3 Xing , Marcos (Revisado) -->
<?php 
    $usuarios3 = [
        "jorge" => "1234",
        "amparo" => "admin",
        "mary" => ""
    ];

    // === 1: Crea una array bidimesional que guarda nombre de usuario y contraseña de usuario en texto claro. array_walk ejecuta una funcion predefinida mostrando nombre de usuario y contraseña 
    function recorrerArray3($valor, $llave){ echo "El usuario: $llave tiene la contraseña: $valor <br>"; }
    function walkearArray3($array){ array_walk($array, "recorrerArray3"); }

    // === 2: Utilizando las funciones de contraseñas y la función array_map. Genera un array nuevo con los usuarios y su contraseña en formato hash.
    // === 3: En base al ejercicio anterior cambia la función para que los usuarios sin contraseña tenga la contraseña "tmp2022".
    function mapeado3($var){
        if($var == ""){ //modif 3
            $var = "tmp2022";
        }
        $pass = password_hash($var, PASSWORD_DEFAULT);

        return $pass;
    }

    $usuariosMod3 = array_map("mapeado3", $usuarios3);

    // === 4: Haz un filtrado de usuarios sin contraseña, utiliza array_replace para establecer en el array original $usuarios la contraseña de los usuarios que no tenían.
    function recorrerArray31($valor, $llave){
        if($valor == ""){
            $valor = "tmp2022";
        }
        echo "El usuario: $llave tiene la contraseña: $valor <br>"; 
    }

    function walkearArray31($array){array_walk($array, "recorrerArray31");}




?>