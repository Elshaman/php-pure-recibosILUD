<?php
session_start();

include("conex1.php");
$link=Conectarse();

$cedula=$_POST[cedula];
include_once("DAL/Modelos/Periodo.php");
include_once("DAL/Modelos/Programa.php");
include_once("DAL/Modelos/Matricula.php");
include_once("DAL/Modelos/Estudiante.php");
include_once("DAL/Modelos/Seguimiento.php");
include_once("DAL/Modelos/Grupo.php");
include_once("DAL/Modelos/Nivel.php");
include_once("librerias/codigoBarras.class.php");
include_once("librerias/funciones.php");
require('PDF_Invoice.php');
ini_set('default_charset', 'utf-8');
if (isset($_SESSION["olvidable"]) and $_SESSION["olvidable"] === 1) {
    header("Location: index_1.php");
}

if (count($_POST) == 0) {
    echo "<script languaje=\"javascript\">location.href=\"index_1.php\"; </script>";
    exit();
} elseif (!isset($_SESSION[$_POST[idprograma] . "recibos"])) {

    $_SESSION[$_POST[idprograma] . "recibos"] = 1;
} elseif ($_SESSION[$_POST[idprograma] . "recibos"] == 1) {
    echo "<script languaje=\"javascript\">location.href=\"index_1.php\"; </script>";
    exit();
}

$matriculita = new Matricula();

$numerogrupo = $matriculita->hallarNumeroGrupo($_POST["cadenagrupo"]);
//echo $numerogrupo.'  ';
$nivelgrupo = $matriculita->hallarNivelGrupo($_POST["cadenagrupo"]);
//echo $nivelgrupo.' ';
$indicegrupo = $matriculita->hallarIdGrupo($_POST["cadenagrupo"], $nivelgrupo);
//echo $indicegrupo;
$consigcarne = 1;
$refcarne = 0;
if (!$matriculita->siTieneCarne($_POST[cedula])) {
    //echo "no carne";
    $refcarne = 1;
    $valor_carne = 14000;
    $recibocarne = "SI";
} else {
    //echo "tiene carne";
    $refcarne = 0;
    $valor_carne = 0;
    $recibocarne = "NO";
}

if(comprobarCedula($link, $cedula))
{
	$refcarne = 0;
    $valor_carne = 0;
    $recibocarne = "NO";
	
}
$contador_matricula = $matriculita->ins_contador();
//echo "<hr>".$contador_matricula;
$numatricula = $matriculita->numeroMatricula($contador_matricula);


$fechamatricula = date("Y-m-d");
$periodo = new Periodo();
$idperiodo = $periodo->sel_periodo_Actual();
$recibonumeroperiodo = $periodo->sel_identificador_nivel();

//insercion matricula

