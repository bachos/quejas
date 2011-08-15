<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin t&iacute;tulo</title>
<link href="../css/intratec.css" rel="stylesheet" type="text/css" />
</head>
<script language="javascript">
var nav4 = window.Event ? true : false;
function acceptltr(evt)
{
	var key = nav4 ? evt.which : evt.keyCode;
	return (key == 8 || key == 13 || key == 209 || key == 241 || key == 32 || key == 0 || key == 46 || (key >= 65 && key <= 90) || (key >= 97 && key <= 122));
}

function acceptltrb(evt)
{
	var key = nav4 ? evt.which : evt.keyCode;
	return (key == 8 || key == 13 || key == 209 || key == 241 || key == 32 || key == 0 || key == 46 || (key >= 65 && key <= 90) || (key >= 97 && key <= 122)|| (key >= 48 && key <= 57));
}

function verifica()
{
	chktrue = false;
	if(document.getElementById("name").value == "")
		alert("Favor de Introducir su nombre");
		else if(document.getElementById("mail").value == "")
			alert("Favor de introducir el e-mail a donde se enviara la respuesta a su duda o comentario");
			else if(document.getElementById("coment").value == "")
				alert("Introducir el comentario");
			else if(document.getElementById("asunto").value == "")
			    alert("Introduzca el asunto");
				else
				chktrue = true;
				
	return chktrue;
}
</script>

<body>
<form method="post" id="fconctac" name="fcontac" onsubmit="return verifica()" action="mailcontac.php">
	<div id="header"></div><!-- Div que contiene el encabezado de la pagina -->
    <div id="content"><!-- Id content que contiene toda la estructura de la pagina -->
   	  <table width="684" border="0" cellpadding="0" cellspacing="0">
        <tr height="24">
          <td class="textboldright">&nbsp;</td>
          <td>&nbsp;</td>
          <td> <div align="left">Los campos especificados con * son obligatorios </div></td>
        </tr>
        <tr height="24">
          <td class="textboldright">&nbsp;</td>
          <td>&nbsp;</td>
          <td>&nbsp;</td>
        </tr>
        <tr height="24">
            <td width="82" class="textboldright">*Nombre:</td>
            <td width="4">&nbsp;</td>
            <td width="598">
              <table width="588" border="0">
                <tr>
                  <td width="268"><input name="name" type="text" class="campotexto" id="name" onkeypress="return acceptltr(event)" size="50" maxlength="75" /></td>
                </tr>
              </table>          </td>
        </tr>
          <tr height="24">
            <td class="textboldright">*E-mail:</td>
            <td>&nbsp;</td>
            <td><table width="590" border="0">
                <tr>
                  <td width="267"><input name="mail" type="text" class="campotexto" id="mail" size="40" maxlength="100" /></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td class="textboldright">*Tel&eacute;fono:</td>
            <td>&nbsp;</td>
            <td><table width="465" border="0">
                <tr>
                  <td width="459"><input name="tel" type="text" class="campotexto" id="tel" value="" size="15" />
                </tr>
              </table></td>
          </tr>
          <tr>
            <td class="textboldright">*N&uacute;mero de Control:</td>
            <td>&nbsp;</td>
            <td><table width="465" border="0">
                <tr>
                  <td width="177"><input name="nocontrol" type="text" class="campotexto" id="nocontrol" onkeypress="return acceptltrb(event)" size="20" maxlength="10" /></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td class="textboldright">*Carrera:</td>
            <td>&nbsp;</td>
            <td><table width="465" border="0">
                <tr>
                  <td width="459"><input name="esp" type="text" class="campotexto" id="esp" value="" size="60" />
                </tr>
              </table></td>
          </tr>
          <tr>
          <tr>
            <td class="textboldright">*Asunto:</td>
            <td>&nbsp;</td>
            <td><table width="465" border="0">
                <tr>
                  <td width="459"><input name="asunto" type="text" class="campotexto" id="asunto" value="" size="97" />
                  
                </tr>
              </table></td>
          </tr>
          <tr>
            <td class="textboldright">&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <td class="textboldright">*Comentario:</td>
            <td>&nbsp;</td>
            <td><label>
              <textarea name="coment" cols="95" rows="5" class="campotexto" id="coment"></textarea>
            </label></td>
          </tr>
          <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
          </tr>
          <tr height="28">
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="right">
            	<input name="btncontac" type="image" class="btnlogin" id="btncontac" src="../images/ok.png" />&nbsp;&nbsp;&nbsp;&nbsp;            </td>
          </tr>
      </table>
    </div> 
    <!-- Fin de id content -->
    <div id="footer"></div> <!-- Div que contiene el pie de la estructura de la pagina -->
</form>
</body>
</html>
