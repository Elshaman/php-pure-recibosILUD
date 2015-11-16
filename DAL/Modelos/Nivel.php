<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Nivel
 *

 */



include_once(dirname(dirname(dirname(__FILE__))) . "/DAL/conexion/DB.php");

class Nivel {

private $niveles=array();
private $conn;


const SELECT_LV_MAS_ACTUAL = "SELECT Id_nivel,Nivel FROM niveles WHERE Id_nivel > ?
          AND Id_programa=?";

const SELECT_LV="SELECT Id_nivel,Nivel FROM niveles WHERE Id_programa=?";

const SELECT_LV_ID="SELECT Id_nivel FROM niveles WHERE Id_programa=? AND Nivel=?";

const SELECT_NOMBRE_LV="select Nivel FROM niveles where Id_nivel=?";

   public function __construct($id=false) {
        $this->conn = DB::conn();
        
   }



     public function sel_niveles_mas_Actual($idnivel,$idprograma) {
        $rs = $this->conn->Execute(self::SELECT_LV_MAS_ACTUAL,array((string) $idnivel,(int)$idprograma));
        $this->niveles=$rs->Getarray();

    }


    public function sel_id_nivel($idprograma,$nivel) {
        $rs = $this->conn->Execute(self::SELECT_LV_ID,array((int)$idprograma,(string)$nivel));
        $this->niveles=$rs->Getarray();
        $idnivel= current($this->niveles);
        $id=$idnivel[Id_nivel];
        return $id;
    }



    public function sel_nombre_nivel($idnivel) {
        $rs = $this->conn->Execute(self::SELECT_NOMBRE_LV,array((string)$idnivel));
        $ret=array();
        $ret=$rs->Getarray();
        return $ret[0][Nivel];
    }

    public function sel_primer_nivel($idprograma) {
        $rs = $this->conn->Execute(self::SELECT_LV,array((int)$idprograma));
        $this->niveles=$rs->Getarray();
        $primernivel= current($this->niveles);
        $arrprimernivel[]=$primernivel[Id_nivel];
        $arrprimernivel[]=$primernivel[Nivel];
        return $arrprimernivel;
    }




    public function retornaSiguienteNivelAprobado(){
        reset($this->niveles);
        $arregloretorno=array();
        $registro=current($this->niveles);
        $arregloretorno[]=$registro["Id_nivel"];
        $arregloretorno[]= $registro["Nivel"];
        

        return $arregloretorno;
    }
}


?>