function precios($idprograma, $idnivel, $link, $cedula) {
    $retorno_condicion_gratis = array(); //para los FCE
    $precio = 0;
    $condicion_gratis = 0;
    switch ($idprograma) {
        case 1:
		if ($idnivel == "E12" or $idnivel == "E13" or $idnivel == "E14")
		{
		if(comprobarCedula($link, $cedula))
			{
		       $precio = 99000;
                $condicion_gratis = 0;
			}else
			{
                $precio = 244000;
                $condicion_gratis = 0;
			}
       }else
			{
                $precio = 244000;
                $condicion_gratis = 0;
			}
       break;

        case 5:
		if ($idnivel == "K13" or $idnivel == "K15") {
		
                $precio = 244000;
                $condicion_gratis = 0;
            } else {
                $precio = 244000;
                $condicion_gratis = 0;
            }
            break;
			
        case 6:
		if ($idnivel == "P13" or $idnivel == "P14" or $idnivel == "P15" or $idnivel == "P16" or $idnivel == "P17") {
                $precio = 244000;
                $condicion_gratis = 0;
            } else {
                $precio = 244000;
                $condicion_gratis = 0;
            }
         
            break;
			
			case 30:
                $precio = 570000;
            break;

			case 31:
                $precio = 570000;
            break;
			
			case 32:
                $precio = 570000;
            break;			
			
			case 33:
                $precio = 570000;
            break;
			
			case 34:
                $precio = 244000;
            break;
			
			case 35:
                $precio = 305000;
            break;
			
			case 36:
                $precio = 305000;
            break;			
			
			case 37:
                $precio = 305000;
            break;
			
			case 38:
                $precio = 305000;
            break;			
			
        case 2: 
		if ($idnivel == "F12" or $idnivel == "F11")
		{
				if(comprobarCedula($link, $cedula))
				{
								       $precio = 142000;
									   $condicion_gratis = 0;
			   }
			   else	{
                	$precio = 305000;
                	$condicion_gratis = 0;
              }
       } else	{
                	$precio = 305000;
                	$condicion_gratis = 0;
               }
            break;

        case 3:
		if ($idnivel == "A12") {
               if(comprobarCedula($link, $cedula))
				{
								       $precio = 142000;
									   $condicion_gratis = 0;
			   }
			   else	{
                	$precio = 305000;
                	$condicion_gratis = 0;
              }
            } else {
                $precio = 305000;
                $condicion_gratis = 0;
            }
            break;
        case 10:
        case 12:
        case 14:
		 if(comprobarCedula($link, $cedula))
				{
								       $precio = 142000;
									   $condicion_gratis = 0;
			   }
			   else	{
                	$precio = 305000;
                	$condicion_gratis = 0;
              }
		
            break;
        case 4: 
		if ($idnivel == "I10" or $idnivel == "I11") {
                if(comprobarCedula($link, $cedula))
				{
								       $precio = 142000;
									   $condicion_gratis = 0;
			   }
			   else	{
                	$precio = 305000;
                	$condicion_gratis = 0;
               }
            } else {
                $precio = 305000;
                $condicion_gratis = 0;
            }
            break;


        case 7:$precio = 730000;
            $condicion_gratis = 0;
            break;
        case 11:
		if(comprobarCedula($link, $cedula))
				{
								       $precio = 188000;
									   $condicion_gratis = 0;
			   }
			   else	{
                	$precio = 457000;
                	$condicion_gratis = 0;
               }
		    break;
        case 16:
		if(comprobarCedula($link, $cedula))
				{
								       $precio = 188000;
									   $condicion_gratis = 0;
			   }
			   else	{
                	$precio = 457000;
                	$condicion_gratis = 0;
              }
            break;
        case 17:
		if(comprobarCedula($link, $cedula))
				{
								       $precio = 266000;
									   $condicion_gratis = 0;
			   }
			   else	{
                	$precio = 570000;
                    $condicion_gratis = 0;
        
              }
		    break;
        case 18:
	if(comprobarCedula($link, $cedula))
				{
								       $precio = 266000;
									   $condicion_gratis = 0;
			   }
			   else	{
                	$precio = 570000;
                    $condicion_gratis = 0;
        
               }
		    break;
        case 19:
		if(comprobarCedula($link, $cedula))
				{
								       $precio = 266000;
									   $condicion_gratis = 0;
			   }
			   else	{
                	$precio = 570000;
                    $condicion_gratis = 0;
        
              }
		
            break;
        case 21:
		if(comprobarCedula($link, $cedula))
				{
								       $precio = 266000;
									   $condicion_gratis = 0;
			   }
			   else	{
                	$precio = 570000;
                    $condicion_gratis = 0;
        
               }
		
            break;
        case 22:
		if(comprobarCedula($link, $cedula))
				{
								       $precio = 188000;
									   $condicion_gratis = 0;
			   }
			   else	{
                	$precio = 457000;
                    $condicion_gratis = 0;
        
               }
		
            break;
        case 23:
        case 24:
        case 25:
        case 26:
		if(comprobarCedula($link, $cedula))
				{
								       $precio = 266000;
									   $condicion_gratis = 0;
			   }
			   else	{
			        $precio = 570000;
                    $condicion_gratis = 0;
        
               }
		

            break;
        case 27:$precio = 457000;
            $condicion_gratis = 0;
            break;
        case 28:$precio = 457000;
            $condicion_gratis = 0;
            break;
		case 29:
		if(comprobarCedula($link, $cedula))
				{
								       $precio = 188000;
									   $condicion_gratis = 0;
			   }
			   else	{
		$precio = 457000;
                    $condicion_gratis = 0;
        
              }


            break;
    }

    $retorno_condicion_gratis[0] = $precio;
    $retorno_condicion_gratis[1] = $condicion_gratis;
    return $retorno_condicion_gratis;
}

