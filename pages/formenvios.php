<?php
//print "llego hasta aqui";
require_once 'conexcion.php';
$dbconn = conectar_PostgreSQL();
//$mensaje=$_POST['submit'];

if (!empty($_POST))	
{
	$mensaje="entro al submit";
		$ubicacion=$_POST['ubicacion'];
		$usuario=$_POST['usuario'];
		$componente=$_POST['componente'];
		$observacion=$_POST['observacion'];
		$marca=$_POST['marca'];
		$modelo=$_POST['modelo'];
		$remito=$_POST['remito'];
		$serial=$_POST['serial'];
		$fecha=date("d/m/Y h:i:s");
	
	if (empty($_POST['ubicacion'])) {
		echo "<br> empty entro valor".$ubicacion;
	}else{
		
		echo "<br>empty no paso";
	}//end else
	
	if (isset($_POST['ubicacion'])) {
		echo "<br>isset entro valor".$ubicacion;
	}else{
		
		echo "<br>isset no paso";
	}//end else
	//echo $_GET['hacer'];
	/*
	if($_POST['hacer']=='nada'){
		if ($componente!=" ") 
		{
			$query = "insert into envios (componente ,modelo ,marca ,serial ,usuario ,ubicacion,remito,fecha_envio) VALUES ('$componente','$modelo','$marca','$serial','$usuario','$ubicacion','$remito','$fecha')";
			echo $query;
			$response = pg_query($dbconn,$query);			
			header( "Location: envios.php?incluir=true" );
			die;
		}else{
			
			$mensaje='(*)Existen campos vacios, no se pudo guardar los datos: (Componente)';
			echo $mensaje;
			header( "Location: envios.php?mensaje='$mensaje'" );
			die;
		}
	}else{
		
		header( "Location: envios.php?id=$_POS['id'],$_POST['hacer']" );
		
	}*/
	/*}echo "no entro en ningun if";
*/
}else{
	$mensaje="Formulario se encuentra en mantenimiento, ingresar los envios al archivo de excel, ubicado en el \\sar001070, carpeta Envios. Gracias";
	
}//end if
?>