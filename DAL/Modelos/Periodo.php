<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


include_once(dirname(dirname(dirname(__FILE__))) . "/DAL/conexion/DB.php");

class Periodo {

    private $conn;

    public function __construct($id=false) {
        $this->conn = DB::conn();
        
    }

    const SELECT_PERIODO_ACTUAL="SELECT nombre_periodo
                                 FROM PERIODOS
                                 WHERE CURDATE()>=fecha_inicio_periodo AND
                                 CURDATE()<=fecha_fin_periodo";

   


    public function sel_periodo_Actual() {
        $rs = $this->conn->Execute(self::SELECT_PERIODO_ACTUAL);
        $arr = $rs->FetchRow();
        return (string) $arr[nombre_periodo];
    }


    public function sel_identificador_nivel(){
        $periodo_actual=$this->sel_periodo_Actual();
        switch($periodo_actual){
            case "bim1":return 1;
            case "bim2":return 2;
            case "bim3":return 3;
            case "bim4":return 4;
            case "vac1":return 5;
        }
        
    }

    public function sel_numePeriodo_Matricula(){
        $idnivel=$this->sel_identificador_nivel();
        return $idnivel.date("y");

    }

    public function siguientePeriodo($periodoult, $periodoact, $anoult, $anoact) {
        $numperiodos = 0;

        if ($periodoult === "vac1" or
                $periodoact === "vac1") {
            $arr = array(
                "bim1" => 1,
                "bim2" => 2,
                "vac1" => 3,
                "bim3" => 4,
                "bim4" => 5
            );
        } else {
            $arr = array("bim1" => 1,
                "bim2" => 2,
                "bim3" => 3,
                "bim4" => 4
            );
        }


        if ($anoult == $anoact) {
            $numperiodos = $arr[$periodoact] - $arr[$periodoult];
            
            $numperiodos--;
            //}
        } elseif ($anoact - $anoult >= 1) {
            $numperiodosaux1 = count($arr) - $arr[$periodoult];
            
            $numperiodosaux2 = $arr[$periodoact] - 1;
            $numperiodos = $numperiodosaux2 + $numperiodosaux1;
            if ($anoact - $anoult > 1) {
                $numperiodos = $numperiodos + (($anoact - $anoult - 1) * 4);
            }
        }

        return $numperiodos;
    }

}


?>