//comprobar cedula
function comprobarCedula($link, $cedula) {

    $existe=false;
	
	$resultado = mysql_query('SELECT cedula FROM matriculados WHERE cedula='.$cedula,$link);
	if (!$resultado) {
    die('Consulta no válida: ' . mysql_error());
}else{
	$numero_filas = mysql_num_rows($resultado);
    if ($numero_filas>0) {
	$existe=true;
    
    }
}

    return $existe;
}

$arrvalormatricula = precios($_POST[idprograma], $_POST["nivel"], $link,$cedula);
$valor_matricula = $arrvalormatricula[0];

$fecha_const_matricula = $matriculita->sumaDia($fechamatricula, 1);
if ($arrvalormatricula[1] == 0) {


    $idmatricula = $matriculita->ins_matricula1($numatricula, $fechamatricula, $idperiodo, $_POST[idprograma], $nivelgrupo, $_POST[cedula], $valor_matricula, $fecha_const_matricula, $refcarne, $consigcarne, $valor_carne
    );
} else {
    $valor_carne = 0;
    $idmatricula = $matriculita->ins_matricula2($numatricula, $fechamatricula, $idperiodo, $_POST[idprograma], $nivelgrupo, $_POST[cedula], $valor_matricula, $fecha_const_matricula, 0, 1, 0
    );
}

$RegAno = date("Y");
$seguimiento = new Seguimiento();
$seguimiento->ins_seguimiento($idperiodo, $RegAno, $_POST[cedula], $_POST[idprograma], $nivelgrupo);

$matriculita->ins_mat_grupo($numatricula, $indicegrupo);
//echo "<hr />Matricula ins:".$idmatricula;

$grupo = new Grupo();
//$grupo->upd_cupos_grupo($indicegrupo);

$configuracion[0] = "/var/www/html/htdocs/comunidad/dependencias/ilud/recibos";
$configuracion[1] = "/fuentes/";
$codigoBarras = new codigoBarras($configuracion);
$valortotal = $valor_matricula + $valor_carne;
//echo $valortotal;
//$cadenatratarfechalimite = str_replace("-", "", $fecha_const_matricula);


con_registro_recibo($configuracion, $codigoBarras, "$_POST[cedula]", "$numatricula", "$valortotal", "$fecha_const_matricula");


$pdf = new PDF_Invoice('P', 'mm', 'letter');
$pdf->AddPage();
$pdf->SetLineWidth(0.1);

/* Line entrecortada
  $pdf->SetDash(1,1); //5mm on, 5mm off
  $pdf->Line(0,93,216,93);
  $pdf->SetDash(); */


$estudiante = new Estudiante();
$estudiante->sel_estudiante($_POST[cedula]);
$nombrecompletoestudiante = utf8_decode($estudiante->datosestudiante[Nombres] . " " . $estudiante->datosestudiante[Apellidos]);
$telefonoestudiante = $estudiante->datosestudiante[Telefono];


$programa = new Programa($estudiante->datosestudiante[Acu_nino]);
$nombreprograma = $programa->sel_nombre_programa($_POST[idprograma]);

$nivel = new Nivel();
$recibonombrenivel = $nivel->sel_nombre_nivel($nivelgrupo);


$grupo->sel_grupo($indicegrupo);

$reciboSede = $grupo->datosgrupo[Sede];
$recibohorario = $grupo->datosgrupo[dias] . " " . $grupo->datosgrupo[horas];


