<?php
// Conectando y seleccionado la base de datos  
$dbconn = pg_connect("host='localhost' dbname='mapfre' user='postgres' password='COPO2009'")
    or die('No se ha podido conectar: ' . pg_last_error());

// Realizando una consulta SQL
$query = 'SELECT * FROM envios';
$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

// Imprimiendo los resultados en HTML
 $cmdtuples= pg_affected_rows($result); 
 echo " la cantidad de resgistro es:$cmdtuples";
/*echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";
*/
$stat = pg_connection_status($dbconn);
  if ($stat === PGSQL_CONNECTION_OK) {
      echo '<br>Estado de la conexión ok='.	$stat;
  } else {
      echo '<br>No se ha podido conectar';
  }   

  if ($dbconn) {
   print "<br>Conectado correctamente a: " . pg_host($dbconn) . "<br/>\n";
	} else {
	   print pg_last_error($dbconn);
	   exit;
	}


	$encoding = pg_client_encoding($dbconn);

echo "<br>La codificación del cliente es: ", $encoding, "\n";

// Liberando el conjunto de resultados
pg_free_result($result);

// Cerrando la conexión
pg_close($dbconn);
?>