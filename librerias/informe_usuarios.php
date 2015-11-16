<?php 
function ins_informe($inf)
{	switch ($inf){
		case 1:
		   //consulta para insertar informe en la base de datos
			$enunciado = $grupo."cambio al # de matricula ".$numMat." al grupo ".$indGrupo;
		   	$sql = 	"INSERT INTO informes ( reporte , fecha_informe, hora_informe, ide_usuario ) ".
			"VALUES ( '$enunciado' , NOW(), NOW(), '$usuario' )";
			//INSERT INTO informes VALUES ('otra cosa', NOW( ) , NOW( ) , 'CAMBIO');					
			$consulta = mysql_query ($sql, $conexion)
				or die (errores(3));
			mysql_close($conexion);
		break;
		/*case 2:
			$tit = "Error del Sistema";
			$mens = "El sistema produjo un fallo, consulte con el administrador de la red.";
		break;
		
		default:
			$tit = "No existe";
			$mens = "no hay un error de esos";
		break;				*/
	}	
?>
