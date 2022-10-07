<!-- 5. Mario, Jason, Daniel -->
<?php 

    //Con el siguiente array de productos, crea una lista de la compra en la que puedas seleccionar la cantidad de productos que quieres adquirir y te muestre el precio total por producto y el total de la factura:
    $productos = [
        "naranja" => 1.2,
        "manzana" => 1.5,
        "pera" => 1.8,
        "platano" => 1.1,
        "kiwi" => 2,
        "macarrones" => 0.5,
        "arroz" => 0.75,
        "salchichas" => 1
    ];

    //Genera una página para que el usuario introduzca qué productos quiere comprar en un textarea. El usuario los introducirá juntos, separados por comas y todos los productos que quiere comprar estarán en el array de producto.
    // Al dar enviar aparecerá el total de la factura: 1.55
    //Funciones: array_sum (opcional => array_push), array_keys, explode
    function cantidad($nombreProducto){
        if(empty($_GET)) return 0;
        else return $_GET[$nombreProducto];
    }

    function imprimirLista($productos){
        echo
        "<table>
            <caption>Lista de productos</caption>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Cantidad</th>
            </tr>";
        for ($i=0; $i < count($productos); $i++) { 
            $nombreProducto = key($productos);
            $precioProducto = $productos[$nombreProducto];
            echo
            "
            <tr>
                <td>".ucfirst($nombreProducto)."</td>
                <td>".$precioProducto."€</td>
                <td><input name='".$nombreProducto."' type='number' value='".cantidad($nombreProducto)."' min='0' max='99'></td>
            </tr>
            ";
        next($productos);
        }
        echo "</table>";
        
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="10.5.clase.php" method="get">
        <?php imprimirLista($productos); ?>
    </form>
</body>
</html>