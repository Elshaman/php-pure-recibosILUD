<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Matricula
 *
 */

include_once("Periodo.php");
include_once("Nivel.php");


include_once(dirname(dirname(dirname(__FILE__))) . "/DAL/conexion/DB.php");

class Matricula {

    private $conn;
    public $matriculas = array();

    public function __construct($id=false) {
        $this->conn = DB::conn();
     
    }

    const SELECT_MAT_X_ESTUD_PROG_BIMESTRE="SELECT * FROM matriculas
                                             WHERE id_estudiante = ?
                                             AND id_programa =?
                                             AND id_matricula LIKE '?%'";

    const SELECT_ID_GRUPO="SELECT id_grupo
                           FROM grupo
                           WHERE numero =?
                           AND id_grupo LIKE  ? ";

    const SELECT_CARNE = "SELECT COUNT(matriculas.id_matricula) as cuenta
                         FROM matriculas
                         WHERE matriculas.id_estudiante=?
                         AND matriculas.valor_carne<>0";

    const  SELECT_IF_MATRIC="select m.id_matricula
                            FROM matriculas m
                            WHERE m.id_matricula LIKE ?
                            AND m.id_programa=?
                            AND m.id_estudiante=?";



    const INS_CONTADOR="INSERT INTO contador ( cont ) VALUES ( NULL)";


