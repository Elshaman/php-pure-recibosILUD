<?php 
function Conectarse() 
{ 
  if (!($link=mysql_connect("10.20.1.253","recibos","recibosilud"))) 
   { 
      echo "Error conectando a la base de datos."; 
      exit(); 
   } 
   if (!mysql_select_db("recibos_generados",$link)) 
   { 
      echo "Error seleccionando la base de datos."; 
      exit(); 
   } 
   return $link; 
} 

$link=Conectarse(); 

mysql_close($link); //cierra la conexion 
?> 
