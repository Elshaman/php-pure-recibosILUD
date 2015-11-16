<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

include(dirname(dirname(__FILE__))."/DAL/Modelos/Periodo.php");

$s=new Periodo();
$k=$s->sel_periodo_Actual();

var_dump($k);


?>
