<?php
//print "llego hasta aqui";
require_once 'conexcion.php';
$dbconn = conectar_PostgreSQL();
//$mensaje=$_POST['submit'];
$parnew = $_POST['parnew'];
$estatus = $_POST['estatus'];
$serial = $_POST['serial'];
$id = $_POST['id'];
$ipcliente = $_POST['ipcliente'];
$userito= get_current_user().",<br>Ip Cliente: $ipcliente <BR> Host :".gethostname().", <BR>IP :".gethostbynamel(gethostname())[0].",<BR> Sistema :".php_uname();

	$query = "update recambioptima set serial='$serial',parnew='$parnew',estatus='$estatus',fecha_cambio=now() where id='$id'";
	$response = pg_query($dbconn,$query);
	preparar_mensaje($id,$userito);//llamado a la funcion para preparar el mail automatizado, de aviso sobre el cambio de estatus.

function enviar_mail($para, $título, $mensaje)
{
	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    mail($para, $título, $mensaje, $cabeceras);
}
function preparar_mensaje($id,$userito){
	
	// Varios destinatarios
	$para  = 'tec07@mapfre.com.ar' . ', '; // atención a la coma
	
	$para .= 'ricardojo2008@gmail.com';
	$mensaje="</p>Estimado usuario, la siguiente informaci&oacute;n refleja los cambios realizados:</p><br>.";
	//buscamos los datos del equipo que se esta cambiando en nuestra base de datos...
		$query = "select id,sucursal,direccion,empleado,numa,cargo, par, ip,observacion,modelo,ram,cpu,hd,estatus,parnew,serial FROM recambioptima where id='$id'";
		$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		
		if (!$result) {
			echo "Ocurrió un error.\n";
			exit;
		}
		$mensaje=$mensaje."<table width='60%' center  border='1' cellpadding='0' cellspacing='0'>";
		$mensaje=$mensaje."<tr>
			<th>Nombre Empleado / Numa</th>
			<th>Direccion / Cargo</th>
			<th>Par Viejo Eliminar</th>                                            
			<th>Equipo Obsoleto </th>
			<th>Estatus Recambio</th>
			<th>Par Nuevo Asignado</th>
			<th>Serial Del Equipo)</th>
			</tr>";		
		while ($row = pg_fetch_row($result)) {
			$apagar="";
			$muestraboton="<button $apagar onClick='verificar($row[0])' class='btn btn-default'><i class='fa fa-save'></i></button>";
			$valor1=strtoupper($row[3]);
			$valor2=strtoupper($row[4]);
			
			$paranterior=$row[6];
			$dapaga1="";
			$dapaga2="";
			$cadena="";
			if($row[13]=="PENDIENTE")
			{
				$cadena=$row[13];
			}
			if($row[13]=="PROCESO")
			{
				$cadena="EN PROCESO";
			}
			if($row[13]=="CAMBIADO")
			{
				$cadena=$row[13];
				//$para  .=  ', '.'emiscar@mapfre.com.ar' ; // aviso a servidores para eliminar del AD
				$para  .=  ', '.'servidores@mapfre.com.ar' ; // aviso a servidores para eliminar del AD
			}
		
		$mensaje=$mensaje."<tr>
			<td>$valor1 / $valor2</td>
			<td>$row[2] / $row[5]</td>
			<td>".strtoupper($row[6])."</td>			
			<td>$row[8],$row[9],$row[10],$row[11],$row[12],$row[7]</td>
			<td>$cadena</td>
			<td>$row[14]</td>
			<td>$row[15]</td>
			</tr>";
		}
		$mensaje=$mensaje."</table><br></p>Ejecutado por: <br>Usuario: $userito)</p><br>.";
		$mensaje=$mensaje."<br> Sistema automatizado, empresa de seguros Mapfre. Cualquier duda contactar al personal de Soporte Técnico. Int 3006/3029.";

	// título
	$título = 'Notificacion Recambio Optima, (ESTATUS :'.strtoupper($cadena).') ( Referencia #'.$id.') ('.$paranterior.')';
	enviar_mail($para, $título, $mensaje);
}

?>