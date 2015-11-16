<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="stylesheet" href="Css/estilotexto.css" />
        <link rel="stylesheet" href="Css/estilotabla.css" />
        <title>Chichote</title>
        <style type="text/css">
            <!--
            body {
                background-color: #FFFFFF;
            }
            -->
        </style>
        <script language="JavaScript">
            function actualizarPadre(valor)
            {
                // form1 corresponde al nombre del formulario de la pagina contenedora o principal
                // campo1 es el nombre del campo donde se ingresara el valor en la pagina principal
                parent.document.form1.campo1.value = valor;
                window.parent.Shadowbox.close();
            }
        </script>
    </head>

    <body>
        <?php
        $numperiodo = $_GET[numperiodo];
        $idnivel = $_GET[idnivel];

        //echo $numperiodo;
        //echo "  $idnivel";

        //$conn = mysql_connect("localhost", "root", "");
        $conn = mysql_connect("10.20.1.253", "servidorilud", "adminilud");
        mysql_select_db("bdilud", $conn);
        $consultanio = "SELECT DATE_FORMAT(CURDATE(),'%y')";
        mysql_query("SET NAMES 'utf8'");
        $ranio = mysql_query($consultanio, $conn);
        $arranio = mysql_fetch_array($ranio);
        $anio = $arranio[0];
        $aproxidgrupo=$numperiodo.$anio.$idnivel;
        //echo $aproxidgrupo;
        $consultagrupos = "SELECT *FROM grupo JOIN sede
                           ON sede.id_sede = grupo.id_sede
                             WHERE id_grupo LIKE '$aproxidgrupo%' ORDER BY numero";
        //echo $consultagrupos;
        mysql_query("SET NAMES 'utf8'");
        $rgrupos = mysql_query($consultagrupos, $conn);
        ?>
        <table width="757" height="53" class="estilotexto">
            <tr></tr><tr></tr>
            <tr>
                <td width="14" nowrap="nowrap"><div align="center"><b>Elija</b></div></td>
                <td width="14" nowrap="nowrap"><div align="center"><b>Grupo</b></div></td>
                <td width="95" nowrap="nowrap"><div align="center"><b>Dias</b></div></td>
                <td width="8" nowrap="nowrap"><div align="center"><b>Horas</b></div></td>
                <td width="50" nowrap="nowrap"><div align="center"><b>Sede</b></div></td>
                <td width="9" nowrap="nowrap"><div align="center"><b>Disponibles</b></div></td>

            </tr>
        

            <?php
            while ($arrgrupos = mysql_fetch_array($rgrupos)) {
            ?>
            <tr>
                 <?php
                //Para los cupos disponibles
                $consultadisponibles="select * from matricula_grupo where id_grupo='$arrgrupos[id_grupo]'";
                //echo $consultadisponibles;
                $rdisponibles=  mysql_query($consultadisponibles,$conn);
                $disponibles=  mysql_num_rows($rdisponibles);
                $disponibles=$arrgrupos[6]-$disponibles;

                ?>
                 <td><div align="center">
                   <input
                       type="radio"
                       name="grupo"
                       <?php
                       if($disponibles<=0){
                           echo " disabled='disabled' ";

                       }
                       ?>
                       value="<?php echo  $arrgrupos[numero].".".$arrgrupos[id_nivel]?>"
                       onclick="javascript:actualizarPadre(this.value)"/>
               </div></td>
                <td><div align="center"><?php echo $arrgrupos[numero];?></div></td>
                <td><div align="center"><?php echo $arrgrupos[dias];?></div></td>
                <td><div align="center"><?php echo $arrgrupos[horas];?></div></td>
                <td><div align="center"><?php echo $arrgrupos[Sede];?></div></td>
                <td><div align="center"><?php echo $disponibles;?></div></td>

                
            </tr>
<?php
            }
?>
        </table>    

      


    </body>
</html>