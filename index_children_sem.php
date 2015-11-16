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

                    /* Una vez que tenemos la posiciÃ³n de la cadena de texto que indica la version capturamos la
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

//Llamamos al funcion que comprueba el nagedaor al cargarse la pÃ¡gina
            window.onload = comprobarnavegador();

        </script>
        
        
        
        
        
        
        
        
        
        
        
 
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
                    <div>
                    <div class="formula">
                    <h1>Historial académico:</h1>
                    </div>
				<?php
				$i = 0; 
				$f = 0; 
				$a = 0; 
				$it = 0;
				$p = 0; 
				
                $programas = new Programa($estudiante->datosestudiante[Acu_nino]);
                foreach ($programas->programas as $programa) {
                    ?>

                
                        
                        <div>
                            <p>
                                <?php
                                $peri = new Periodo();
                                $idperi = $peri->sel_identificador_nivel() . date('y');
                                //echo $idperi;
                                $matriculita = new Matricula();
                                if (!$matriculita->sel_if_matriculas("$idperi%", $programa["Id_programa"], $_POST[cedula]))
                                    echo "";
                                else {


                                    $seg = new Seguimiento();
                                    $seg->sel_seguimiento_estud_prg($_POST["cedula"], $programa["Id_programa"]);
                                    if ($seg->tblSeguimiento ()) {
                                        $nivelproximo = $seg->determinarProximoNivel();
                                    } else {
                                        $nivel = new Nivel();
                                        $arrnivelproximo = $nivel->sel_primer_nivel($programa["Id_programa"]);
                                        $nivelproximo = $arrnivelproximo[1];
                                    }
                                    //echo "El siguiente nivel al cual se puede matricular es: <b>$nivelproximo</b>";
                                    
									$Id_de_nivel = mysql_query("SELECT * FROM equiv_sem_bim_copy WHERE Id_programa = '".$programa["Id_programa"]."' AND Nivel = '".$nivelproximo."'",$link2);
	$iddd = mysql_fetch_array($Id_de_nivel); 
									
									// validación la compatibilidad entre modalidades
									
									if (($programa["Id_programa"] == 5 and $iddd["Id_nivel"] != "K01")or(($programa["Id_programa"] == 27 and $iddd["Id_nivel"] != "KS1"))){
									
									$ch_niveles = mysql_query("SELECT `rank` FROM (SELECT @rownum :=@rownum + 1 `rank`, p.* FROM seguimiento p,(SELECT @rownum := 0) r ) s WHERE id_estudiante = '".$_POST[cedula]."' AND id_programa = '".$programa["Id_programa"]."' ORDER BY rank DESC",$link2); 
														$filas = mysql_fetch_array($ch_niveles);
														
														$level_ch[$i]["estado"] = "SI"; 
														$level_ch[$i]["id_prog"] = $programa["Id_programa"]; 
														$level_ch[$i]["id_nivel"] = $iddd["Id_nivel"];  
														$level_ch[$i]["orden"] = $filas["rank"]; 
														$level_ch[$i]["prox_level"] = $nivelproximo;
														$level_ch[$i]["cedula"] = $_POST[cedula];
														$level_ch[$i]["nombre"] = $estudiante->datosestudiante[Nombres];
														$level_ch[$i]["apellidos"] = $estudiante->datosestudiante[Apellidos];
														
														$i++;
																	
									}


									if (($programa["Id_programa"] == 6 and $iddd["Id_nivel"] != "P01")or(($programa["Id_programa"] == 28 and $iddd["Id_nivel"] != "PS1"))){
										
										$teen_niveles = mysql_query("SELECT `rank` FROM (SELECT @rownum :=@rownum + 1 `rank`, p.* FROM seguimiento p,(SELECT @rownum := 0) r ) s WHERE id_estudiante = '".$_POST[cedula]."' AND id_programa = '".$programa["Id_programa"]."' ORDER BY rank DESC",$link2); 
														$filas = mysql_fetch_array($teen_niveles);
														
														$level_teen[$i]["estado"] = "SI"; 
														$level_teen[$i]["id_prog"] = $programa["Id_programa"]; 
														$level_teen[$i]["id_nivel"] = $iddd["Id_nivel"];  
														$level_teen[$i]["orden"] = $filas["rank"]; 
														$level_teen[$i]["prox_level"] = $nivelproximo;
														$level_teen[$i]["cedula"] = $_POST[cedula];
														$level_teen[$i]["nombre"] = $estudiante->datosestudiante[Nombres];
														$level_teen[$i]["apellidos"] = $estudiante->datosestudiante[Apellidos];
														
														$f++;
																	
									}									

                            }
                            ?>
                        </div>
                       

                    </div>

                    <?php
                }
                ?>
            </div>
                    <div>
                    <div class="formula">
                    <h1>Seleccione el programa a inscribirse:</h1>
                    </div>
            <?php
        }
    }
	
	array_multisort ($level_teen,SORT_DESC);
	array_multisort ($level_ch,SORT_DESC);
	
	echo "....";
	
	
	echo $level_eng[0]["estado"];
	echo "-";
	echo $level_eng[0]["id_prog"];
	echo "-";
	echo $level_eng[0]["id_nivel"];
	echo "-";
	echo $level_eng[0]["prox_level"]; 

   ///////////////////////////////////////////////////// SEGUNDO BARRIDO
   

   
                   foreach ($programas->programas as $programa) {
					   
					   $imprime_default = 1;
                    
					if ( stripos(utf8_decode($programa[Idioma]),'Semestral') !== FALSE ) { //Valido si es Semestral 
					
					?>


                        <table width="557" height="53" background="imagenes/fondo-tabla-2.jpg"  class="estilotexto"><tr><td><h3>
                                <?php
                                echo utf8_decode($programa[Idioma]);
                                if ($programa[Idioma] == "Children")
                                    echo " Bimestral -DEBE INSCRIBIRSE EN ESTE PROGRAMA SI TIENE UNA EDAD ENTRE 7 A 10 A&Ntilde;OS-  ";
                                else if ($programa[Idioma] == "Teenagers")
                                    echo " Bimestral -DEBE INSCRIBIRSE EN ESTE PROGRAMA SI TIENE UNA EDAD ENTRE 11 A 14 A&Ntilde;OS- ";
                                ?>

                            
                        </h3></td></tr>
                            <tr><td>
                                <?php
                                $peri = new Periodo();
                                $idperi = $peri->sel_identificador_nivel() . date('y');
                                //echo $idperi;
                                $matriculita = new Matricula();
                                if (!$matriculita->sel_if_matriculas("$idperi%", $programa["Id_programa"], $_POST[cedula]))
                                    echo "Matrícula en tramite </td></tr></table>";
                                else {


                                    $seg = new Seguimiento();
                                    $seg->sel_seguimiento_estud_prg($_POST["cedula"], $programa["Id_programa"]);
                                    if ($seg->tblSeguimiento2()) {
                                        $nivelproximo = $seg->determinarProximoNivel();
                                    } else {
                                        $nivel = new Nivel();
                                        $arrnivelproximo = $nivel->sel_primer_nivel($programa["Id_programa"]);
                                        $nivelproximo = $arrnivelproximo[1];
                                    }
																	
								switch ($programa["Id_programa"]){
								
								case 27 :
								if (($level_ch[0]["estado"] == "SI" or $level_ch[2]["estado"] == "SI" or $level_ch[1]["estado"] == "SI") and ( $level_ch[0]["id_prog"] != $programa["Id_programa"])){
								
								$Id_de_nivel = mysql_query("SELECT * FROM equiv_sem_bim_copy WHERE Id_programa = '".$level_ch[0]["id_prog"]."' AND Nivel = '".$level_ch[0]["prox_level"]."'",$link2);
								$iddd = mysql_fetch_array($Id_de_nivel);
								
								if ($iddd["Id_nivel"] != "KS1"){
								
								if (($level_ch[0]["estado"] == "SI" or $level_ch[2]["estado"] == "SI" or $level_ch[1]["estado"] == "SI") and ($programa["Id_programa"] != $level_ch[0]["id_prog"])){
																
									echo "Es multiprograma y el próximo nivel a cursar es <b>".$iddd["eq_nivel"]."</b> Semestral";
									$imprime_default = 0;
									
									
									?>
									<form action="formulariomat.php" method="POST">
                                    <input type="hidden" name="cedula"  value="<?php echo $_POST[cedula] ?>" />
                                    <input type="hidden" name="nombre"  value="<?php echo $estudiante->datosestudiante[Nombres]; ?>"  />
                                    <input type="hidden" name="apellido"  value="<?php echo $estudiante->datosestudiante[Apellidos]; ?>"  />
                                    <input type="hidden" name="programa"  value="<?php echo $programa[Idioma]; ?>"  />
                                    <input type="hidden" name="idprograma"  value="<?php echo $iddd["eq_id_programa"]; ?>"  />
                                    <input type="hidden" name="nivel"  value="<?php echo $iddd["eq_nivel"]; ?>"  />
                                    <input type="submit" value="Inscribirse a <?php echo $iddd["eq_nivel"]; ?>"/>
                                     
                                </form></td></tr></table>
									   <?php
                                    } else {
											echo $level_ch[0]["prox_level"]." no está disponible en modalidad semestral</td></tr></table> ";
											$imprime_default = 0;
											}   
									}
									
									}else{$imprime_default = 1;}
								
								break; 
																		
								case 28 :
								if (($level_teen[0]["estado"] == "SI" or $level_teen[2]["estado"] == "SI" or $level_teen[1]["estado"] == "SI") and ( $level_teen[0]["id_prog"] != $programa["Id_programa"])){
								
								$Id_de_nivel = mysql_query("SELECT * FROM equiv_sem_bim_copy WHERE Id_programa = '".$level_teen[0]["id_prog"]."' AND Nivel = '".$level_teen[0]["prox_level"]."'",$link2);
								$iddd = mysql_fetch_array($Id_de_nivel);
								
								if ($iddd["Id_nivel"] != "PS1"){
								
								if (($level_teen[0]["estado"] == "SI" and $iddd["eq_nivel"] != "no") or $level_teen[2]["estado"] == "SI"){
																
									echo "Es multiprograma y el próximo nivel a cursar es <b>".$iddd["eq_nivel"]."</b> Semestral";
									$imprime_default = 0;
									
									
									?>
									<form action="formulariomat.php" method="POST">
                                    <input type="hidden" name="cedula"  value="<?php echo $_POST[cedula] ?>" />
                                    <input type="hidden" name="nombre"  value="<?php echo $estudiante->datosestudiante[Nombres]; ?>"  />
                                    <input type="hidden" name="apellido"  value="<?php echo $estudiante->datosestudiante[Apellidos]; ?>"  />
                                    <input type="hidden" name="programa"  value="<?php echo $programa[Idioma]; ?>"  />
                                    <input type="hidden" name="idprograma"  value="<?php echo $iddd["eq_id_programa"]; ?>"  />
                                    <input type="hidden" name="nivel"  value="<?php echo $iddd["eq_nivel"]; ?>"  />
                                    <input type="submit" value="Inscribirse a <?php echo $iddd["eq_nivel"]; ?>"/>
                                     
                                </form></td></tr></table>
									   <?php
                                    } else {
											echo $level_teen[0]["prox_level"]." no está disponible en modalidad semestral</td></tr></table> ";
											$imprime_default = 0;
											}   
									}
									
									}else{$imprime_default = 1;}
								
								break; 
								
									}//fin switch
									
												if ($imprime_default == 1){
												echo "El siguiente nivel al cual se puede matricular es: <b>$nivelproximo</b>";
												 
												echo " <form action=\"formulariomat.php\" method=\"POST\">
												<input type=\"hidden\" name=\"cedula\"  value=\"".$_POST[cedula]."\" />
												<input type=\"hidden\" name=\"nombre\"  value=\"".$estudiante->datosestudiante[Nombres]."\"  />
												<input type=\"hidden\" name=\"apellido\"  value=\"".$estudiante->datosestudiante[Apellidos]."\"  />
												<input type=\"hidden\" name=\"programa\"  value=\"".$programa[Idioma]."\"  />
												<input type=\"hidden\" name=\"idprograma\"  value=\"".$programa["Id_programa"]."\"  />
												<input type=\"hidden\" name=\"nivel\"  value=\"".$nivelproximo."\"  />
												<input type=\"submit\" value=\"Inscribirse a ".$nivelproximo."\" />
												</form></td></tr></table>"; 
												}
												
							}	
								
							}
									


            
				}
                ?>
            <?php
        
    

   
   
    ?>
    
    
    
</body>
</html>
