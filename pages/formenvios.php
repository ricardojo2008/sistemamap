<?php
echo "llego hasta aqui";
require_once 'conexcion.php';
// Conectando y seleccionado la base de datos  
$dbconn = conectar_PostgreSQL();
//echo $dbconn;
//echo "Mensaje importante".$_POST['marca'];
	if ( !empty($_POST['submit']) ) {
		echo "Se puede guardar, los siguientes datos:<br><br>";
	//$query = "INSERT INTO `noticias` (titulo,cuerpo,estado) values ('{$_POST['titulo']}','{$_POST['cuerpo']}','{$_POST['estado']}')";
	//$response = mysql_query($query, $conn);
	}
	$ubicacion=$_POST['ubicacion'];
	$usuario=$_POST['usuario'];
	$componente=$_POST['componente'];
	$observacion=$_POST['observacion'];
	$marca=$_POST['marca'];
	$modelo=$_POST['modelo'];
	$remito=$_POST['remito'];
	$serial=$_POST['serial'];
	
	/*
	if ( !empty($ubicacion]) && !empty($componente])) 
	{*/

	/*	
		$query = "insert into envios (componente ,modelo ,marca ,serial ,usuario ,ubicacion,remito) VALUES ('$componente','$modelo','$marca','$serial','$usuario','$ubicacion','$remito')";
		echo $query;
		$response = pg_query($dbconn,$query);
		//echo $response;
	*/
		//header( "Location: envios.php?incluir=false" );
		header( "Location:"-2 );
		die;


?>