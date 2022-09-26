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

    class PDF extends FPDF
    {
        //con vars globales
        function Header()
        {
            global $email;
            global $ciudad;
            global $telefono;
            global $nombre;
        
            $this->SetFont('Arial','B',15);
            $w = $this->GetStringWidth($nombre)+6;
            $this->SetX((210-$w)/2);
            $this->SetTextColor(68,114,196);
            $this->SetLineWidth(1);
            $this->Cell($w,9, utf8_decode($nombre),0,1,'C',false);
            $this->SetDrawColor(68,114,196);
            $this->Line(198,20,12,20);
            $this->Ln(5);

            $this->SetFont('Arial','U',12);
            $w_e = $this->GetStringWidth($email)+6;
            $this->SetX((210-$w_e)/2);
            $this->Cell($w_e,6, utf8_decode($email),0,1,'C',false);

            $this->SetFont('Arial','',12);
            $w_c = $this->GetStringWidth($ciudad)+6;
            $w_t = $this->GetStringWidth($telefono)+6;
            $w_s = $this->GetStringWidth('-')+6;
            $this->SetX((210-$w_c-$w_t-$w_s)/2);
            $this->Cell($w_c,6,utf8_decode($ciudad),0,0,'R',false);
            $this->Cell($w_s,6,utf8_decode('-'),0,0,'C',false);
            $this->Cell($w_t,6,utf8_decode($telefono),0,0,'L',false);
            $this->Ln(15);
        }
        
        function Footer()
        {
            $this->SetY(-15);
            $this->SetFont('Arial','I',8);
            $this->SetTextColor(128);
            $this->Cell(0,10,utf8_decode('Página '.$this->PageNo()),0,0,'C');
        }
        
        function Body($nombre, $empresa, $responsable, $fecha, $file)
        {
            $this->SetFont('Arial','',11);
            $this->Cell(190,6,utf8_decode($empresa.", ".$fecha),0,1,'J',false);
            $this->Ln(10);
            $this->Cell(190,6,utf8_decode("Estimado Sr. $responsable"),0,1,'J',false);
            $this->Ln(2);
            $txt = file_get_contents($file);
            $this->MultiCell(0,5,utf8_decode($txt),0,'J');
            $this->Ln(2);
            $this->Cell(190,6,utf8_decode("$nombre."),0,1,'J',false);
            
        }
        
        //con vars por parámetros
        function PrintBody($nombre, $empresa, $responsable, $fecha, $file)
        {
            $this->Body($nombre, $empresa, $responsable, $fecha, $file);
        }
    }
    
    $pdf = new PDF();
    
    
    $pdf->SetTitle($title);
    $pdf->SetAuthor('Roman');
    $pdf->AddPage();
    $pdf->PrintBody($nombre, $empresa, $responsable, $fecha, 'practica_10.txt');

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