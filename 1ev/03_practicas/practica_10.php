<?php

    $nombre = $_GET['nombre'];
    $empresa = $_GET['empresa'];
    $responsable = $_GET['responsable'];
    $fecha = $_GET['fecha'];
    $envio = false;
    $error = false;

    
    if(isset($_GET['nombre']) || isset($_GET['empresa']) || isset($_GET['responsable']) || isset($_GET['fecha'])){
        if($nombre == "" || $empresa == "" || $responsable == "" || $fecha == ""){
            $error = true;
        }else{
            $envio = true;
        }
    }


    ob_end_clean();
    require('pruebas/fpdf184/fpdf.php');

    class PDF extends FPDF
    {
        function Header()
        {
            global $title;
        
            $this->SetFont('Arial','B',15);
            $w = $this->GetStringWidth($title)+6;
            $this->SetX((210-$w)/2);
            $this->SetDrawColor(8, 253, 216);
            $this->SetFillColor(29, 29, 29);
            $this->SetTextColor(8, 253, 216);
            $this->SetLineWidth(1);
            $this->Cell($w,9,$title,1,1,'C',true);
            $this->Ln(10);
        }
        
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->SetTextColor(128);
            $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
        }
        
        function Section($campo, $var)
        {
            $this->SetFont('Arial','',12);
            $this->Cell(35,6,"$campo:",0,0,'L',false);
            $this->SetFont('Arial','B',12);
            $this->Cell(50,6,"$var",0,0,'L',false);
            $this->Ln();
        }
        
        function PrintSection($campo, $var)
        {
            $this->Section($campo, $var);
        }
    }
    
    $pdf = new PDF();
    
    $title = 'Carta de recomendacion';
    $pdf->SetTitle($title);
    $pdf->SetAuthor('Roman');
    $pdf->AddPage();
    $pdf->PrintSection('Nombre', $nombre);
    $pdf->PrintSection('Empresa', $empresa);
    $pdf->PrintSection('Responsable', $responsable);
    $pdf->PrintSection('Fecha', $fecha);

    if($envio){
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
                        <input class="input input-text" type="text" name="nombre" id="nombre" value="<?= $nombre ?>" placeholder="Introduce tu NOMBRE">
                        <label class="label-lane" for="nombre"></label> 
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
                        <input class="input input-text" type="date" name="fecha" id="fecha" value="<?= $fecha ?>" placeholder="Introduce tu FECHA">
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