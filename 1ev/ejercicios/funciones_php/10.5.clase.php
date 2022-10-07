<!-- 5. Mario, Jason, Daniel -->
<?php 

    //Con el siguiente array de productos, crea una lista de la compra en la que puedas seleccionar la cantidad de productos que quieres adquirir y te muestre el precio total por producto y el total de la factura:
    $productos = [
        "naranja" => 1.2,
        "manzana" => 1.5,
        "pera" => 1.8,
        "platano" => 0.8,
        "kiwi" => 0.75,
        "macarrones" => 0.5,
        "arroz" => 0.75,
        "salchichas" => 1,
        "patatas_fritas" => 3,
        "paninis" => 1.5,
        "leche_6_uds" => 5,
        "pizza_jamon_serrano" => 2.59,
        "helado_chocolate" => 2.99
    ];

    //Genera una página para que el usuario introduzca qué productos quiere comprar en un textarea. El usuario los introducirá juntos, separados por comas y todos los productos que quiere comprar estarán en el array de producto.


    function imprimirLista($productos) {
        ?>
            <table>
                <caption>Lista de productos</caption>
                <tr>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
                <?php for ($i = 0; $i < sizeof($productos); $i++) { ?>
                    <tr>
                        <?php
                            $nombreProducto = key($productos);
                            $precioProducto = $productos[$nombreProducto];
                        ?>
                        <td><?= ucfirst($nombreProducto) ?></td>
                        <td class="precio"><?= $precioProducto ?>€</td>
                        <td><input type="number" name ="<?= $nombreProducto ?>" value="<?= empty($_GET) ? 0 : $_GET[$nombreProducto] ?>" min="0" max="99"></td>
                    </tr>
                <?php next($productos); } ?>
            </table>
            <input type="submit" value="Generar factura">
        <?php reset($productos); }
            function generarFactura($productos) {
                $precioTotalGeneral = array();
        
                $productosCompra = array();
                foreach ($_GET as $producto => $cantidad) {
                    if ($cantidad != 0) {
                        $productosCompra[$producto] = $_GET[$producto];
                    }
                }
                if (!empty($productosCompra)) {
        ?>
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio unitario</th>
                        <th>Precio total</th>
                    </tr>
                    <?php for ($i = 0; $i < sizeof($productosCompra); $i++) {
                        $nombre = key($productosCompra);
                        $cantidad = $productosCompra[key($productosCompra)];
                        $precioUnitario = $productos[key($productosCompra)];
                        $precioTotal = $precioUnitario * $cantidad;
        
                        array_push($precioTotalGeneral, $precioTotal);
        
                        if (!empty($productosCompra[$nombre])) { ?>
                        <tr>
                            <td><?= ucfirst($nombre) ?></td>
                            <td class="precio"><?= $cantidad ?></td>
                            <td class="precio"><?= $precioUnitario ?></td>
                            <td class="precio"><?= $precioTotal ?></td>
                        </tr>
                        <?php } next($productosCompra); ?>
                    <?php } ?>
                    <tr>
                        <th colspan="3" class="precio">TOTAL</th>
                        <th class="precio"><?= array_sum($precioTotalGeneral) ?></th>
                    </tr>
                </table>
            <?php } ?>
<?php } ?>
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
        <?php generarFactura($productos); ?>
    </form>
</body>
</html>