$pdf->SetDash(1, 1); //5mm on, 5mm off
$pdf->Line(0, 92.5, 216, 93);
$pdf->Line(0, 185, 216, 185);
$pdf->SetDash();


$cadena = "BANCO DE OCCIDENTE CUENTA 230864282";
$pdf->SetFont("Arial", "", 8);
$coorx = $longitud + 12;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 20);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "-ILUD-";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 6);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Instituto de lenguas de la";
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud + 28;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 10);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Universidad Distrital";
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 14);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "COMPROBANTE";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 63;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 6);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "DE PAGO";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 72;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 10);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "No " . $numatricula;
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 81;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 14);
$pdf->Cell($longitud, 2, $cadena);

$pdf->RoundedRect(10, 3, 200, 87, 5);
$pdf->Line(10, 23, 210, 23);


$cadena = "UNIVERSIDAD DISTRITAL";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 120;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 6);
$pdf->Cell($longitud, 2, $cadena);

$cadena = '"Fransico José de Caldas"';
$cadena = utf8_decode($cadena);
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 96;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 10);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "NIT 899.999.230.7";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 110;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 14);
$pdf->Cell($longitud, 2, $cadena);
//Nombre
$pdf->RoundedRect(12, 24, 196, 12, 1);
$y = 6;
$pdf->Line(12, 24 + $y, 208, 24 + $y);
$pdf->Line(50, 24, 50, 36);
$pdf->Line(145, 24, 145, 36);
$pdf->Line(186, 24, 186, 36);
//posicion der a izq,
$pdf->Line(103, 30, 103, 36);
$pdf->SetFont("Arial", "B", 10);
$longitud = $pdf->GetStringWidth("Nombre Estudiante:");
$pdf->SetXY(14, 26);
$pdf->Cell($longitud, 2, "Nombre Estudiante:");



$cadena = $nombrecompletoestudiante;
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud + 18;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 26);
$pdf->Cell($longitud, 2, $cadena);

$pdf->SetFont("Arial", "B", 10);
$longitud = $pdf->GetStringWidth("Descripcion:");
$pdf->SetXY(45, 40);
$pdf->Cell($longitud, 2, "Descripcion");
$pdf->SetXY(115, 40);
$pdf->Cell($longitud, 2, "Valor:");


$cadena = "Fecha de Expedicion:";
$pdf->SetFont("Arial", "B", 10);
$coorx = 147;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 26);
$pdf->Cell($longitud, 2, $cadena);

$cadena = str_replace('-', '/', $fechamatricula);
$pdf->SetFont("Arial", "", 10);
$coorx = 187;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 26);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Identificación:";
$cadena = utf8_decode($cadena);
$pdf->SetFont("Arial", "B", 10);
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY(14, 32);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "$_POST[cedula]";
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud + 28;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 32);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Teléfono:";
$cadena = utf8_decode($cadena);
$pdf->SetFont("Arial", "B", 10);
$coorx = 85;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 32);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "$telefonoestudiante";
$pdf->SetFont("Arial", "", 10);
$coorx = 88 + $longitud;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 32);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Pague Hasta:";
$pdf->SetFont("Arial", "B", 10);
$coorx = 147;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 32);
$pdf->Cell($longitud, 2, $cadena);

$cadena = str_replace('-', '/', $fecha_const_matricula);
$pdf->SetFont("Arial", "", 10);
$coorx = 187;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 32);
$pdf->Cell($longitud, 2, $cadena);

//Descripcion del item
$pdf->SetFillColor(192);
$pdf->RoundedRect(12, 38, 130, 19, 1);
$y = 6;
$pdf->Line(100, 38, 100, 57);
$pdf->Line(12, 38 + $y, 142, 38 + $y);
$pdf->Line(12, 38 + 12, 142, 38 + 12);

$pdf->SetFont("Arial", "", 10);
$pdf->SetXY(13, 46);
$pdf->Cell($longitud, 2, "MATRICULA");

