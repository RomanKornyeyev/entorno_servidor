<?php
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

?>