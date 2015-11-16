<?php
ini_set("display_errors","1");
require_once("librerias/html2pdf/html2pdf.class.php");

$content = '

<STYLE TYPE="text/css">
	
		P { margin-bottom: 0.0cm; margin: 0; padding: 0; }
		TD P { margin-bottom: 0cm; margin: 0; padding: 0; }
		A:link { so-language: zxx }
	
	</STYLE>

<page  backtop="0mm" backbottom="0mm" backleft="0mm" backright="0mm">
<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=700*>
	<TR>
		<TD WIDTH=700 HEIGHT=78 VALIGN=TOP>
			<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#ffffff" CELLPADDING=4 CELLSPACING=0 FRAME=ABOVE RULES=NONE>
				<COL WIDTH=92>
				<COL WIDTH=185>
				<COL WIDTH=131>
				<COL WIDTH=183>
				<COL WIDTH=109>
				<TR>
					<TD WIDTH=92>
						<P><IMG SRC="Ilud.jpg" NAME="gr&aacute;ficos1" ALIGN=LEFT WIDTH=67 HEIGHT=46 BORDER=0><BR CLEAR=LEFT><BR>
						</P>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>BANCO
						DE OCCIDENTE</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=185>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>-ILUD-</B></FONT></FONT></P>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>INSTITUTO
						DE LENGUAS DE LA UNIVERSIDAD DISTRITAL</B></FONT></FONT></P>
						<P ALIGN=CENTER><BR>
						</P>
						<P ALIGN=LEFT><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>CUENTA
						No: 230864282</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=131>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>COMPROBANTE
						DE PAGO</B></FONT></FONT></P>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>No
						6436353</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=183>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>UNIVERSIDAD
						DISTRITAL</B></FONT></FONT></P>
						<P ALIGN=CENTER>&ldquo;<FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Francisco
						Jos&eacute; de Caldas&rdquo;</B></FONT></FONT></P>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>NIT
						899.999.230.7</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=109>
						<P ALIGN=CENTER><IMG SRC="escudo.gif" NAME="gr&aacute;ficos2" ALIGN=LEFT WIDTH=99 HEIGHT=73 BORDER=0><BR CLEAR=LEFT><BR>
						</P>
					</TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=700 VALIGN=TOP>
			<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0>
				<COL WIDTH=115>
				<COL WIDTH=119>
				<COL WIDTH=116>
				<COL WIDTH=116>
				<COL WIDTH=116>
				<COL WIDTH=116>
				<TR VALIGN=TOP>
					<TD WIDTH=115>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Nombre
						Estudiante:</B></FONT></FONT></P>
					</TD>
					<TD COLSPAN=3 WIDTH=350>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">LEIDY
						YULIETH PUENTES GUTIERREZ</FONT></FONT></P>
					</TD>
					<TD WIDTH=116>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Fecha
						de Expedici&oacute;n:</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=116 SDVAL="42177" SDNUM="9226;0;DD/MM/AA">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">22/06/15</FONT></FONT></P>
					</TD>
				</TR>
				<TR VALIGN=TOP>
					<TD WIDTH=115>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Identificaci&oacute;n</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=119 SDVAL="1012400465" SDNUM="9226;">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">1012400465</FONT></FONT></P>
					</TD>
					<TD WIDTH=116>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Tel&eacute;fono:</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=116 SDVAL="7762176" SDNUM="9226;">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">7762176</FONT></FONT></P>
					</TD>
					<TD WIDTH=116>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Pague
						Hasta:</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=116 SDVAL="42181" SDNUM="9226;0;DD/MM/AA">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">26/06/15</FONT></FONT></P>
					</TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=700 VALIGN=TOP>
			<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#ffffff" CELLPADDING=4 CELLSPACING=0>
				<COL WIDTH=475>
				<COL WIDTH=214>
				<TR VALIGN=TOP>
					<TD WIDTH=475>
						<TABLE WIDTH=475 BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0>
							<COL WIDTH=200*>
							<COL WIDTH=143*>
							<COL WIDTH=132*>
							<TR VALIGN=TOP>
								<TD WIDTH=200>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Descripci&oacute;n</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=143>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Pague
									Hasta</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=132>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Valor</B></FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=200>
									<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">MATRICULA</FONT></FONT></P>
								</TD>
								<TD WIDTH=143 SDVAL="42181" SDNUM="9226;0;DD/MM/AA">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>26/06/15</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=132 SDVAL="118400" SDNUM="9226;0;[$$-240A]#.##0,00;[RED]([$$-240A]#.##0,00)">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>$118.400,00</B></FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=200>
									<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">MATRICULA
									EXTRAORDINARIA</FONT></FONT></P>
								</TD>
								<TD WIDTH=143 SDVAL="42185" SDNUM="9226;0;DD/MM/AA">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>30/06/15</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=132 SDVAL="215000" SDNUM="9226;0;[$$-240A]#.##0,00;[RED]([$$-240A]#.##0,00)">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>$215.000,00</B></FONT></FONT></P>
								</TD>
							</TR>
						</TABLE>
						<TABLE WIDTH=256 BORDER=1 BORDERCOLOR="#ffffff" CELLPADDING=4 CELLSPACING=0>
							<COL WIDTH=256*>
							<TR>
								<TD WIDTH=256 VALIGN=TOP>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>PAGO
									ORDINARIO</B></FONT></FONT></P>
									<P ALIGN=CENTER><IMG SRC="codigos_barras/21515441.png" NAME="gr&aacute;ficos3" ALIGN=LEFT WIDTH=389 HEIGHT=58 BORDER=0><BR CLEAR=LEFT><BR>
									</P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=256 VALIGN=TOP>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>PAGO
									EXTRAORDINARIO</B></FONT></FONT></P>
									<P ALIGN=CENTER><IMG SRC="codigos_barras/21515441.png" NAME="gr&aacute;ficos4" ALIGN=LEFT WIDTH=389 HEIGHT=58 BORDER=0><BR CLEAR=LEFT><BR>
									</P>
								</TD>
							</TR>
						</TABLE>
					</TD>
					<TD WIDTH=214>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">-
						PAGUE UNICAMENTE EN EFECTIVO -</FONT></FONT></P>
					</TD>
				</TR>
				<TR VALIGN=TOP>
					<TD WIDTH=475>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">-
						COPIA BANCO - </FONT></FONT>
						</P>
					</TD>
					<TD WIDTH=214>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">-
						Espacio para timbre o sello del banco - </FONT></FONT>
						</P>
					</TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
