<?php
session_start();
if (isset($_POST['cedula'])) {
    session_destroy();
} else {
    header("Location: index_1.php");
}

if (isset($_SESSION["acceso"])) {
        //session_destroy();
     unset($_SESSION['acceso']);
} else {
   
    // session_destroy();
    header("Location: index_1.php");
}

//session_start();


//if(isset($_SESSION["olvidable"]) and $_SESSION["olvidable"]===1){
//    //session_destroy();
//      echo "<script languaje=\"javascript\">location.href=\"index_1.php\"; </script>";
//    exit();
//}





include_once("DAL/Modelos/Nivel.php");
?>
<html>
    <head>
        <title>UNIVERSIDAD DISTRITAL</title>
        <link rel="stylesheet" type="text/css" href="jqueryui/css/shadowbox.css">
        <script type="text/javascript" src="jqueryui/js/shadowbox/shadowbox.js"></script>
        <script type="text/javascript" src="jqueryui/js/funciones.js"></script>
        <!--<link rel="stylesheet" href="Css/estiloform.css" />-->
        <script type="text/javascript">
            Shadowbox.init();
        </script>

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- ImageReady Styles (Sin título-1) -->
        <style type="text/css">
            <!--

            #Tabla_01 {
                position: relative;
                margin:auto;
                left:0px;
                top:0px;
                width:445px;
                height:221px;
            }

            #plantilla-ud-01 {
                position:absolute;
                left:0px;
                top:0px;
                width:445px;
                height:44px;
            }

            #plantilla-ud-02 {
                position:absolute;
                left:0px;
                top:44px;
                width:445px;
                height:177px;
            }
            #apDiv1 {
                position:absolute;
                width:227px;
                height:115px;
                z-index:1;
                left: 16px;
                top: 27px;
            }

            .Netscape {
                font-family:"Lucida Sans Unicode", "Lucida Grande", sans-serif;
                font-size:12px;
                color: #000000;
                width: 153px;
            }

            .formula{
                width:500px;
                border:#ff9900 dotted 1px;
                /*background-color:#ffff66;*/
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 17px;
                margin:auto;
            }

            .formula h1{
                color:#ff9900;
                font-family:sans-serif;
                font-style:italic;
                font-size: 20px;
            }

            .formula p{
                color:#ff9933;
                font-family:sans-serif;
                font-style:italic;
                font-size: 14px;

            }

            -->
        </style>
        <!-- End ImageReady Styles -->
    </head>
    <body style="background-color:#FFFFFF; margin-top: 0px; margin-bottom: 0px; margin-left: 0px; margin-right: 0px;">
        <!-- ImageReady Slices (Sin título-1) -->
<?php
//Para Cambiar
$conn = mysql_connect("10.20.1.253", "servidorilud", "adminilud");
//$conn = mysql_connect("localhost", "root", "");
mysql_query("SET NAMES 'utf8'");
mysql_select_db("bdilud", $conn);
$conperactual = "SELECT nombre_periodo
                                        FROM PERIODOS
                                        WHERE CURDATE()>=fecha_inicio_periodo AND
                                        CURDATE()<=fecha_fin_periodo";
mysql_query("SET NAMES 'utf8'");
$rperactual = mysql_query($conperactual, $conn);
mysql_query("SET NAMES 'utf8'");
$arrperiodoactual = mysql_fetch_array($rperactual);

switch ($arrperiodoactual[0]) {
    case "bim1":$peractual = "BIMESTRE 1";
        $numperactual = 1;
        break;
    case "bim2":$peractual = "BIMESTRE 2";
        $numperactual = 2;
        break;
    case "bim3":$peractual = "BIMESTRE 3";
        $numperactual = 3;
        break;
    case "bim4":$peractual = "BIMESTRE 4";
        $numperactual = 4;
        break;
    case "vac1":$peractual = "VACACIONAL";
        $numperactual = 5;
        break;
}
//
//        echo "Periodo Actual=".$numperactual."<br />";
//        echo "Cedula:".$_POST[cedula]."<br />";
//        echo "nombre:".$_POST[nombre]."<br />";
//        echo "Apellido:".$_POST[apellido]."<br />";
//        echo "Programa".$_POST[programa]."<br />";
//        echo "Nivel".$_POST[nivel]."<br />";
//        echo "Id_Programa".$_POST[idprograma]."<br />";

$n = new Nivel();
$idnivel = $n->sel_id_nivel($_POST[idprograma], $_POST[nivel]);
$_SESSION["id_nivel"] = $idnivel;
//        echo "Id_nivel ".$idnivel."<br />";
// put your code here
?>

        <div id="Tabla_01">
            <div id="plantilla-ud-01">
                <img src="imagenes/plantilla_ud_01.jpg" width="445" height="44" alt="">
            </div>
            <div id="plantilla-ud-02">
                <img src="imagenes/plantilla_ud_02.jpg" width="445" height="177" alt="">
                <div id="apDiv1">       

                    <form id="form1" name="form1" method="post" action="generarecibos.php">

                        <table width="326" border="0">
                            <tr>
                                <td colspan="2" class="Netscape">Grupo:
                                    <input  name="cadenagrupo" type="text" class="Netscape" id="campo1" onFocus="this.blur()" /></td>
                                <td width="152"><a href="selecciongrupos.php?periodo=<?php echo $arrperiodoactual[0]; ?>&idnivel=<?php echo $idnivel; ?>&numperiodo=<?php echo $numperactual; ?>" rel="shadowbox;height=500;width=900"><img src="imagenes/abrir-menu.png" border="0"></a></td>

                            </tr>
                            <tr>
                                <td width="81">&nbsp;</td>
                                <td width="79">&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                            <tr>
                                <td><input type="image" src="imagenes/enviar.png" onClick="return valformmat();"></td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
                            </tr>
                        </table>

                        <input type="hidden" name="idprograma" value="<?php echo $_POST[idprograma]; ?>" />
                        <input type="hidden" name="cedula" value="<?php echo $_POST[cedula]; ?>" />
                        <input type="hidden" name="nivel" value="<?php echo $idnivel; ?>" />

                    </form>

                </div>
            </div>
        </div>
        <div class="formula">
                    <h1>Paso  3:</h1>
                   
                  <p> Ahora para elegir el horario presione el boton "Elegir Horario"</p>
                  <p> Una vez que usted ha seleccionado el grupo y horario en la ventana emergente, puede generar el recibo de pago.</p>
                  <p> <b>Recuerde</b> el recibo solo puede generase  <b>y descargarse una vez</b> por bimestre, debe imprimir su recibo en una impresora Laser, si no la tiene puede guardar  el recibo en formato adobe .pdf para imprimirlo luego</p>
                  <p> El paso final es Presionar el bot&oacute;n "Generar Recibo" para descargar el recibo de pago.
    </div> 
        <!-- End ImageReady Slices -->
    </body>
</html>