$pdf->SetFont("Arial", "B", 10);
$pdf->SetXY(113, 46);
$pdf->Cell($longitud, 2, "$ $valor_matricula");

$pdf->SetFont("Arial", "B", 10);
$pdf->SetXY(60, 52);
$pdf->Cell($longitud, 2, "TOTAL A PAGAR");
$pdf->SetXY(113, 52);
$pdf->Cell($longitud, 2, "$ $valortotal");

$pdf->SetFont("Arial", "B", 5);
$pdf->SetXY(158, 40);
$pdf->Cell($longitud, 2, utf8_decode("-PAGUE ÚNICAMENTE EN EFECTIVO-"));

$pdf->SetFont("Arial", "B", 6);
$pdf->SetXY(67, 85);
$pdf->Cell($longitud, 2, "-COPIA BANCO-");

$pdf->SetFont("Arial", "", 7);
$pdf->SetXY(154, 85);
$pdf->Cell($longitud, 2, "-Espacio para timbre o sello del Banco-");

//Imagenes
$pdf->Image("codigos_barras/$numatricula.png", 11, 60, 132);
$pdf->Image("Ilud.jpg", 16, 7, 18);
$pdf->Image("escudo.gif", 188, 5, 18);
$pdf->Image("codigos_barras/$numatricula.png", 11, 154, 132);
$pdf->Image("Ilud.jpg", 16, 99, 18);
$pdf->Image("escudo.gif", 188, 97, 18);
$pdf->Image("Ilud.jpg", 16, 192, 18);
$pdf->Image("escudo.gif", 188, 190, 18);


//Segundo
$pdf->RoundedRect(10, 95, 200, 87, 5);
$cadena = "BANCO DE OCCIDENTE CUENTA 230864282";
$pdf->SetFont("Arial", "", 8);
$coorx = $longitud - 3;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 112);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "-ILUD-";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 98);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Instituto de lenguas de la";
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud + 28;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 102);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Universidad Distrital";
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 106);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "COMPROBANTE";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 63;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 98);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "DE PAGO";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 72;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 102);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "No " . $numatricula;
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 81;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 106);
$pdf->Cell($longitud, 2, $cadena);

$pdf->RoundedRect(10, 3, 200, 87, 5);
$pdf->Line(10, 115.2, 210, 115);


$cadena = "UNIVERSIDAD DISTRITAL";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 120;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 98);
$pdf->Cell($longitud, 2, $cadena);

$cadena = '"Fransico José de Caldas"';
$cadena = utf8_decode($cadena);
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 96;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 102);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "NIT 899.999.230.7";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 110;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 106);
$pdf->Cell($longitud, 2, $cadena);
//Nombre
$pdf->RoundedRect(12, 116, 196, 12, 1);
$y = 6;
$pdf->Line(12, 116 + $y, 208, 116 + $y);
$pdf->Line(50, 116, 50, 128);
$pdf->Line(145, 116, 145, 128);
$pdf->Line(186, 116, 186, 128);
//posicion der a izq,
$pdf->Line(33, 141, 33, 130);
$pdf->Line(55, 141, 55, 130);
$pdf->Line(80, 152, 80, 130);
$pdf->Line(103, 122, 103, 128);
$pdf->Line(110, 152, 110, 130);
$pdf->Line(127, 141, 127, 130);
//$pdf->Line(135,128,135,122);
$pdf->SetFont("Arial", "B", 10);
$longitud = $pdf->GetStringWidth("Nombre Estudiante:");
$pdf->SetXY(14, 118);
$pdf->Cell($longitud, 2, "Nombre Estudiante:");

$cadena = $nombrecompletoestudiante;
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud + 18;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 118);
$pdf->Cell($longitud, 2, $cadena);

$pdf->SetFont("Arial", "B", 10);
$longitud = $pdf->GetStringWidth(utf8_decode("Descripción:"));
$pdf->SetXY(45, 40);
$pdf->Cell($longitud, 2, utf8_decode("Descripción:"));
$pdf->SetXY(115, 40);
$pdf->Cell($longitud, 2, "Valor:");