</TABLE>
<P ALIGN=CENTER>
---------------------------------------------------------------------------------------------------------------
</P>
<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=256*>
	<TR>
		<TD WIDTH=700 HEIGHT=78 VALIGN=TOP>
			<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#ffffff" CELLPADDING=4 CELLSPACING=0 FRAME=ABOVE RULES=NONE>
				<COL WIDTH=92>
				<COL WIDTH=185>
				<COL WIDTH=131>
				<COL WIDTH=183>
				<COL WIDTH=109>
				<TR>
					<TD WIDTH=92>
						<P><IMG SRC="Ilud.jpg" NAME="gr&aacute;ficos1" ALIGN=LEFT WIDTH=67 HEIGHT=46 BORDER=0><BR CLEAR=LEFT><BR>
						</P>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>BANCO
						DE OCCIDENTE</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=185>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>-ILUD-</B></FONT></FONT></P>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>INSTITUTO
						DE LENGUAS DE LA UNIVERSIDAD DISTRITAL</B></FONT></FONT></P>
						<P ALIGN=CENTER><BR>
						</P>
						<P ALIGN=LEFT><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>CUENTA
						No: 230864282</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=131>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>COMPROBANTE
						DE PAGO</B></FONT></FONT></P>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>No
						6436353</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=183>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>UNIVERSIDAD
						DISTRITAL</B></FONT></FONT></P>
						<P ALIGN=CENTER>&ldquo;<FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Francisco
						Jos&eacute; de Caldas&rdquo;</B></FONT></FONT></P>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>NIT
						899.999.230.7</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=109>
						<P ALIGN=CENTER><IMG SRC="escudo.gif" NAME="gr&aacute;ficos2" ALIGN=LEFT WIDTH=99 HEIGHT=73 BORDER=0><BR CLEAR=LEFT><BR>
						</P>
					</TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=700 VALIGN=TOP>
			<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0>
				<COL WIDTH=115>
				<COL WIDTH=119>
				<COL WIDTH=116>
				<COL WIDTH=116>
				<COL WIDTH=116>
				<COL WIDTH=116>
				<TR VALIGN=TOP>
					<TD WIDTH=115>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Nombre
						Estudiante:</B></FONT></FONT></P>
					</TD>
					<TD COLSPAN=3 WIDTH=350>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">LEIDY
						YULIETH PUENTES GUTIERREZ</FONT></FONT></P>
					</TD>
					<TD WIDTH=116>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Fecha
						de Expedici&oacute;n:</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=116 SDVAL="42177" SDNUM="9226;0;DD/MM/AA">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">22/06/15</FONT></FONT></P>
					</TD>
				</TR>
				<TR VALIGN=TOP>
					<TD WIDTH=115>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Identificaci&oacute;n</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=119 SDVAL="1012400465" SDNUM="9226;">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">1012400465</FONT></FONT></P>
					</TD>
					<TD WIDTH=116>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Tel&eacute;fono:</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=116 SDVAL="7762176" SDNUM="9226;">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">7762176</FONT></FONT></P>
					</TD>
					<TD WIDTH=116>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Pague
						Hasta:</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=116 SDVAL="42181" SDNUM="9226;0;DD/MM/AA">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">26/06/15</FONT></FONT></P>
					</TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=700 VALIGN=TOP>
			<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#ffffff" CELLPADDING=4 CELLSPACING=0>
				<COL WIDTH=479>
				<COL WIDTH=210>
				<TR VALIGN=TOP>
					<TD WIDTH=479>
						<TABLE WIDTH=479 BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0>
							<COL WIDTH=83*>
							<COL WIDTH=77*>
							<COL WIDTH=89*>
							<COL WIDTH=96*>
							<COL WIDTH=68*>
							<COL WIDTH=55*>
							<TR VALIGN=TOP>
								<TD WIDTH=83>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Inscripci&oacute;n</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=77>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Programa</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=89>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Periodo</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=96>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Nivel</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=68>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Grupo</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=55>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Carnet</B></FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=83 SDVAL="51520739" SDNUM="9226;">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">51520739</FONT></FONT></P>
								</TD>
								<TD WIDTH=77>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">Ingles</FONT></FONT></P>
								</TD>
								<TD WIDTH=89>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">VACACIONAL</FONT></FONT></P>
								</TD>
								<TD WIDTH=96>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">Especializacion
									2</FONT></FONT></P>
								</TD>
								<TD WIDTH=68>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">2</FONT></FONT></P>
								</TD>
								<TD WIDTH=55>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">SI</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD COLSPAN=3 WIDTH=54%>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Horario</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=23%>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Sede</B></FONT></FONT></P>
								</TD>
								<TD COLSPAN=2 WIDTH=23%>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Total
									a Pagar</B></FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD COLSPAN=3 WIDTH=54%>
									<P STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">LUNES
									A VIERNES 8 &ndash; 12 AM</FONT></FONT></P>
								</TD>
								<TD WIDTH=23%>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">CALLE
									54</FONT></FONT></P>
								</TD>
								<TD COLSPAN=2 WIDTH=23% SDVAL="118400" SDNUM="9226;0;[$$-240A]#.##0,00;[RED]([$$-240A]#.##0,00)">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>$118.400,00</B></FONT></FONT></P>
								</TD>
							</TR>
						</TABLE>
						<TABLE WIDTH=100% BORDER=1 BORDERCOLOR="#ffffff" CELLPADDING=4 CELLSPACING=0>
							<COL WIDTH=256*>
							<TR>
								<TD WIDTH=100% VALIGN=TOP>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>PAGO
									ORDINARIO</B></FONT></FONT></P>
									<P ALIGN=CENTER><IMG SRC="codigos_barras/21515441.png" NAME="gr&aacute;ficos8" ALIGN=LEFT WIDTH=389 HEIGHT=58 BORDER=0><BR CLEAR=LEFT><BR>
									</P>
								</TD>
							</TR>
							<TR>
								<TD WIDTH=100% VALIGN=TOP>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>PAGO
									EXTRAORDINARIO</B></FONT></FONT></P>
									<P ALIGN=CENTER><IMG SRC="codigos_barras/21515441.png" NAME="gr&aacute;ficos7" ALIGN=LEFT WIDTH=389 HEIGHT=58 BORDER=0><BR CLEAR=LEFT><BR>
									</P>
								</TD>
							</TR>
						</TABLE>
					</TD>
					<TD WIDTH=210>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">-
						PAGUE UNICAMENTE EN EFECTIVO -</FONT></FONT></P>
					</TD>
				</TR>
				<TR VALIGN=TOP>
					<TD WIDTH=479>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">-
						COPIA ILUD - </FONT></FONT>
						</P>
					</TD>
					<TD WIDTH=210>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">-
						Espacio para timbre o sello del banco - </FONT></FONT>
						</P>
					</TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
