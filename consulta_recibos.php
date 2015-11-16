<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<center>
<h3><strong>Para consultar su recibo de pago escriba su numero de documento de identidad:</strong></h3>
<form id="form1" name="form1" method="post" action="consulta_recibos.php">
  <p>Numero de Documento: 
    <label for="documento"></label>
  <input name="documento" type="text" id="documento" size="20" maxlength="20" />
  <input type="submit" name="button" id="button" value="Consultar" />
  </p>
</form>
<?php
include("conex1.php");
$link=Conectarse();

$doc = $_POST["documento"];
$lista_recibos = mysql_query("SELECT * FROM `recibos` WHERE `identificacion` LIKE '%".$doc."%'",$link);

if ($_POST["documento"] != ""){
		echo "  <TABLE border=2><tr>
    <td>NOMBRE</td>
    <td>No IDENTIFICACIÓN</td>
    <td>RECIBO No</td>
    <td>PROGRAMA</td>
    <td>PERIODO</td>
    <td>NIVEL</td>
    <td>GRUPO</td>
    <td>CARNE</td>
    <td>VALOR</td>
    <td>DESCARGAR</td>
  </tr>";
while ($fila = mysql_fetch_array($lista_recibos)){
	
	echo "<tr><td>".$fila["nombre"]."</td><td>".$fila["identificacion"]."</td><td>".$fila["num_inscripcion"]."</td><td>".$fila["programa"]."</td><td>".$fila["periodo"]."</td><td>".$fila["nivel"]."</td><td>".$fila["grupo"]."</td><td>".$fila["carne"]."</td><td>".$fila["valor"]."</td><td><a href=\"".$fila["archivo"]."\">DESCARGAR</A></td>" ;
	
	}
echo "</TABLE>";
}


?>

<p><strong></strong></p></center>
</body>
</html>