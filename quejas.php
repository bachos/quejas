<?php
require('../pdf/fpdf.php');


class PDF extends FPDF
{ 
   var $widths;
   var $aligns;
   
   function Header()
   {  
       $this->Rect(10,12,195,21);
       $this->Image('../images/logotec.jpg',18,12,20);
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

function generaPDF($nombre, $telefono, $mail, $coment, $nocontrol, $esp )
{
$fecha = date('d/m/y');
$pdf=new PDF('p','mm','Letter');
$pdf->AddPage();
$pdf->AliasNbPages();
$pdf->SetFont('Arial','',9);
$y = $pdf->GetY() + 4;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->cell(60,6,'Fecha:     '.$fecha,0,0);
$pdf->Line(22,$y+5,75,$y+5);
$pdf->SetY($y);
$pdf->SetX(170);
$pdf->cell(55,6,'FOLIO:',0,0);
$pdf->Line(182,$y+5,200,$y+5);

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
$pdf->cell(80,6,'Correo Electrónico:   '.$mail,0,1);
$pdf->Line(144,$y+5,195,$y+5);
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->cell(180,6,'Nombre:   '.$nombre,0,1);
$pdf->Line(24,$y+5,110,$y+5);
$y += 8;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->cell(120,6,"Tel.:   ".$telefono,'0',1);
$pdf->Line(18,$y+5,60,$y+5);
$y += 8;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->cell(120,6,"No. de Control:   ".$nocontrol,'0',1);
$pdf->Line(33,$y+5,80,$y+5);
$y += 8;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->cell(120,6,"Carrera:   ".$esp,'0',1);
$pdf->Line(23,$y+5,125,$y+5);
$y += 12;
$pdf->SetY($y);
$pdf->SetX(10);
$w=$pdf->w - $pdf->lMargin - $pdf->rMargin;
$nb=$w/$pdf->GetStringWidth('-');
$dots=str_repeat('-',$nb);
$pdf->Cell($w,$pdf->FontSize+2,$dots,0,0,'R');
$pdf->SetFont('Arial','B',9);
$y += 12;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->Cell(120,6,"Describa su:",'0',1);
$pdf->SetY($y);
$pdf->SetX(150);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(120,6,"FOLIO:",'0',1);
$pdf->Line(162,$y+5,182,$y+5);
$y += 8;
$pdf->Rect(10,$y,195,40);
$pdf->SetY($y);
$pdf->SetX(93);
$pdf->Cell(120,6,"QUEJA  /  SUGERENCIA:",'0',2);
$pdf->Cell(194,6,$coment,'0',1);
$y += 44;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->Cell(120,6,"Fecha:",'0',1);
$pdf->Line(21,$y+5,75,$y+5);
$pdf->SetFont('Arial','B',9);
$y += 10;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->Cell(120,6,"Esta sección será llenada por el Subdirector Correspondiente.",'0',1);
$pdf->SetFont('Arial','',9);
$y += 8;
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->Cell(120,6,"Respuesta:",'0',1);
$y += 12;
$pdf->Line(10,$y,205,$y);
$y += 6;
$pdf->Line(10,$y,205,$y);
$y += 6;
$pdf->Line(10,$y,205,$y);
$y += 6;
$pdf->Line(10,$y,205,$y);
$y += 6;
$pdf->SetY($y);
$pdf->SetX(30);
$pdf->Cell(30,6,"ATENTAMENTE",'0',1);
$pdf->SetY($y);
$pdf->SetX(160);
$pdf->Cell(30,6,"RECIBIDO POR:",'0',1);
$y += 18;
$pdf->Line(10,$y,70,$y);
$pdf->Line(140,$y,205,$y);
$pdf->SetY($y);
$pdf->SetX(10);
$pdf->Cell(60,4,"Nombre y Firma",'0',2,'C');
$pdf->Cell(60,4,"Subdirector del área correspondiente",'0',1,'C');
$pdf->SetY($y);
$pdf->SetX(140);
$pdf->Cell(65,6,"Nombre y Firma",'0',1,'C');
$y += 10;
$pdf->SetY($y);
$pdf->SetX(140);
$pdf->Cell(7,6,"Fecha:",'0',0);
$y += 5;
$pdf->Line(151,$y,205,$y);

return $pdf->Output("", "S");
}
?>