$cadena = "Fecha de Expedicion:";
$pdf->SetFont("Arial", "B", 10);
$coorx = 147;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 118);
$pdf->Cell($longitud, 2, $cadena);

$cadena = str_replace('-', '/', $fechamatricula);
$pdf->SetFont("Arial", "", 10);
$coorx = 187;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 118);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Identificación:";
$cadena = utf8_decode($cadena);
$pdf->SetFont("Arial", "B", 10);
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY(14, 124);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "$_POST[cedula]";
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud + 28;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 124);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Teléfono:";
$cadena = utf8_decode($cadena);
$pdf->SetFont("Arial", "B", 10);
$coorx = 85;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 124);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "$telefonoestudiante  ";
$pdf->SetFont("Arial", "", 10);
$coorx = 88 + $longitud;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 124);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Pague Hasta:";
$pdf->SetFont("Arial", "B", 10);
$coorx = 147;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 124);
$pdf->Cell($longitud, 2, $cadena);

$cadena = str_replace('-', '/', $fecha_const_matricula);
$pdf->SetFont("Arial", "", 10);
$coorx = 187;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 124);
$pdf->Cell($longitud, 2, $cadena);

//Descripcion del item
$pdf->SetFillColor(192);
$pdf->RoundedRect(12, 130, 130, 22, 1);
$y = 6;
$pdf->Line(12, 135.5, 142, 135.5);
$pdf->Line(12, 141, 142, 141);
$pdf->Line(12, 146.5, 142, 146.5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(13, 132);
$pdf->Cell($longitud, 2, "Inscripcion");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(36, 132);
$pdf->Cell($longitud, 2, "Programa");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(61, 132);
$pdf->Cell($longitud, 2, "Periodo");

$pdf->SetFont("Arial", "B", 8);
$pdf->SetXY(89, 132);
$pdf->Cell($longitud, 2, "Nivel");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(112, 132);
$pdf->Cell($longitud, 2, "Grupo");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(128, 132);
$pdf->Cell($longitud, 2, "Carnet");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(14, 137.5);
$pdf->Cell($longitud, 2, "$numatricula");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(36.5, 137.5);
$pdf->Cell($longitud, 2, "$nombreprograma");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(56.5, 137.5);
if ($recibonumeroperiodo == 5) {
    $letrerovacacional = "Vacacional";
    $pdf->Cell($longitud, 2, $letrerovacacional);
} else {
    $pdf->Cell($longitud, 2, "Bimestre $recibonumeroperiodo");
}

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(82, 137.5);
$pdf->Cell($longitud, 2, "$recibonombrenivel");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(116, 137.5);
$pdf->Cell($longitud, 2, "$numerogrupo");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(130, 137.5);
$pdf->Cell($longitud, 2, "$recibocarne");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(36, 143);
$pdf->Cell($longitud, 2, "Horario");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(89, 143);
$pdf->Cell($longitud, 2, "Sede");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(115, 143);
$pdf->Cell($longitud, 2, "Total a Pagar");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(21, 148.5);
$pdf->Cell($longitud, 2, "$recibohorario");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(84.5, 148.5);
$pdf->Cell($longitud, 2, "$reciboSede");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(121, 148.5);
$pdf->Cell($longitud, 2, "$ $valortotal");

$pdf->SetFont("Arial", "B", 5);
$pdf->SetXY(158, 132);
$pdf->Cell($longitud, 2, utf8_decode("-PAGUE ÚNICAMENTE EN EFECTIVO-"));
$pdf->SetFont("Arial", "B", 6);
$pdf->SetXY(67, 177);
$pdf->Cell($longitud, 2, "-COPIA ILUD-");

$pdf->SetFont("Arial", "", 7);
$pdf->SetXY(154, 177);
$pdf->Cell($longitud, 2, "-Espacio para timbre o sello del Banco-");

//tercer recuadro
$pdf->RoundedRect(10, 188, 200, 72, 5);
$pdf->Line(10, 208, 210, 208);
$cadena = "BANCO DE OCCIENTE CUENTA 230864282";
$pdf->SetFont("Arial", "", 8);
$coorx = $longitud - 3;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 205);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "-ILUD-";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 191);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Instituto de lenguas de la";
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud + 28;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 195);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Universidad Distrital";
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 199);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "COMPROBANTE";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 63;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 191);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "DE PAGO";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 72;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 195);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "No " . $numatricula;
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 81;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 199);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "UNIVERSIDAD DISTRITAL";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 120;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 191);
$pdf->Cell($longitud, 2, $cadena);

