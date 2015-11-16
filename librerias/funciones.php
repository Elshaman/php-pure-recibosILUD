<?php
function Conectar(){
	$conector = mysql_pconnect ("10.20.1.253", "servidorilud", "adminilud");
	return $conector;
	}

function Dia_Semana($diaFecha) {
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("bdilud")
		or die ("Fun: No se puede seleccionar la base de datos");
	$sql = "SELECT DAYOFWEEK( '$diaFecha' )";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	$cursor = mysql_fetch_row($consulta);
	return $cursor[0];
	mysql_close($conexion);
}

function ExistSesion ($newFecha,$newHora) {
	$conexion = Conectar()
		or die ("Fun: No se puede conectar con el servidor");
	mysql_select_db ("bdilud")
		or die (errores(1));
	$sql = "SELECT * FROM sesiones WHERE Fecha_sesion = '$newFecha' AND Hora_sesion = '$newHora' ";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	$num = mysql_num_rows($consulta);
	mysql_close($conexion);
	if ($num==0)
		return true;
	else 
		return false;
}
//determina cuantos cupos quedan disponibles
function numRegistros ($indice,$cupo,$tabla,$campo){
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("bdilud")
		or die (errores(1));
	$sql = "SELECT * FROM $tabla WHERE $campo =$indice";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	$num = mysql_num_rows($consulta);
	mysql_close($conexion);
	$num = $cupo - $num;
	return $num;
}
function cancelaron ($id_grupo){
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("bdilud")
		or die (errores(1));
	$sql = "SELECT * FROM matricula_grupo ".
           "JOIN matriculas ON matriculas.id_matricula = matricula_grupo.id_matricula ".
           "WHERE id_grupo = '$id_grupo' AND consig_carne = '2'";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	$pagaron = mysql_num_rows($consulta);
	mysql_close($conexion);
	return $pagaron;
}
function niveles ($nombre,$nivel) {
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("bdilud")
		or die (errores(2));
	$sql = "SELECT niveles.id_nivel, niveles.nivel FROM niveles WHERE Id_programa =$nivel ";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	$cadena = "<select name='$nombre'  ><option value = '0'>--</option>";
	while($cursor = mysql_fetch_row($consulta)){
		$cadena = $cadena."<option value='$cursor[0]'>$cursor[1]</option>";	
	}
	$cadena = $cadena."</select>";
	mysql_close($conexion);
	return $cadena;
}
function siExiste ($tabla,$campo,$valor){
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("bdilud")
		or die (errores(1));
	$sql = "SELECT * FROM $tabla WHERE $campo =$valor ";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(3));
	$num = mysql_num_rows($consulta);
	mysql_close($conexion);
	return $num;
}
//funcion para determinar si ya se encuentra un estudiante inscrito en una sesion
function verInscritos($prog,$doc,$sesion){
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("bdilud")
		or die (errores(1));
	$sql = " SELECT * FROM estudiante_sesion WHERE (id_estudiante = $doc AND id_sesion = $sesion) ".
			"OR (id_estudiante = $doc AND id_programa = $prog)";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	$num = mysql_num_rows($consulta);
	mysql_close($conexion);
	return $num;
}
function contadorReg($tabla){
	$conexion = Conectar()
		or die ("No se puede conectar con el servidor");
	mysql_select_db ("bdilud")
		or die (errores(1));
	$sql = "SELECT * FROM $tabla";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	$num = mysql_num_rows($consulta);
	mysql_close($conexion);
	return $num;
}
function indiceGrupo ($num,$nivel){
	$numt = numBimestre();
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("bdilud")
		or die (errores(2));
	$sql = "SELECT id_grupo FROM grupo WHERE numero =$num AND id_grupo LIKE '$numt$nivel%' ";
	$consulta = mysql_query ($sql, $conexion)
		or die ($sql);
	$cursor = mysql_fetch_row($consulta);
	mysql_close($conexion);
	return $cursor[0];	
}
//genera un numero de matricula consecutivo que se debe cambiar para cada bimestre de matricula
function numeroMatricula($num){
	$contMatricula;
	$numb = numBimestre();
	if($num <10 ) $contMatricula = "2120000".$num;
	else if($num <100 ) $contMatricula = "212000".$num;
	else if($num <1000 ) $contMatricula = "21200".$num;
	else if($num <10000 ) $contMatricula = "2120".$num;
	else $contMatricula = $numb.$num;
	return $contMatricula;
}
       //funcion para generar listas de opciones
