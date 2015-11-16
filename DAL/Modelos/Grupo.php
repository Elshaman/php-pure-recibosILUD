<?php


include_once(dirname(dirname(dirname(__FILE__))) . "/DAL/conexion/DB.php");

class Grupo {

    private $conn;
    public $datosgrupo=array();


    const SEL_GRUPO_ID="SELECT g.numero,g.dias,g.horas,g.id_sede,s.Sede
                       FROM grupo g,sede s
                       WHERE s.id_sede=g.id_sede
                       AND g.id_grupo=?";

    const UPD_GRUPO_MINUS_1="UPDATE grupo
                             SET Cupos=Cupos-1
                             where
                             id_grupo=?";

    public function __construct() {
        $this->conn = DB::conn();
       

    }



    public function upd_cupos_grupo($id_grupo){
        $this->conn->Execute(self::UPD_GRUPO_MINUS_1,array((string)$id_grupo));

    }


    public function sel_grupo($idgrupo) {
        $rs = $this->conn->Execute(self::SEL_GRUPO_ID, array((string) $idgrupo));
        $ret = array();
        $ret = $rs->Getarray();
        $this->datosgrupo=$ret[0];
    }


}

?>
