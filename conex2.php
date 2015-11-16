<?php 
function Conectarse2() 
{ 
  if (!($link2=mysql_connect("10.20.1.253","servidorilud","adminilud"))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   if (!mysql_select_db("bdilud",$link2)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $link2; 
} 

$link2=Conectarse2(); 

mysql_close($link2); //cierra la conexion 
?> 
