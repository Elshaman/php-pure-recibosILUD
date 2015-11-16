<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


include_once('Nivel.php');
include_once('Periodo.php');
include_once(dirname(dirname(dirname(__FILE__))) . "/DAL/conexion/DB.php");

class Seguimiento {

    private $conn;
    private $seguimiento = array();



    const SELECT_SEG_CEDULA_PROGRAMA = "SELECT RegAno, seguimiento.id_periodo,
       periodo.Periodo, idioma, nivel,
       Def_letra, Def_numero, cod_obs,
       seguimiento.id_programa,
                        seguimiento.id_nivel,
                        periodos.fecha_inicio_periodo,
                        periodos.fecha_fin_periodo                                                
FROM seguimiento, periodo, programa, niveles, periodos	
WHERE periodo.id_periodo=seguimiento.id_periodo AND
programa.Id_programa = seguimiento.id_programa AND
niveles.Id_nivel=seguimiento.id_nivel AND
seguimiento.RegAno = YEAR(periodos.fecha_inicio_periodo) AND
periodos.nombre_periodo = periodo.id_periodo AND
seguimiento.id_estudiante = ?
AND programa.Id_programa= ?
ORDER BY seguimiento.RegAno, periodos.fecha_inicio_periodo ASC";
    
         
const INSERT_SEG="INSERT INTO seguimiento ( id_periodo, RegAno, id_estudiante,
                                                id_programa, id_nivel, eProgreso,
						AutoEva, ExFinal, Def_letra,
                                                Def_numero, ide_usuario , cod_obs)
                                                VALUES (
                                                ?, ?, ?, ?, ?, NULL , NULL , NULL , NULL , NULL ,
                                                'ANONIMO', NULL
                                                ) ";

    public function __construct($id=false) {
        
        $this->conn = DB::conn();
        //$this->conn->debug=true;
    }


    public function ins_seguimiento($idperiodo,
                                    $RegAno,
                                    $id_estudiante,
                                    $id_programa,
                                    $id_nivel
                                   ){
                 $rs = $this->conn->Execute(self::INSERT_SEG,
                                            array((string)$idperiodo,
                                                  (int)$RegAno,
                                                  (float)$id_estudiante,
                                                  (int)$id_programa,
                                                  (string)$id_nivel
                                                  ));

                                   }


    public function sel_seguimiento_estud_prg($cedula, $programa) {

        $rs = $this->conn->Execute(self::SELECT_SEG_CEDULA_PROGRAMA, array((float) $cedula, (int) $programa));
        $ret = array();
        $ret = $rs->Getarray();
        $this->seguimiento = $ret;
    }

    public function tblSeguimiento() {
        if (count($this->seguimiento) == 0) {
            //echo "<p>No se encontraron niveles cursados para este Idioma.</p>"; cambio realizado 27 de junio
            return false;
        } else {
?>

 <table width="557" height="53" background="imagenes/fondo-tabla-2.jpg"  class="estilotexto">
     <tr></tr><tr></tr>
     <tr>
                    <td width="74"><div align="center" class="estilotexto">
                            <div align="center"><b>A&ntilde;o</b></div>
                    </div></td>
                    <td width="102" nowrap="nowrap"><div align="center"><b>Periodo</b></div></td>
                <td width="74" nowrap="nowrap"><div align="center"><b>Idioma</b></div></td>
                <td width="111" nowrap="nowrap"><div align="center"><b>Nivel</b></div></td>
                <td width="85" nowrap="nowrap"><div align="center"><b>Definitiva</b></div></td>
                <td width="49" nowrap="nowrap"><div align="center"><b>Obs</b></div></td>
                   <!-- <th><td>Año</td></th>
                    <th><td>Periodo</td></th>
                    <th><td>Idioma</td></th>
                    <th><td>Nivel</td></th>
                    <th colspan="2"><td>Definitiva</td></th>
                    <th>Obs</th>-->
                </tr>
                <tr></tr>
                 <tr></tr>
                  <tr></tr>
    <?php
            $es=" ";
            foreach ($this->seguimiento as $periodocursado) {
    ?>
                <tr>
                    <td id="e"><div align="center"><?php echo $periodocursado[RegAno]; ?></div></td>
                    <td id="e"><div align="center"><?php echo $periodocursado[Periodo]; ?></div></td>
                    <td id="e"><div align="center"><?php echo htmlentities($periodocursado[idioma]); ?></div></td>
                    <td id="e"><div align="center"><?php echo $periodocursado[nivel]; ?></div></td>
                    <td id="e"><div align="center"><?php echo $periodocursado[Def_numero].$es.$periodocursado[Def_letra]; ?></div></td>
                    <td id="e"><div align="center"><?php echo $periodocursado[cod_obs]; ?></div></td>
                    

                </tr>
    <?php
            }
    ?>
        </table>
<?php
            return true;
        }
    }

    
    function ultimoPeriodoAprobado() {
        end($this->seguimiento);
        $nivel = "";
        while ($registro = current($this->seguimiento)) {

            if ($registro[Def_numero] > 75 ) {
                $nivel = $registro[nivel];
                break;
            }else
                prev($this->seguimiento);
        }
        return $nivel;
    }

   


    function siDosCompromisosSeguidos($registro1,$registro2){
          $compromiso1=$registro1[cod_obs];
          $compromiso2=$registro2[cod_obs];
          if($compromiso1=="C*" and $compromiso2=="C*"){
              return true;
          }else
              return false;
          
    }
    
    
    function determinarProximoNivel(){
        end($this->seguimiento);
        $ultimoregistro=current($this->seguimiento);
        
 
        $anioultimo=$ultimoregistro[RegAno];
        $periodoultimo=$ultimoregistro[id_periodo];
        $nivelultimo=$ultimoregistro[nivel];
        $id_nivelultimo=$ultimoregistro[id_nivel];
        $notaultima=$ultimoregistro[Def_numero];
        
      
        $penultimoregistro=prev($this->seguimiento);
        $aniopenultimo=$penultimoregistro[RegAno];
        $periodopenultimo=$penultimoregistro[id_periodo];
        
        
        $periodo=new Periodo();
        $periodoactual=$periodo->sel_periodo_Actual();
        $anioactual= date("Y");
        
        
        
       

        if($periodo->siguientePeriodo($periodoultimo, $periodoactual, $anioultimo, $anioactual)>1){
               $nivelDeterminado=$this->ultimoPeriodoAprobado();
               if($nivelDeterminado=="")
                   $nivelDeterminado=$nivelultimo;
        }
       
        
        elseif($periodo->siguientePeriodo($periodopenultimo, $periodoultmimo, $aniopenultimo, $anioultimo)==1){
            $nivelDeterminado=$nivelultimo;
        }
       
        elseif($this->siDosCompromisosSeguidos($ultimoregistro, $penultimoregistro)){
            $nivelDeterminado=$nivelultimo;
        }
        
        elseif($notaultima < 75){
            $nivelDeterminado=$nivelultimo;
        } else{
            $nivel=new Nivel();
            $nivel->sel_niveles_mas_Actual($id_nivelultimo, $ultimoregistro[id_programa]);
            $arreglonivel = $nivel->retornaSiguienteNivelAprobado();
            $nivelDeterminado=$arreglonivel[1];
        }
        
                
        
        return $nivelDeterminado;
        
        
        
    }
/// PA QUE NO SALGA TABLA DE SEGUIMIENTO
    public function tblSeguimiento2() {
        if (count($this->seguimiento) == 0) {
            //echo "<p>No se encontraron niveles cursados para este Idioma.</p>"; cambio realizado 27 de junio
            return false;
        } else {


            $es=" ";
            foreach ($this->seguimiento as $periodocursado) {
            }
            return true;
        }
    }

}




