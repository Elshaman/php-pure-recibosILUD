<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


include_once('Nivel.php');
include_once('Periodo.php');
include_once(dirname(dirname(dirname(__FILE__))) . "/DAL/conexion/DB.php");

include("conex2.php");
$link2=Conectarse2();

$seg_modalidad = mysql_query("SELECT * FROM seguimiento WHERE id_estudiante = '802484621'",$link2);

$ing_bim = 0;
$i = 0;

while ($fila = mysql_fetch_array($seg_modalidad)){
	
	if($fila["id_programa"] == 1){$ing_bim = 1; $estado[$i++] = 1;}
	
	if($fila["id_programa"] == 16){$ing_sem = 1; $estado[$i++] = 16;}
	
	if($fila["id_programa"] == 22){$ing_int = 1; $estado[$i++] = 22;}
}	
	
	
	if (($ing_bim==1 and $ing_sem=1) or ($ing_bim==1 and $ing_int==1) or ($ing_sem==1 and $ing_int==1)){
		echo "esta en modalidades compatibles <br> el ultimo cursado es ";
		echo end($estado);
	}else{
		echo "esta en modalidades diferentes";
		}

 

?>