$cadena = '"Francisco José de Caldas"';
$cadena = utf8_decode($cadena);
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 94;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 195);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "NIT 899.999.230.7";
$pdf->SetFont("Arial", "B", 10);
$coorx = $longitud + 108;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 199);
$pdf->Cell($longitud, 2, $cadena);

//Nombre
$pdf->RoundedRect(12, 209, 196, 12, 1);
$y = 6;
$pdf->Line(12, 209 + $y, 208, 209 + $y);
$pdf->Line(50, 221, 50, 209);
$pdf->Line(145, 221, 145, 209);
$pdf->Line(186, 221, 186, 209);

//posicion der a izq,
$pdf->Line(33, 234, 33, 223);
$pdf->Line(55, 234, 55, 223);
$pdf->Line(80, 245, 80, 223);
$pdf->Line(103, 221, 103, 215);
$pdf->Line(110, 245, 110, 223);
$pdf->Line(127, 234, 127, 223);

//$pdf->Line(135,128,135,122);
$pdf->SetFont("Arial", "B", 10);
$longitud = $pdf->GetStringWidth("Nombre Estudiante:");
$pdf->SetXY(14, 211.5);
$pdf->Cell($longitud, 2, "Nombre Estudiante:");

$cadena = $nombrecompletoestudiante;
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud + 18;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 211.5);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Fecha de Expedicion:";
utf8_decode($cadena);
$pdf->SetFont("Arial", "B", 10);
$coorx = 147;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 211.5);
$pdf->Cell($longitud, 2, $cadena);

$cadena = str_replace('-', '/', $fechamatricula);
$pdf->SetFont("Arial", "", 10);
$coorx = 187;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 211.5);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Identificación:";
$cadena = utf8_decode($cadena);
$pdf->SetFont("Arial", "B", 10);
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY(14, 217.5);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "$_POST[cedula]";
$pdf->SetFont("Arial", "", 10);
$coorx = $longitud + 28;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 217.5);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Teléfono:";
$cadena = utf8_decode($cadena);
$pdf->SetFont("Arial", "B", 10);
$coorx = 85;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 217.5);
$pdf->Cell($longitud, 2, $cadena);

$cadena = $estudiante->datosestudiante[Telefono];
$pdf->SetFont("Arial", "", 10);
$coorx = 88 + $longitud;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 217.5);
$pdf->Cell($longitud, 2, $cadena);

$cadena = "Pague Hasta:";
$pdf->SetFont("Arial", "B", 10);
$coorx = 147;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 217.5);
$pdf->Cell($longitud, 2, $cadena);

$cadena = str_replace('-', '/', $fecha_const_matricula);
$pdf->SetFont("Arial", "", 10);
$coorx = 187;
$longitud = $pdf->GetStringWidth($cadena);
$pdf->SetXY($coorx, 217.5);
$pdf->Cell($longitud, 2, $cadena);

//Descripcion del item
$pdf->SetFillColor(192);
$pdf->RoundedRect(12, 223, 130, 22, 1);
$y = 6;
$pdf->Line(12, 228.5, 142, 228.5);
$pdf->Line(12, 234, 142, 234);
$pdf->Line(12, 239.5, 142, 239.5);

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(13, 225);
$pdf->Cell($longitud, 2, "Inscripcion");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(36, 225);
$pdf->Cell($longitud, 2, "Programa");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(61, 225);
$pdf->Cell($longitud, 2, "Periodo");

