<?php 

    // ========= CORRECCIÓN DE JORGE ===========

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

    //walkear el array y pintar nombres y precios (LISTA)
    function pintaOutInputs($precio, $nombre){
        echo "<span>$nombre ($precio €)</span> <input name='$nombre' type='number' value=0 min='0' max='99'><br>";
    }
    
    //walkear el array y pintar nombres y precios (FACTURA)
    function pintaFactura($filafactura){
        echo "<tr><td>$filafactura[0]</td><td>$filafactura[1]</td><td>$filafactura[2]</td><td>" .$filafactura[1]*$filafactura[2] . "</td></tr>";
    }
    
    //array_reduce (suma TOTAL)
    function total($acumulador, $filafactura){
        return $acumulador + $filafactura[1]*$filafactura[2];
    }
    
    $comprando = false;
    if(count($_GET)>0) {
        $comprando = true;
    
        //GET nos genera un array
        echo "<br>GET: ";
        print_r($_GET);
    
        //Solo los que tengan un número positivo
        $cantidad = array_filter($_GET, function ($v) {return $v > 0; } );
        echo "<br>Cantidad: ";
        print_r($cantidad);
    
        // Selecciona de la lista de productos los comprados
        $precios = array_intersect_key($productos, $cantidad);
        echo "<br>Obtén precios: ";
        print_r($precios);
    
        // Similar a ZIP: packs de <nombre>, <cantidad>, <precio>
        $factura = array_map(null, array_keys($cantidad), $cantidad, $precios);
        echo "<br>Cremallera: ";
        print_r($factura);
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        form > span {
            display: inline-block;
            width: 15em;
        }

        form > input[type='submit'] {
            margin-left: 15em;
        }

        table, td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <!-- !COMPRANDO (SI NO ENVÍA EL FORMULARIO) -->
    <?php if(!$comprando) { ?>
        <h1>¡¡¡Ofertas!!!</h1>
        <form>
            <?php array_walk($productos, 'pintaOutInputs') ?>
            <input type="submit" value="¡Compra!">
        </form>

    <!-- COMPRANDO (SI ENVÍA EL FORMULARIO) -->
    <?php } else { ?>
        <h1>¡¡¡Comprando!!!</h1>
        <table>
            <tr><td>Producto</td><td>Cantidad</td><td>Precio</td><td>Subtotal</td></tr>
            <?php array_walk($factura, 'pintaFactura') ?>
            <tr><td colspan=4><?= array_reduce($factura, 'total') ?></td></tr>
        </table>
        <a href="10.5.clase.php">Volver a calcular</a>
    <?php } ?>
</body>
</html>