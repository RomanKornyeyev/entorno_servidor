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
        "<table class='color-white-1 width-100'>
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
            <table class='color-white-1 width-100'>
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
                    <td class='align-right'>$cantidad</td>
                    <td class='align-right'>$precioUnitario</td>
                    <td class='align-right'>$precioTotal</td>
                </tr>
                ";
               }
            }
            echo
            "
                <tr>
                    <th colspan='3'>TOTAL</th>
                    <th class='align-right'>".array_sum($precioTotalGeneral)."</th>
                </tr>
            </table>
            ";
        }
    }
    
?>