function crearCombo ($tabla,$nombre,$selec){
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("bdilud")
		or die (errores(2));
	$sql = "SELECT * FROM $tabla ";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	$cadena = "<select name='$nombre' class='texto' ><option value = '0'>--</option>";
	$cont = 0;
	while($cursor = mysql_fetch_row($consulta)){
	$cont++;
		if ($selec == $cont)
			$cadena = $cadena."<option value='$cursor[0]' selected='selected' >$cursor[1]</option>";
                else if ($selec == 20)
			$cadena = $cadena."<option value='$cursor[0]' selected='selected' >$cursor[1]</option>";
		else 
			$cadena = $cadena."<option value='$cursor[0]' >$cursor[1]</option>";	
	}
	$cadena = $cadena."</select>";
	mysql_close($conexion);
	return $cadena;
}
//funcion para establecer el numero de busqueda del bimestre se debe cambiar cada bimestre
function numBimestre(){
	return 212;
}
//funcion que retorna el total de matriculas por bimestre
function totalMatriculas($actual, $bimestre){
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("bdilud")
		or die (errores(2));
	$sql = "SELECT * FROM matriculas WHERE fecha_matricula LIKE '$actual%' AND id_periodo = '$bimestre' ";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	//mysql_close($conexion);
	return mysql_num_rows($consulta);
}
//funcion para generar listas de opciones DISTRITO
function crearComboDistrito ($tabla,$nombre,$selec){
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("distrito")
		or die (errores(2));
	$sql = "SELECT * FROM $tabla ";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	$cadena = "<select name='$nombre' class='texto' ><option value = '0'>--</option>";
	$cont = 0;
	while($cursor = mysql_fetch_row($consulta)){
	$cont++;
		if ($selec == $cont)
			$cadena = $cadena."<option value='$cursor[0]' selected='selected' >$cursor[1]</option>
";
		else 
			$cadena = $cadena."<option value='$cursor[0]' >$cursor[1]</option>
";	
	}
	$cadena = $cadena."</select>";
	mysql_close($conexion);
	return $cadena;
}
//valor
function valorSQL($campo){
	if($campo=="")
		$campo = "NULL";
	else
		$campo = "'$campo'";
	return $campo;
}

//nombre del bimestre buscado
function nomBimestre($varBim){
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("bdilud")
		or die (errores(2));
	$sql = "SELECT * FROM periodo WHERE id_periodo = '$varBim' ";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	$cursor = mysql_fetch_row($consulta);
	mysql_close($conexion);
	return $cursor[1];
}
//nombre del nivel buscado
function nomNivel($varNiv){
	$conexion = Conectar()
		or die (errores(1));
	mysql_select_db ("bdilud")
		or die (errores(2));
	$sql = "SELECT * FROM niveles WHERE id_nivel = '$varNiv' ";
	$consulta = mysql_query ($sql, $conexion)
		or die (errores(2));
	$cursor = mysql_fetch_row($consulta);
	mysql_close($conexion);
	return $cursor[1];
}
function sumaDia($fecha,$dia)
{	list($year,$mon,$day) = explode('-',$fecha);
	return date('Y-m-d',mktime(0,0,0,$mon,$day+$dia,$year));
	//echo sumaDia('2008-01-30',5);
        //salida: 2008-02-04
       //echo sumaDia('2008-01-30',-1);
       //salida: 2008-01-29		
}
function con_registro_recibo($configuracion,$codigoBarras,$id_estudiante,$NoMatricula,$Valor,$Fecha, $extra = false)
{ 
	//$configuracion es un arreglo. se espera que tenga dos posiciones: "raiz_documento" y "grafico"
	//$codigoBarras es un objeto de la clase codigoBarras
	//$id_estudiante es el codigo del estudiante
	//$NoMatricula es el n�mero del recibo
	//$valor Valor a pagar
	//$fecha AAAAMMDD
	
	
	$funcion1="FN";
	$ia1='415';
	$ia2='8020';
	$ia3='3900';
	$ia4='96';
	$codigoEstudiante= str_pad($id_estudiante, 12, "0", STR_PAD_LEFT);	//12 Digitos
	$codigoConsecutivo=  str_pad(substr($NoMatricula, 3), 6, "0", STR_PAD_LEFT);     	 //6 Digitos
	//$codigoConsecutivo= '0'.$NoMatricula;     	 //8 Digitos
	$codigoInstitucion='0000000011901'; 	             //13 Digitos
	//$valorPagar= str_pad($Valor, 10, "0", STR_PAD_LEFT); //10 Digitos
	$valorPagar= str_pad($Valor, 10, "0", STR_PAD_LEFT); //10 Digitos
	list($year,$mon,$day) = explode('-',$Fecha);
	$fechaPago = date('Ymd',mktime(0,0,0,$mon,$day,$year)); //8 Digitos yyyymmdd
	//Generar la imagen del codigo de barras
	$codigo=$funcion1;
	$codigo.=$ia1;
	$codigo.=$codigoInstitucion;
	$codigo.=$ia2;
	$codigo.=$codigoEstudiante;
	$codigo.=$codigoConsecutivo;
	$codigo.=$funcion1;
	$codigo.=$ia3;
	$codigo.=$valorPagar;
	$codigo.=$funcion1;
	$codigo.=$ia4;
	$codigo.=$fechaPago;
	generarCodigoBarras($codigoBarras, $codigo, $configuracion, $NoMatricula, $extra);
}
function generarCodigoBarras($codigoBarras, $codigo, $configuracion, $NoMatricula, $extra)
{
	$codigoBarras->altoSimbolo(55);
	//$bar->setFont("arial");
	$codigoBarras->escalaSimbolo(0.5);
	$codigoBarras->colorSimbolo("#000000","#FFFFFF");

	if($extra == true)
	{
		$return = $codigoBarras->generar($codigo,'png',"codigos_barras/".$NoMatricula."_EXT");	
	}else
	{
		$return = $codigoBarras->generar($codigo,'png',"codigos_barras/".$NoMatricula);	
	}
	 
	if($return==false)
	{
		$codigoBarras->error(true);
	}
} 
?>