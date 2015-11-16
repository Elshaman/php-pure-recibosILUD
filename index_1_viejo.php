<?php
session_start();
$_SESSION["acceso"]=1;
include_once('DAL/Modelos/Matricula.php');
include_once('DAL/Modelos/Nivel.php');
include_once('DAL/Modelos/Estudiante.php');
include_once('DAL/Modelos/Programa.php');
include_once('DAL/Modelos/Seguimiento.php');
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
          <p>TENGA EN CUENTA QUE LOS CUPOS SON HABILITADOS SOLO A PARTIR DEL DIA  CORRESPONDIENTE PARA CADA IDIOMA Y NIVEL SEGUN EL CALENDARIO DE INSCRIPCION</p>
</div>    
        <form  name="f1" method="post" action="<?php echo $_SERVER[PHP_SELF]; ?>">
            <table>
                <tr>
                    <td class="formularioletrero">
                        Ingrese su n&uacute;mero de documento:
                        <input type="text" maxlength="15" name="cedula" class="tt" id="cedula" value="" onKeyPress="return valida_solonum(event);" />

                    </td>
                </tr>
                <tr>
                    <td>
                        <div id="apDiv1">
                            <input type="image" src="imagenes/consultar.png" onClick="return valtxtvac();"  />
                        </div>
                    </td>
                </tr>
            </table>
        </form>

        <?php
        if (isset($_POST[cedula])) {
            $estudiante = new Estudiante();
            $estudiante->sel_estudiante($_POST[cedula]);
            //var_dump($estudiante->datosestudiante);
            if ($estudiante->datosestudiante === null) {
                ?>
                <p>El Estudiante no se encuentra registrado.</p>
                <?php
            } else {
                ?>
                <p><?php
        echo utf8_decode($estudiante->datosestudiante[Apellidos] . "," .
                $estudiante->datosestudiante[Nombres]);
                ?></p>

                <div class="formula">
                    <h1>Paso 2:</h1>
                    <p>Puede escoger cualquier idioma para matricularse: El aplicativo le muestra:
                    </p>
                    <ul>
                        <li>
                            <b>Si usted es alunmo nuevo</b>, el primer nivel para inscribirse, no debe aparecer ning&uacute;n seguimiento academico.<br> <br>
                        </li>  
                        <li>
                            <b>Si usted es alumno antiguo</b>, su seguimiento academico por idioma, y El nivel al que puede matricularse, en funcion de su estado academico <br>
                            (si cree que el nivel indicado por el sistema no es la correcto (el sistema indica el proximo nivel de acuerdo al reglamento de ilud), por favor dirijase a las oficinas del ILUD).<br> <br>
                        </li>
                        <li>
                            <b>Si usted es alumno antiguo de children o teenagers</b>, le muestra dos programas para que se inscriba <br>
                            Verifique y escoja el programa correcto para usted segun su nivel anterior, SI ESCOJE EL PROGRAMA EQUIVOCADO PUEDE PERDER EL CUPO.<br> 
                            <br>
                      </li>
                                                                      
                    </ul>    
                  <p> para  matricularse al nivel sugerido por el aplicativo, presione el boton "Elegir grupo".</p>
            </div>    
            <div id="accordion">
                <?php
                $programas = new Programa($estudiante->datosestudiante[Acu_nino]);
                foreach ($programas->programas as $programa) {
                    ?>


                    <div>
                        <h3><a href="#">
                                <?php
                                echo utf8_decode($programa[Idioma]);
                                if ($programa[Idioma] == "Children")
                                    echo " Bimestral -DEBE INSCRIBIRSE EN ESTE PROGRAMA SI TIENE UNA EDAD ENTRE 7 A 10 A&Ntilde;OS-  ";
                                else if ($programa[Idioma] == "Teenagers")
                                    echo " Bimestral -DEBE INSCRIBIRSE EN ESTE PROGRAMA SI TIENE UNA EDAD ENTRE 11 A 14 A&Ntilde;OS- ";
                                ?>

                            </a>
                        </h3>
                        <div>
                            <p>
                                <?php
                                $peri = new Periodo();
                                $idperi = $peri->sel_identificador_nivel() . date('y');
                                //echo $idperi;
                                $matriculita = new Matricula();
                                if (!$matriculita->sel_if_matriculas("$idperi%", $programa["Id_programa"], $_POST[cedula]))
                                    echo "Tiene matriculas en tramite. Imposible solicitar recibo para este programa";
                                else {


                                    $seg = new Seguimiento();
                                    $seg->sel_seguimiento_estud_prg($_POST["cedula"], $programa["Id_programa"]);
                                    if ($seg->tblSeguimiento()) {
                                        $nivelproximo = $seg->determinarProximoNivel();
                                    } else {
                                        $nivel = new Nivel();
                                        $arrnivelproximo = $nivel->sel_primer_nivel($programa["Id_programa"]);
                                        $nivelproximo = $arrnivelproximo[1];
                                    }
                                    echo "El siguiente nivel al cual se puede matricular es: <b>$nivelproximo</b>";
                                    ?>


                                    <!--                        aqui va l tabla-->

                                    <!--                   y el resutado de la evaluacion-->

                                </p>
                                <form action="formulariomat.php" method="POST">
                                    <input type="hidden" name="cedula"  value="<?php echo $_POST[cedula] ?>" />
                                    <input type="hidden" name="nombre"  value="<?php echo $estudiante->datosestudiante[Nombres]; ?>"  />
                                    <input type="hidden" name="apellido"  value="<?php echo $estudiante->datosestudiante[Apellidos]; ?>"  />
                                    <input type="hidden" name="programa"  value="<?php echo $programa[Idioma]; ?>"  />
                                    <input type="hidden" name="idprograma"  value="<?php echo $programa["Id_programa"]; ?>"  />
                                    <input type="hidden" name="nivel"  value="<?php echo $nivelproximo; ?>"  />
                                    <input type="image" src="imagenes/elegir.png" />
                                </form>
                                <?php
                            }
                            ?>
                        </div>

                    </div>

                    <?php
                }
                ?>
            </div>
            <?php
        }
    }
    ?>
</body>
</html>
