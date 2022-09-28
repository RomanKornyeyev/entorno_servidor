<?php

    $nombre = $_GET['nombre'];
    $email = $_GET['email'];
    $ciudad = $_GET['ciudad'];
    $telefono = $_GET['telefono'];
    $empresa = $_GET['empresa'];
    $responsable = $_GET['responsable'];
    $fecha = $_GET['fecha'];
    $envio = false;
    $error = false;

    
    if(isset($_GET['nombre']) || isset($_GET['empresa']) || isset($_GET['responsable']) || isset($_GET['fecha'])
    || isset($_GET['email']) || isset($_GET['ciudad']) || isset($_GET['telefono'])){
        if($nombre == "" || $empresa == "" || $responsable == "" || $fecha == ""
        || $email == "" || $ciudad == "" || $telefono == ""){
            $error = true;
        }else{
            $envio = true;
        }
        
    }


    ob_end_clean();
    require('pruebas/fpdf184/fpdf.php');
    require('cartaPdf.php');

    if($envio){
        
        $pdf = new PDF();
   
        $pdf->SetTitle($title);
        $pdf->SetAuthor('Roman');
        $pdf->AddPage();
        $pdf->PrintBody($nombre, $empresa, $responsable, $fecha, 'practica_10.txt');

        $pdf->Output();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="./js/scrollreveal-lib.js"></script>
    <script src="./js/scrollreveal.js" defer=""></script>
    <link rel="stylesheet" href="./css/estilo_10.css">
    <title>Generar PDF</title>
</head>
<body>
    <div class="container">
        <div class="central">
            <h1 class="titulo">Generador de PDF</h1>
            <form class="formulario" action="" method="get">
                <ul class="form-ul">
                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="nombre" id="nombre" value="<?= $nombre ?>" placeholder="Introduce tu NOMBRE">
                        <label class="label-lane" for="nombre"></label> 
                    </li>

                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="email" id="email" value="<?= $email ?>" placeholder="Introduce tu EMAIL">
                        <label class="label-lane" for="email"></label> 
                    </li>
                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="ciudad" id="ciudad" value="<?= $ciudad ?>" placeholder="Introduce tu CIUDAD">
                        <label class="label-lane" for="ciudad"></label> 
                    </li>
                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="telefono" id="telefono" value="<?= $telefono ?>" placeholder="Introduce la TÉLEFONO">
                        <label class="label-lane" for="telefono"></label> 
                    </li>

                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="empresa" id="empresa" value="<?= $empresa ?>" placeholder="Introduce la EMPRESA">
                        <label class="label-lane" for="empresa"></label> 
                    </li>
                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="responsable" id="responsable" value="<?= $responsable ?>" placeholder="Introduce tu RESPONSABLE">
                        <label class="label-lane" for="responsable"></label> 
                    </li>
                    <li class="form-ul-li">
                        <input class="input input-text" type="date" name="fecha" id="fecha" value="<?= $fecha ?>" placeholder="Introduce la FECHA">
                        <label class="label-lane" for="fecha"></label> 
                    </li>
                </ul>

                <button class="button" type="submit">GENERAR</button>
            </form>
            <?php if ($error) { ?>
                <h3 class="error-message">ERROR: rellena todos los campos</h3>
            <?php } ?>
        </div>
    </div>
</body>
</html>