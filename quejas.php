<?php
require('pdf/fpdf.php');

$fecha = date('d/m/y');
class PDF extends FPDF
{ 
   var $widths;
   var $aligns;
   
   function Header()
   {  
       $this->Rect(10,12,195,21);
       #$this->Image('../../imagenes/logotec.jpg',10,13,33);
       $this->Line(10,12,10,33);
       $this->Line(10,12,45,12);
       $this->Line(45,12,45,33);
       $this->Line(10,33,45,33);
       $this->Line(10,33,45,33);
 
       $this->SetFont('Arial','B',10);
       $this->SetY(12);
       $this->SetX(45);
       $this->multicell(105,12,'Nombre del Documento: Formato para Quejas o Sugerencias','1',1);
       $this->SetY(24);
       $this->SetX(45);
       $this->multicell(105,9,'Referencia a la Norma ISO 9001:2008 5.2, 7.2.3','1',1);
       $this->SetY(12);
       $this->SetX(150);
       $this->cell(55,6,'Código: SNEST-CA-PO-001-01',1,1);
       $this->SetY(18);
       $this->SetX(150);
       $this->cell(55,6,'Revisión: 3',1,1);
       $this->SetY(24);
       $this->SetX(150);
       $this->cell(55,9,'Pagina '.$this->PageNo().' de {nb}',1,1);
   }

   function Footer()
   {
      $this->SetY(-15);
      $this->SetX(10);
      $this->SetFont('Arial','',8);
      $this->cell(55,6,'SNEST-CA-PO-001-01',0,0);
      $this->SetY(-15);   
      $this->SetX(175);
      $this->cell(55,9,'Rev. 3',0,0);
   }
}

$pdf=new PDF('p','mm','Letter');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',9);
$y = $pdf->GetY() + 4;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->cell(55,6,'Fecha: '.$fecha,0,0);
$pdf->SetY($y);
$pdf->SetX(180);
$pdf->cell(55,6,'FOLIO:',0,0);

$mensaje = "Para validar su queja y/o sugerencia deberá requisitar los ";
$mensaje .= "siguientes datos que nos permita localizarlo y darle ";
$mensaje .= "respuesta, esta información sera CONFIDENCIAL.";

$y += 8;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->multicell(200,5,$mensaje,'0',1);
$y = $pdf->GetY() + 2;
$pdf->SetY($y);
$pdf->SetX(115);
$pdf->cell(80,6,'Correo Electrónico: ',0,1);
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->cell(80,6,'Nombre: ',0,1);
$y += 8;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->cell(120,6,"Tel.:",'0',1);
$y += 8;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->cell(120,6,"No. de Control:",'0',1);
$y += 8;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->cell(120,6,"Carrera:",'0',1);
$y += 16;
$pdf->SetY($y);
$pdf->SetX(10);

$w=$pdf->w - $pdf->lMargin - $pdf->rMargin;
$nb=$w/$pdf->GetStringWidth('-');
$dots=str_repeat('-',$nb);
$pdf->Cell($w,$pdf->FontSize+2,$dots,0,0,'R');

$pdf->Output();
?>