</TABLE>

</page>
<page>

<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0>
	<COL WIDTH=256*>
	<TR>
		<TD WIDTH=700 HEIGHT=78 VALIGN=TOP>
			<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#ffffff" CELLPADDING=4 CELLSPACING=0 FRAME=ABOVE RULES=NONE>
				<COL WIDTH=92>
				<COL WIDTH=185>
				<COL WIDTH=131>
				<COL WIDTH=183>
				<COL WIDTH=109>
				<TR>
					<TD WIDTH=92>
						<P><IMG SRC="Ilud.jpg" NAME="gr&aacute;ficos1" ALIGN=LEFT WIDTH=67 HEIGHT=46 BORDER=0><BR CLEAR=LEFT><BR>
						</P>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>BANCO
						DE OCCIDENTE</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=185>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>-ILUD-</B></FONT></FONT></P>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>INSTITUTO
						DE LENGUAS DE LA UNIVERSIDAD DISTRITAL</B></FONT></FONT></P>
						<P ALIGN=CENTER><BR>
						</P>
						<P ALIGN=LEFT><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>CUENTA
						No: 230864282</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=131>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>COMPROBANTE
						DE PAGO</B></FONT></FONT></P>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>No
						6436353</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=183>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>UNIVERSIDAD
						DISTRITAL</B></FONT></FONT></P>
						<P ALIGN=CENTER>&ldquo;<FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Francisco
						Jos&eacute; de Caldas&rdquo;</B></FONT></FONT></P>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>NIT
						899.999.230.7</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=109>
						<P ALIGN=CENTER><IMG SRC="escudo.gif" NAME="gr&aacute;ficos2" ALIGN=LEFT WIDTH=99 HEIGHT=73 BORDER=0><BR CLEAR=LEFT><BR>
						</P>
					</TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=700 VALIGN=TOP>
			<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0>
				<COL WIDTH=115>
				<COL WIDTH=119>
				<COL WIDTH=116>
				<COL WIDTH=116>
				<COL WIDTH=116>
				<COL WIDTH=116>
				<TR VALIGN=TOP>
					<TD WIDTH=115>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Nombre
						Estudiante:</B></FONT></FONT></P>
					</TD>
					<TD COLSPAN=3 WIDTH=350>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">LEIDY
						YULIETH PUENTES GUTIERREZ</FONT></FONT></P>
					</TD>
					<TD WIDTH=116>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Fecha
						de Expedici&oacute;n:</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=116 SDVAL="42177" SDNUM="9226;0;DD/MM/AA">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">22/06/15</FONT></FONT></P>
					</TD>
				</TR>
				<TR VALIGN=TOP>
					<TD WIDTH=115>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Identificaci&oacute;n</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=119 SDVAL="1012400465" SDNUM="9226;">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">1012400465</FONT></FONT></P>
					</TD>
					<TD WIDTH=116>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Tel&eacute;fono:</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=116 SDVAL="7762176" SDNUM="9226;">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">7762176</FONT></FONT></P>
					</TD>
					<TD WIDTH=116>
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Pague
						Hasta:</B></FONT></FONT></P>
					</TD>
					<TD WIDTH=116 SDVAL="42181" SDNUM="9226;0;DD/MM/AA">
						<P><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">26/06/15</FONT></FONT></P>
					</TD>
				</TR>
			</TABLE>
		</TD>
	</TR>
	<TR>
		<TD WIDTH=700 VALIGN=TOP>
			<TABLE WIDTH=700 BORDER=1 BORDERCOLOR="#ffffff" CELLPADDING=4 CELLSPACING=0>
				<COL WIDTH=481>
				<COL WIDTH=208>
				<TR VALIGN=TOP>
					<TD WIDTH=481>
						<TABLE WIDTH=481 BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0>
							<COL WIDTH=46*>
							<COL WIDTH=40*>
							<COL WIDTH=52*>
							<COL WIDTH=59*>
							<COL WIDTH=31*>
							<COL WIDTH=28*>
							<TR VALIGN=TOP>
								<TD WIDTH=46>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Inscripci&oacute;n</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=40>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Programa</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=52>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Periodo</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=59>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Nivel</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=31>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Grupo</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=28>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Carnet</B></FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=46 SDVAL="51520739" SDNUM="9226;">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">51520739</FONT></FONT></P>
								</TD>
								<TD WIDTH=40>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">Ingles</FONT></FONT></P>
								</TD>
								<TD WIDTH=52>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">VACACIONAL</FONT></FONT></P>
								</TD>
								<TD WIDTH=59>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">Especializacion
									2</FONT></FONT></P>
								</TD>
								<TD WIDTH=31>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">2</FONT></FONT></P>
								</TD>
								<TD WIDTH=28>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">SI</FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD COLSPAN=3 WIDTH=245>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Horario</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=110>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Sede</B></FONT></FONT></P>
								</TD>
								<TD COLSPAN=2 WIDTH=110>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Total
									a Pagar</B></FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD COLSPAN=3 WIDTH=245>
									<P STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">LUNES
									A VIERNES 8 &ndash; 12 AM</FONT></FONT></P>
								</TD>
								<TD WIDTH=110>
									<P ALIGN=CENTER STYLE="font-weight: normal"><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">CALLE
									54</FONT></FONT></P>
								</TD>
								<TD COLSPAN=2 WIDTH=110 SDVAL="118400" SDNUM="9226;0;[$$-240A]#.##0,00;[RED]([$$-240A]#.##0,00)">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>$118.400,00</B></FONT></FONT></P>
								</TD>
							</TR>
						</TABLE>
						<P><BR></P>
						<TABLE WIDTH=481 BORDER=1 BORDERCOLOR="#000000" CELLPADDING=4 CELLSPACING=0>
							<COL WIDTH=279*>
							<COL WIDTH=197*>
							<TR VALIGN=TOP>
								<TD WIDTH=279>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Descripci&oacute;n</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=197>
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>Valor</B></FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=279>
									<P ALIGN=JUSTIFY><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>MATRICULA</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=197 SDVAL="118400" SDNUM="9226;0;[$$-240A]#.##0,00;[RED]([$$-240A]#.##0,00)">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>$118.400,00</B></FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=279>
									<P ALIGN=JUSTIFY><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>MATRICULA
									EXTRAORDINARIA</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=197 SDVAL="215000" SDNUM="9226;0;[$$-240A]#.##0,00;[RED]([$$-240A]#.##0,00)">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>$215.000,00</B></FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=279>
									<P ALIGN=JUSTIFY><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>CARNET</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=197 SDVAL="14800" SDNUM="9226;0;[$$-240A]#.##0,00;[RED]([$$-240A]#.##0,00)">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>$14.800,00</B></FONT></FONT></P>
								</TD>
							</TR>
							<TR VALIGN=TOP>
								<TD WIDTH=279>
									<P ALIGN=JUSTIFY><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>SEGURO</B></FONT></FONT></P>
								</TD>
								<TD WIDTH=197 SDVAL="3000" SDNUM="9226;0;[$$-240A]#.##0,00;[RED]([$$-240A]#.##0,00)">
									<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt"><B>$3.000,00</B></FONT></FONT></P>
								</TD>
							</TR>
						</TABLE>						
					</TD>
					<TD WIDTH=208>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">-
						PAGUE UNICAMENTE EN EFECTIVO -</FONT></FONT></P>
					</TD>
				</TR>
				<TR VALIGN=TOP>
					<TD WIDTH=481>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">-
						COPIA ESTUDIANTE - </FONT></FONT>
						</P>
					</TD>
					<TD WIDTH=208>
						<P ALIGN=CENTER><FONT FACE="Arial, sans-serif"><FONT SIZE=1 STYLE="font-size: 8pt">-
						Espacio para timbre o sello del banco - </FONT></FONT>
						</P>
					</TD>
				</TR>
			</TABLE>			
		</TD>
	</TR>
</TABLE>
</page>';


$html2pdf = new HTML2PDF('P','LETTER','en');
$html2pdf->WriteHTML($content);
$html2pdf->Output('3532543245.pdf','D');
?>


