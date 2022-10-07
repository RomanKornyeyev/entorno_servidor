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
    function cantidadSel($nombreProducto){
        if(empty($_GET)) return 0;
        else return $_GET[$nombreProducto];
    }

    function imprimirLista($productos){
        echo
        "<table class='color-a-w'>
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
                <td><input name='".$nombreProducto."' type='number' value='".cantidadSel($nombreProducto)."' min='0' max='99'></td>
            </tr>
            ";
        next($productos);
        }
        echo "
        </table>
        <input type='submit' value='Generar factura'>
        ";
        reset($productos);
    } //fin imprimirLista

    function generarFactura($productos){
        $precioTotalGeneral = array();

        $productosCompra = array();
        foreach ($_GET as $producto => $cantidad) {
            if($cantidad != 0){
                $productosCompra[$producto] = $_GET[$producto];
            }
        }
        if(!empty($productosCompra)){
            echo
            "
            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio unitario</th>
                    <th>Precio total</th>
                </tr>
            ";

            for ($i=0; $i < count($productosCompra); $i++) { 
               $nombre = key($productosCompra);
               $cantidad = $productosCompra[key($productosCompra)];
               $precioUnitario = $productos[key($productosCompra)];
               $precioTotal = $precioUnitario * $cantidad;
               
               array_push($precioTotalGeneral, $precioTotal);

               if(!empty($productosCompra[$nombre])){
                echo
                "
                <tr>
                    <td>".ucfirst($nombre)."</td>
                    <td>$cantidad</td>
                    <td>$precioUnitario</td>
                    <td>$precioTotal</td>
                </tr>
                ";
               }
            }
            echo
            "
                <tr>
                    <th colspan='3'>TOTAL</th>
                    <th>".array_sum($precioTotalGeneral)."</th>
                </tr>
            </table>
            ";
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/generales.css">
    <link rel="stylesheet" href="../css/10.clase.css">
    <title>Document</title>
</head>
<body>
    <div class="container limit-width-120">
        <form action="10.5.clase.php" method="get">
            <?php imprimirLista($productos); ?>
            <?php generarFactura($productos); ?>
        </form>
    </div>
</body>
</html>