<?php
require_once('quejas.php');

$nombre = $_POST["name"];
$telefono = $_POST["tel"];
$mail = $_POST["mail"];
$coment = $_POST["coment"];
$nocontrol = $_POST["nocontrol"];
$esp = $_POST["esp"];
$subject = $_POST["asunto"];

$pdfdoc = generaPDF($nombre, $telefono, $mail, $coment, $nocontrol, $esp);

$attachment = chunk_split(base64_encode($pdfdoc));

$to = 'quejas_y_sugerencias@it-acapulco.edu.mx'; 
//define the subject of the email 
//create a boundary string. It must be unique 
//so we use the MD5 algorithm to generate a random hash 
$mensaje .= "Nombre: $nombre \n ";
$mensaje .= "No. de Control: $nocontrol \n "; 
$mensaje .= "Especialidad: $esp \n ";
$mensaje .= "Mail: $mail \n \n";
$mensaje .= "Asunto:$asunto \n \n";
$mensaje .= "Sugerencia y/o Comentario: $coment \n";

$random_hash = md5(date('r', time())); 
//define the headers we want passed. Note that they are separated with \r\n 
$headers = "From: ".$mail."\r\nReply-To: ".$mail; 
//add boundary string and mime type specification 
$headers .= "\r\nContent-Type: multipart/mixed; boundary=\"PHP-mixed-".$random_hash."\""; 

ob_start(); //Turn on output buffering 
?> 
--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: multipart/alternative; boundary="PHP-alt-<?php echo $random_hash; ?>" 

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/plain; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit
<?php echo $mensaje; ?>

--PHP-alt-<?php echo $random_hash; ?>  
Content-Type: text/html; charset="iso-8859-1" 
Content-Transfer-Encoding: 7bit

<h2>Sugerencia y/o Comentario!</h2> 
<p>Nombre: <b><?php echo $nombre; ?></b>.</p>
<p>No de Control: <b><?php echo $nocontrol; ?></b>.</p> 
<p>Carrera: <b><?php echo $esp; ?></b>.</p>
<p><b>Descarge el Archivo Adjunto</b></p>

--PHP-alt-<?php echo $random_hash; ?>-- 

--PHP-mixed-<?php echo $random_hash; ?>  
Content-Type: application/pdf; name="quejays.pdf"  
Content-Transfer-Encoding: base64  
Content-Disposition: attachment  

<?php echo $attachment; ?> 
--PHP-mixed-<?php echo $random_hash; ?>-- 

<?php 
//copy current buffer contents into $message variable and delete current output buffer 
$message = ob_get_clean(); 
//send the email 
$mail_sent = @mail( $to, $subject, $message, $headers ); 
//if the message is sent successfully print "Mail sent". Otherwise print "Mail failed" 
//echo $mail_sent ? "Mail sent" : "Mail failed"; 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href="../css/intratec.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="header"></div>
<div id="content">
<table width="700" border="0" cellpadding="0" cellspacing="0">
  <tr>
    <td width="110" align="center"><img src="../images/ok2.png" /></td>
    <td width="10">&nbsp;</td>
    <td width="560" class="textboldleft">Su mensaje ha sido enviado satisfactoriamente, responderemos su duda o comentario a la brevedad posible.</td>
  </tr>
  <tr>
    <td align="center">&nbsp;</td>
    <td>&nbsp;</td>
    <td align="right"><a href="/">Pagina del ITA</a></td>
  </tr>
</table>

</div>
<div id="footer"></div>
</body>
</html>
