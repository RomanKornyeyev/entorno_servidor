<?php

    $nombre = $_GET['nombre'];
    $empresa = $_GET['empresa'];
    $responsable = $_GET['responsable'];
    $fecha = $_GET['fecha'];
    $envio = false;
    $error = false;


    if($nombre != "" && $empresa != "" && $responsable != "" && $fecha != ""){
        $envio = true;
    }else{
        $error = true;
    }


    ob_end_clean();
    require('pruebas/fpdf184/fpdf.php');

    // $pdf = new FPDF();
                
    // $pdf->AddPage();
    // $pdf->SetFont('Arial', 'B', 18);
    // $pdf->Cell(0,20,'Carta de recomendacion', 1, 0, 'C');
    // $pdf->Ln();
    // $pdf->Ln();

    // $pdf->SetFont('Arial', 'B', 14);
    // $pdf->Multicell(0,15,"Nombre: $nombre" . "\nEmpresa: $empresa" . "\nResponsable: $responsable" . "\nFecha: $fecha");

    class PDF extends FPDF
    {
    function Header()
    {
        global $title;
    
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Calculamos ancho y posición del título.
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        // Colores de los bordes, fondo y texto
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(230,230,0);
        $this->SetTextColor(220,50,50);
        // Ancho del borde (1 mm)
        $this->SetLineWidth(1);
        // Título
        $this->Cell($w,9,$title,1,1,'C',true);
        // Salto de línea
        $this->Ln(10);
    }
    
    function Footer()
    {
        // Posición a 1,5 cm del final
        $this->SetY(-15);
        // Arial itálica 8
        $this->SetFont('Arial','I',8);
        // Color del texto en gris
        $this->SetTextColor(128);
        // Número de página
        $this->Cell(0,10,'Página '.$this->PageNo(),0,0,'C');
    }
    
    function ChapterTitle($num, $label)
    {
        // Arial 12
        $this->SetFont('Arial','',12);
        // Color de fondo
        $this->SetFillColor(200,220,255);
        // Título
        $this->Cell(0,6,"Capítulo $num : $label",0,1,'L',true);
        // Salto de línea
        $this->Ln(4);
    }
    
    function ChapterBody($file)
    {
        // Leemos el fichero
        $txt = file_get_contents($file);
        // Times 12
        $this->SetFont('Times','',12);
        // Imprimimos el texto justificado
        $this->MultiCell(0,5,$txt);
        // Salto de línea
        $this->Ln();
        // Cita en itálica
        $this->SetFont('','I');
        $this->Cell(0,5,'(fin del extracto)');
    }
    
    function PrintChapter($num, $title, $file)
    {
        $this->AddPage();
        $this->ChapterTitle($num,$title);
        $this->ChapterBody($file);
    }
    }
    
    $pdf = new PDF();
    $title = '20000 Leguas de Viaje Submarino';
    $pdf->SetTitle($title);
    $pdf->SetAuthor('Julio Verne');
    $pdf->PrintChapter(1,'UN RIZO DE HUIDA','20k_c1.txt');
    $pdf->PrintChapter(2,'LOS PROS Y LOS CONTRAS','practica_10.txt');

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
                        <input class="input input-text" type="text" name="nombre" id="nombre" value="<?= $nombre ?>" placeholder="Introduce tu NOMBRE" required>
                        <label class="label-lane" for="nombre"></label> 
                    </li>
                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="empresa" id="empresa" value="<?= $empresa ?>" placeholder="Introduce la EMPRESA" required>
                        <label class="label-lane" for="empresa"></label> 
                    </li>
                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="responsable" id="responsable" value="<?= $responsable ?>" placeholder="Introduce tu RESPONSABLE" required>
                        <label class="label-lane" for="responsable"></label> 
                    </li>
                    <li class="form-ul-li">
                        <input class="input input-text" type="text" name="fecha" id="fecha" value="<?= $fecha ?>" placeholder="Introduce tu FECHA" required>
                        <label class="label-lane" for="fecha"></label> 
                    </li>
                </ul>

                <button class="button" type="submit">GENERAR</button>
            </form>
            <?php if ($error) { ?>
                <!-- <h3 class="error-message">ERROR: rellena todos los campos</h3> -->
            <?php } ?>
        </div>
    </div>
</body>
</html>