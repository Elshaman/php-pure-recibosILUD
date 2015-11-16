<?php 
//Posibles errores del sistema
function errores($id){
	$tit = 0;
	$mens = 0;
	switch ($id){
		case 1:
			$tit = "Error de Conexi&oacute;n";
			$mens = "Es posible que halla un problema en el servidor o el sistema no se encuentre disponible en este momento, ".
					"intente m&aacute;s tarde.";
		break;
		case 2:
			$tit = "Error del Sistema";
			$mens = "El sistema produjo un fallo, consulte con el administrador de la red.";
		break;
		case 3:
			$tit = "Error de Comprobaci&oacute;n";
			$mens = "Si está intentando enviar un formulario puede ser que el registro ya exista, o  posiblemente hayan ".
					"dígitos no permitidos entre los datos suministrados. Intente  corregirlos y envíe nuevamente.";
		break;
		case 4:
			$tit = "Sesi&oacute;n Expirada";
			$mens = "Unicamente los usuarios con permiso, pueden hacer uso de este sistema.".
					"Verifique que su usuario sea el correcto, que los datos no contengan caracteres no validos ".
					"o talvez su sesi&oacute;n a expirado. Vuelva a ingresar.";
		break;
		case 5:
			$tit = "Acceso No Autorizado ";
			$mens = "Usted no es un usuario habilitado para usar esta herramienta. ".
					"Si es un usuario autorizado y no puede ingresar, consulte con el administrador.";
		break;
		case 6:
			$tit = "Error de Comprobaci&oacute;n";
			$mens = "Tal vez existan valores duplicados entre los datos suministrados, corrigalos e intente ".
					"enviar el formulario nuevamente.";
		break;	
		case 7:
			$tit = "Error de Comprobaci&oacute;n";
			$mens = "El documento que usted ingreso, no es un número valido. Corrigalo e intente ".
					"enviar el formulario nuevamente.";
		break;			
		case 8:
			$tit = "Error de Duplicaci&oacute;n";
			$mens = "El n&uacute;mero de consignaci&oacute;n ya se encuentra registrado, vuelva a intentarlo.";
		break;
		case 9:
			$tit = "Error de Selecci&oacute;n";
			$mens = "Debe de seleccionar SI en certificado o en la constancia, vuelva a intentarlo.";
		break;
		default:
			$tit = "No existe";
			$mens = "no hay un error de esos";
		break;				
	}
	$cadena = mensError($tit,$mens);
	return $cadena;
}


// Funcion para generar mensajes de error
function mensError ($titulo,$mensaje){
	$mgs = "<html><head><title>Error</title><link href='plantillas/plantilla.css' rel='stylesheet' type='text/css' /></head>".
			" <body><table width='600' border='0'><tr><td width='594' class='Error'> &nbsp; $titulo </td></tr><tr>".
			"<td class='dialogCont'> $mensaje &nbsp; <a href='javascript:history.back();' target='_self'>volver</a> </td></tr></table></body></html>";
	return $mgs;
}

?>