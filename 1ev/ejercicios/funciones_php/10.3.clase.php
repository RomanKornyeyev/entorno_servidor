<!-- 
3 Xing , Marcos (Revisado)

Utiliza la función print_r() para ver la evolución de cada array.

Funciones: array_walk, array_map, array_replace

Extra: https://www.php.net/manual/es/function.password-hash.php

$usuarios = [
	"jorge" => "1234",
	"amparo" => "admin",
	"mary" = > "",
]

1: Crea una array bidimesional que guarda nombre de usuario y contraseña de usuario en texto claro. array_walk ejecuta una funcion predefinida mostrando nombre de usuario y contraseña

2: Utilizando las funciones de contraseñas y la función array_map. Genera un array nuevo con los usuarios y su contraseña en formato hash.

3: En base al ejercicio anterior cambia la función para que los usuarios sin contraseña tenga la contraseña "tmp2022"

4: Haz un filtrado de usuarios sin contraseña, utiliza array_replace para establecer en el array original $usuarios la contraseña de los usuarios que no tenían.

-->
<?php 
    $usuarios3 = [
        "jorge" => "1234",
        "amparo" => "admin",
        "mary" => ""
    ];

    // === 1 ===
    //recorremos el array e imprimimos los valores
    function recorrerArray3($valor, $llave){
        echo "El usuario: $llave tiene la contraseña: $valor <br>";
    }
    //hacemos una función para llamarla en HTML
    function walkearArray3($array){
        array_walk($array, "recorrerArray3");
    }

    // === 2 ===
    function mapeado3($var){
        $pass = password_hash($var[0], PASSWORD_DEFAULT);

        return $var.", ";
    }

    $usuariosMod3 = array_map("mapeado3", $usuarios3);
    print_r(array_map("mapeado3", $usuarios3));

?>