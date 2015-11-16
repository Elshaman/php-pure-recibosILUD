<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include_once(dirname(dirname(dirname(__FILE__))) . "/DAL/conexion/DB.php");

class Programa {


    public $programas=array();
    private $conn;

    const SEL_PROGRAMA="SELECT Id_programa, Idioma FROM programa
        WHERE Idioma Not like 'Fran%os' AND
        Idioma<>'Children' AND
        Idioma<>'Teenagers' AND
        Idioma<>'O Children' AND
        Idioma<>'Conv Alcaldia' AND
        Idioma<>'CIUD' AND
        Idioma<>'Intensivo' AND
        Idioma<>'Postpone' AND 
		Idioma<>'Frances Teen' AND
		Idioma<>'Aleman Teen' AND
		Idioma<>'Portugues Teen' AND
		Idioma<>'Italiano Teen' AND
		Idioma<>'Children Semestral' AND
		Idioma<>'Teenagers Semestral' AND
		Idioma<>'Refuerzo Ingles' AND
		Idioma<>'Refuerzo Frances' AND
		Idioma<>'Refuerzo Aleman' AND
		Idioma<>'Refuerzo Italiano' AND
		Idioma<>'Refuerzo Portugues'";

    const SEL_NINOS="SELECT Id_programa, Idioma FROM programa
        WHERE Idioma='Frances Niños' OR
        Idioma='Children' OR
        Idioma='Teenagers' OR
        Idioma='Children Semestral' OR
        Idioma='Teenagers Semestral' OR
        Idioma='Frances Teen' OR
        Idioma='Aleman Teen' OR
        Idioma='Italiano Teen' OR
        Idioma='Portugues Teen' OR
		Idioma='Refuerzo Ingles' OR
		Idioma='Refuerzo Frances' OR
		Idioma='Refuerzo Aleman' OR
		Idioma='Refuerzo Italiano' OR
		Idioma='Refuerzo Portugues'";

    const SEL_NOMBRE_PROGRAMA="SELECT Idioma from programa
        where Id_programa=?";

    public function __construct($acudiente) {
        $this->conn = DB::conn();
        
        if($acudiente===null){
            $this->sel_programa();
        }else{
            $this->sel_programa_ninos();
        }
    }



    public function sel_nombre_programa($id) {
        $rs = $this->conn->Execute(self::SEL_NOMBRE_PROGRAMA,array((int)$id));
        $ret = array();
        $ret = $rs->Getarray();
        return $ret[0][Idioma];
    }


    public function sel_programa() {
        $rs = $this->conn->Execute(self::SEL_PROGRAMA);
        $ret = array();
        $ret = $rs->Getarray();
        $this->programas= $ret;
    }

     public function sel_programa_ninos() {
        $rs = $this->conn->Execute(self::SEL_NINOS);
        $ret = array();
        $ret = $rs->Getarray();
        $this->programas= $ret;
    }

}

?>
