<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pruebasmatriculs
 *
 *
 *
 */

include("DAL/Modelos/Matricula.php");

$m=new Matricula();
$j=$m->siTieneCarne(80826143);
var_dump($j);

?>
