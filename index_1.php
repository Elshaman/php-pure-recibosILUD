<?php
session_start();
$_SESSION["acceso"]=1;
include_once('DAL/Modelos/Matricula.php');
include_once('DAL/Modelos/Nivel.php');
include_once('DAL/Modelos/Estudiante.php');
include_once('DAL/Modelos/Programa.php');
include_once('DAL/Modelos/Seguimiento.php');
include("conex2.php");
$link2=Conectarse2();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Expires" content="0" />
        <meta http-equiv="Pragma" content="no-cache" />
        
        <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
        <link type="text/css" href="jqueryui/css/ui-lightness/jquery-ui-1.8.5.custom.css" rel="stylesheet" />
        <script type="text/javascript" src="jqueryui/js/jquery-1.4.2.min.js"></script>
        <script type="text/javascript" src="jqueryui/js/jquery-ui-1.8.5.custom.min.js"></script>
        <script type="text/javascript" src="jqueryui/js/funciones.js"></script>
        <link rel="stylesheet" href="Css/estilotexto.css" />
        <link rel="stylesheet" href="Css/estilotabla.css" />
        
        <script type="text/javascript">

            function comprobarnavegador() {
                /* Variables para cada navegador, la funcion indexof() si no encuentra la cadena devuelve -1,
                 las variables se quedaran sin valor si la funcion indexof() no ha encontrado la cadena. */
                var is_safari = navigator.userAgent.toLowerCase().indexOf('safari/') > -1;
                var is_chrome = navigator.userAgent.toLowerCase().indexOf('chrome/') > -1;
                var is_firefox = navigator.userAgent.toLowerCase().indexOf('firefox/') > -1;
                var is_ie = navigator.userAgent.toLowerCase().indexOf('msie ') > -1;

                /* Detectando  si es Safari, vereis que en esta condicion preguntaremos por chrome ademas, esto es porque el
                 la cadena de texto userAgent de Safari es un poco especial y muy parecida a chrome debido a que los dos navegadores
                 usan webkit. */

                if (is_safari && !is_chrome) {

                    /* Buscamos la cadena 'Version' para obtener su posicion en la cadena de texto, para ello
                     utilizaremos la funcion, tolowercase() e indexof() que explicamos anteriormente */
                    var posicion = navigator.userAgent.toLowerCase().indexOf('Version/');

                    /* Una vez que tenemos la posición de la cadena de texto que indica la version capturamos la
                     subcadena con substring(), como son 4 caracteres los obtendremos de 9 al 12 que es donde
                     acaba la palabra 'version'. Tambien podraimos obtener la version con navigator.appVersion, pero
                     la gran mayoria de las veces no es la version correcta. */
                    var ver_safari = navigator.userAgent.toLowerCase().substring(posicion + 9, posicion + 12);

                    // Convertimos la cadena de texto a float y mostramos la version y el navegador
                    ver_safari = parseFloat(ver_safari);
                    
                    location.href="error.php"; 
                    //alert('Su navegador es Safari, Version: ' + ver_safari);
                }

                //Detectando si es Chrome
                if (is_chrome) {
                    var posicion = navigator.userAgent.toLowerCase().indexOf('chrome/');
                    var ver_chrome = navigator.userAgent.toLowerCase().substring(posicion + 7, posicion + 11);
                    //Comprobar version
                    ver_chrome = parseFloat(ver_chrome);
                    location.href="error.php";
                    //alert('Su navegador es Google Chrome, Version: ' + ver_chrome);
                }

                //Detectando si es Firefox
                if (is_firefox) {
                    var posicion = navigator.userAgent.toLowerCase().lastIndexOf('firefox/');
                    var ver_firefox = navigator.userAgent.toLowerCase().substring(posicion + 8, posicion + 12);
                    //Comprobar version
                    ver_firefox = parseFloat(ver_firefox);
                    //alert('Su navegador es Firefox, Version: ' + ver_firefox);
                }

                //Detectando Cualquier version de IE
                if (is_ie) {
                    var posicion = navigator.userAgent.toLowerCase().lastIndexOf('msie ');
                    var ver_ie = navigator.userAgent.toLowerCase().substring(posicion + 5, posicion + 8);
                    //Comprobar version
                    ver_chrome = parseFloat(ver_ie);
                    
                    location.href="error.php";
                    //alert('Su navegador es Internet Explorer, Version: ' + ver_ie);
                }
            }

//Llamamos al funcion que comprueba el nagedaor al cargarse la página
            window.onload = comprobarnavegador();

        </script>
        
        
        
        
        
        
        
        
        
        
        
        <SCRIPT>
            $(function() {
                $( "#accordion" ).accordion({ header: "h3" });
            });
        </SCRIPT>
        <style  type="text/css">

            body{ font: 62.5% "Trebuchet MS", sans-serif; margin: 50px;}


            .formula{
                                border:#ff9900 dotted 1px;
                /*background-color:#ffff66;*/
                padding-top: 10px;
                padding-bottom: 10px;
                padding-left: 17px;
                margin-bottom: 30px;
                font-size: 13px;
            }

            .formula h1{
                color:#cc6600;
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

            .tt{

                width:130px;

            }



            #apDiv1 {
                /*                position:absolute;*/
                width:87px;
                height:35px;
                z-index:1;
                /*                left: 193px;
                                top: 46px;*/
            }

            .formularioletrero{
                color:#666666;
                font-family:sans-serif;
                font-style:italic;
                font-weight:bold;
                font-size: 12px;
            }

            input[type="text"]{
                background-color: #ffc;
                border: #000 solid 1px;
                font-family:monospace;
            }


        </style>
        <title></title>
    </head>
    <body>
    <div class="formula">
            <h1>ILUD - Instituto de Lenguas Universidad Distrital</h1>
            <p>
                Bienvenido al aplicativo para descargar su recibo de pago para matricularse en el ILUD.
            </p>

      <p>
                <?php
                if (!isset($_POST[cedula])) {
                    echo "Paso 1: Digite su numero de documento <b>(previa preinscripci&oacute;n de datos, si a&uacute;n no se ha preinscrito hagalo ";
                    ?>

                    <a href = "http://gemini.udistrital.edu.co/comunidad/dependencias/ilud/datosEstud.php">AQUI</a>)</b>
                    <br> (Este aplicativo No esta habilitado para estudiantes ni funcionarios UD o estudiantes de Convenios)
                        <?php
                }
                ?>
        </p>
      <!-- <p>Para Matricularse en modalidad <strong>CUATRIMESTRAL</strong> ingrese <strong><a href="http://ilud.udistrital.edu.co/recibos/index_semestres.php">AQUI</a></strong></p> -->
          <p>Para Matricularse en modalidad <strong>ADULTOS</strong> ingrese <strong><a href="http://ilud.udistrital.edu.co/recibos/index_bimestrales.php">AQUI</a></strong>          </p>
          <p>Para Matricularse en modalidad <strong>CHILDREN</strong> <strong>BIMESTRAL</strong> o <strong>TEENAGERS</strong> <strong>BIMESTRAL</strong> (Ni&ntilde;os y Adolescentes) ingrese <strong><a href="http://ilud.udistrital.edu.co/recibos/index_children_bim.php">AQUI</a></strong></p>
          
    </div>
</body>
</html>
