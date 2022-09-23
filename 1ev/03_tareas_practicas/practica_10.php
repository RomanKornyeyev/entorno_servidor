<?php

    $nombre = $_GET['nombre'];
    $empresa = $_GET['empresa'];
    $responsable = $_GET['responsable'];
    $fecha = $_GET['fecha'];
    $envio = false;

    
    if($nombre != "" && $empresa != "" && $responsable != "" && $fecha != ""){
        $envio = true;
    }


    ob_end_clean();
    require('pruebas/fpdf184/fpdf.php');
    // Instantiate and use the FPDF class 
    $pdf = new FPDF();
                
    //Add a new page
    $pdf->AddPage();

    // Set the font for the text
    $pdf->SetFont('Arial', 'B', 18);

    // Prints a cell with given text 
    $pdf->Cell(0,20,'Carta de recomendación', 1, 0, 'C');
    $pdf->Ln();
    $pdf->Ln();

    $pdf->SetFont('Arial', 'B', 14);
    $pdf->Cell(0,20,"Nombre: $nombre");
    $pdf->Ln();
    $pdf->Cell(0,20,'Empresa:');
    $pdf->Ln();
    $pdf->Cell(0,20,'Responsable:');
    $pdf->Ln();
    $pdf->Cell(0,20,'Fecha:');

    if($envio){
        // return the generated output
        $pdf->Output();
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
                        <input class="input input-text" type="text" name="nombre" id="" value="<?= $nombre ?>" placeholder="Introduce tu NOMBRE">
                        <label class="label-lane" for="nombre"></label> 
                    </li>
                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="empresa" id="" value="<?= $empresa ?>" placeholder="Introduce la EMPRESA">
                        <label class="label-lane" for="empresa"></label> 
                    </li>
                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="responsable" id="" value="<?= $responsable ?>" placeholder="Introduce tu RESPONSABLE">
                        <label class="label-lane" for="responsable"></label> 
                    </li>
                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="fecha" id="" value="<?= $fecha ?>" placeholder="Introduce tu FECHA">
                        <label class="label-lane" for="fecha"></label> 
                    </li>
                </ul>

                <button class="button" type="submit">GENERAR</button>
            </form>
        </div>
    </div>
</body>
</html>