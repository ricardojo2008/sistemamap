<?php
    function conectar_PostgreSQL()
    {
        $conexion = pg_connect( "user='postgres'
			password='COPO2009'
			host='localhost'
			dbname='mapfre'"
		   ) or die( "Error al conectar: ".pg_last_error() );
		return $conexion;
    }
?>