    const INS_MATRICULA1="INSERT INTO matriculas ( id_matricula,
                                                  fecha_matricula,
                                                  id_periodo,
                                                  id_programa,
                                                  id_nivel,
                                                  id_estudiante,
                                                  tipo_matricula,
                                                  ref_matricula,
                                                  consig_matricula,
                                                  valor_matricula,
                                                  fecha_cons_mat,
                                                  ref_carne,
                                                  consig_carne,
                                                  valor_carne,
												  valor_seguro,
												  valor_matricula_extra,
                                                  fecha_cons_car,
                                                  ide_usuario )
                                                   VALUES
						   (?, ?, ?, ?, ?, ?, 1 ,?,'NULL', ?, ?, ?, ?, ?, ? , ?, '', 'ANONIMO')";

    const INS_MATRICULA2="INSERT INTO matriculas ( id_matricula,
                                                  fecha_matricula,
                                                  id_periodo,
                                                  id_programa,
                                                  id_nivel,
                                                  id_estudiante,
                                                  tipo_matricula,
                                                  ref_matricula,
                                                  consig_matricula,
                                                  valor_matricula,
                                                  fecha_cons_mat,
                                                  ref_carne,
                                                  consig_carne,
                                                  valor_carne,
												  valor_seguro,
												  valor_matricula_extra,
                                                  fecha_cons_car,
                                                  ide_usuario )
                                                   VALUES
						   (?, ?, ?, ?, ?, ?, 5,?,'NULL', ?, ?, ?, ?, ?, ?, ?, '', 'ANONIMO')";
    
    const INS_MAT_GRUPO = "INSERT INTO matricula_grupo( id_matricula ,
                                                        id_grupo )
                VALUES (?,?)";


    public function ins_mat_grupo($id_matricula, $id_grupo) {
        $rs = $this->conn->Execute(self::INS_MAT_GRUPO,
                        array((int) $id_matricula,
                            (string) $id_grupo));
    }

    public function sel_matriculas_est_prg_bim($cedula, $id_programa, $id_bimestre) {
        $rs = $this->conn->Execute(self::SELECT_MAT_X_ESTUD_PROG_BIMESTRE, array((float) $cedula,
                    (int) $id_programa,
                    (int) $id_bimestre));
        $this->matriculas = $rs->Getarray();
    }

   public function sel_if_matriculas($id_matricula,$id_programa,$id_estud) {
        $rs = $this->conn->Execute(self::SELECT_IF_MATRIC, array((string) $id_matricula,
                    (int) $id_programa,
                    (float) $id_estud
                    ));
        $ret=array();
        $ret=$rs->Getarray();
        if(empty($ret)){
            return true;
        }else
            return false;
    }

    public function siTieneMatriculas() {
        if (empty($this->matriculas))
            return true;
        else
            return false;
    }

    public function hallarNivelGrupo($cadenagrupo) {
      
        $level = substr($cadenagrupo, strpos($cadenagrupo, '.') + 1);
        return $level;
    }

    public function hallarNumeroGrupo($cadenagrupo) {
        
        $num = substr($cadenagrupo, 0, strpos($cadenagrupo, '.'));
        return $num;
    }

    public function indiceGrupo($num, $nivel) {
        $p = new Periodo();
        $numt = $p->sel_numePeriodo_Matricula();
        
        $var = $numt.$nivel.'%';
        $rs = $this->conn->Execute(self::SELECT_ID_GRUPO, array((int) $num, (string) $var));
        $arr_id_grupo = $rs->Getarray();
        return $arr_id_grupo[0];
    }

    public function hallarIdGrupo($cadenagrupo, $level) {
        $ngrupo = substr($cadenagrupo, 0, strpos($cadenagrupo, ".")); 
		
		        $indGrupo = $this->indiceGrupo($ngrupo, $level);
        return $indGrupo[id_grupo];
    }

    public function ins_contador() {
        $rs = $this->conn->Execute(self::INS_CONTADOR);
        if ($rs)
            $id = (int) $this->conn->Insert_ID();
        else
            $id=false;
        return $id;
    }

    public function ins_matricula1($numeromatricula,
                                  $fechamatricula,
                                  $idperiodo,
                                  $idprograma,
                                  $idnivel,
                                  $idestudiante,
                                  $valor_matricula,
                                  $fecha_const_matricula,
                                  $ref_carne,
                                  $consig_carne,
                                  $valor_carne,
								  $valor_seguro,
								  $valor_matricula_extra
                                  
    ) {


        $rs = $this->conn->Execute(self::INS_MATRICULA1, array(
                    (int) $numeromatricula,
                    (string) $fechamatricula,
                    (string) $idperiodo,
                    (int) $idprograma,
                    (string) $idnivel,
                    (float) $idestudiante,
                    (float) $idestudiante,
                    (int) $valor_matricula,
                    (string) $fecha_const_matricula,
                    (int) $ref_carne,
                    (int) $consig_carne,
                    (int)$valor_carne,
					(int)$valor_seguro,
					(int)$valor_matricula_extra
                    
                        )
        );
        if ($rs)
            $id = (int) $this->conn->Insert_ID();
        else
            $id=false;
        return $id;
    }
    
     
    
    public function ins_matricula2($numeromatricula,
                                  $fechamatricula,
                                  $idperiodo,
                                  $idprograma,
                                  $idnivel,
                                  $idestudiante,
                                  $valor_matricula,
                                  $fecha_const_matricula,
                                  $ref_carne,
                                  $consig_carne,
                                  $valor_carne,
								  $valor_seguro,
                                  $valor_matricula_extra
    ) {


        $rs = $this->conn->Execute(self::INS_MATRICULA2, array(
                    (int) $numeromatricula,
                    (string) $fechamatricula,
                    (string) $idperiodo,
                    (int) $idprograma,
                    (string) $idnivel,
                    (float) $idestudiante,
                    (float) $idestudiante,
                    (int) $valor_matricula,
                    (string) $fecha_const_matricula,
                    (int) $ref_carne,
                    (int) $consig_carne,
                    (int)$valor_carne,
					(int)$valor_seguro,
					(int)$valor_matricula_extra
                        )
        );
        if ($rs)
            $id = (int) $this->conn->Insert_ID();
        else
            $id=false;
        return $id;
    }
    
    
     
    

    public function siTieneCarne($id_estudiante) {
        $rs = $this->conn->Execute(self::SELECT_CARNE, array((float) $id_estudiante));
        $dat = $rs->Getarray();
        $dato=current($dat);
        $aux=intval($dato["cuenta"]);
        if($aux>0){
              return true;
        }
        else
            return false;
    }

    public function isPrimerNivel($id_programa, $id_nivel) {
        $n = new Nivel();
        $a = array();
        $a = $n->sel_primer_nivel($id_programa);
        if ($a[0] == $id_nivel
            )return true;
        else
            return false;
    }

    public function numeroMatricula($num) {
        $p = new Periodo();
        $numb = $p->sel_numePeriodo_Matricula();
        $contMatricula;
        
        if ($num < 10)
            $contMatricula = "2150000" . $num;
        else if ($num < 100)
            $contMatricula = "215000" . $num;
        else if ($num < 1000)
            $contMatricula = "21500" . $num;
        else if ($num < 10000)
            $contMatricula = "2150" . $num;
        else
            $contMatricula = $numb . $num;
        return $contMatricula;
    }

    function sumaDia($fecha, $dia) {
        list($year, $mon, $day) = explode('-', $fecha);
        return date('Y-m-d', mktime(0, 0, 0, $mon, $day + $dia + 1, $year));
	   
    }

}

//
?>
