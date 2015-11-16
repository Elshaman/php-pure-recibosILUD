<?php


 
include_once(dirname(dirname(dirname(__FILE__))) . "/DAL/conexion/DB.php");

class Estudiante {

    public $datosestudiante;
    private $conn;
    const SELECT_EST_SEG = "SELECT DISTINCT estudiantes.Id_estudiante,estudiantes.Nombres,
                        estudiantes.Apellidos,estudiantes.Acu_nino,estudiantes.Telefono
                        FROM estudiantes
                        WHERE estudiantes.Id_estudiante=?";

    public function __construct($id=false) {
        $this->conn = DB::conn();
     
    }

    public function sel_estudiante($cedula) {
       
        $rs = $this->conn->Execute(self::SELECT_EST_SEG, array((float) $cedula));
        $ret = array();
        $ret = $rs->Getarray();
        if (!is_array($ret)) {
            $this->datosestudiante = false;
        } else {
            $this->datosestudiante = $ret[0];
        }
    }

}

?>