$pdf->SetFont("Arial", "B", 8);
$pdf->SetXY(89, 225);
$pdf->Cell($longitud, 2, "Nivel");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(112, 225);
$pdf->Cell($longitud, 2, "Grupo");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(128, 225);
$pdf->Cell($longitud, 2, "Carnet");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(14, 230.5);
$pdf->Cell($longitud, 2, "$numatricula");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(36.5, 230.5);
$pdf->Cell($longitud, 2, "$nombreprograma");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(56.5, 230.5);
$pdf->Cell($longitud, 2, "Bimestre $recibonumeroperiodo");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(82, 230.5);
$pdf->Cell($longitud, 2, "$recibonombrenivel");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(116, 230.5);
$pdf->Cell($longitud, 2, "$numerogrupo");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(130, 230.5);
$pdf->Cell($longitud, 2, "$recibocarne");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(36, 236);
$pdf->Cell($longitud, 2, "Horario");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(89, 236);
$pdf->Cell($longitud, 2, "Sede");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(115, 236);
$pdf->Cell($longitud, 2, "Total a Pagar");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(21, 241.5);
$pdf->Cell($longitud, 2, "$recibohorario");

$pdf->SetFont("Arial", "", 9);
$pdf->SetXY(84.5, 241.5);
$pdf->Cell($longitud, 2, "$reciboSede");

$pdf->SetFont("Arial", "B", 9);
$pdf->SetXY(121, 241.5);
$pdf->Cell($longitud, 2, "$ $valortotal");

$pdf->SetFont("Arial", "B", 5);
$pdf->SetXY(158, 225);
$pdf->Cell($longitud, 2, utf8_decode("-PAGUE ÚNICAMENTE EN EFECTIVO-"));
$pdf->SetFont("Arial", "B", 6);
$pdf->SetXY(67, 248.5);
$pdf->Cell($longitud, 2, "-COPIA ESTUDIANTE-");

$pdf->SetFont("Arial", "", 7);
$pdf->SetXY(154, 248.5);
$pdf->Cell($longitud, 2, "-Espacio para timbre o sello del Banco-");

$pdf->SetFont("helvetica", "i", 8);
$pdf->SetXY(14, 252);
$pdf->Cell($longitud, 2, utf8_decode("Le informamos que una vez matriculado por ningún motivo se hará devolución del dinero ni cambio de grupo."));
$pdf->SetFont("Arial", "B", 6);

$pdf->SetFont("helvetica", "i", 8);
$pdf->SetXY(14, 256);
$pdf->Cell($longitud, 2, utf8_decode("El USUARIO al cancelar el presente servicio manifiesta conocer y aceptar las condiciones aquí dispuestas."));
$pdf->SetFont("Arial", "B", 6);

$_SESSION["olvidable"] = 1;

$nombre_recibo = "recibos_generados/".$_POST[cedula]."_".$numatricula.".pdf"; 

$pdf->Output($nombre_recibo,'F'); 

mysql_query("INSERT INTO `recibos` (`id`, `nombre`, `identificacion`, `num_inscripcion`, `programa`, `periodo`, `nivel`, `grupo`, `carne`, `valor`, `archivo`) VALUES (NULL, '".$nombrecompletoestudiante."', '".$_POST[cedula]."', '".$numatricula."', '".$nombreprograma."', '".$recibonumeroperiodo."', '".$recibonombrenivel."', '".$numerogrupo."', '".$recibocarne."', '".$valortotal."', '".$nombre_recibo."')",$link);

echo "<center><b>".$nombrecompletoestudiante." Su recibo se generó adecuadamente, si necesita una copia vaya al link de consulta de recibo.<br>";
echo "<a href=".$nombre_recibo.">DESCARGAR RECIBO</a></b><br></center>";

 
//$pdf->Output();
?>


