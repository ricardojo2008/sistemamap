<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-primary">
			<div class="panel-heading">
				Listado de Bajas de Pc Pendientes (Recambio)
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
				<table class="table table-hover" id="dataTables-example2">
						<thead>
							<tr>								
								<th>#</th>                                            
								<th>Nombre / Numa</th>                                            
								<th>Direccion / Cargo</th>                                            
								<th>Par Viejo</th>                                            
								<th>Equipo Obsoleto</th>
								<th>Estatus</th>
								<th>Sucursal</th>
								<th>Fecha Cambio</th>
								<th>PAR Nuevo</th>
								<th>Serial</th>
								<th></th>							   
							</tr>
						</thead>
						<tbody>
							<?php
							$query = "select id,sucursal,direccion,empleado,numa,cargo, par, ip,observacion,modelo,ram,cpu,hd,estatus,parnew,serial,sucursal,fecha_cambio FROM recambioptima where estatus='CAMBIADO' ORDER BY fecha_cambio DESC";
							$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
							$cant=0;
							// Imprimiendo los resultados en HTML

							if (!$result) {
								echo "Ocurrió un error.\n";
								exit;
							}
							while ($row = pg_fetch_row($result)) {
								$apagar="disabled";
								$cant++;
								$muestraboton="<button $apagar onClick='verificar($row[0])' class='btn btn-default'><i class='fa fa-save'></i></button>";
							echo"<a href='envios.php?id='$row[0]''><tr> <a href='formenvios.php?id='$row[0]',hacer='editar''>
								
								<td>$cant</td>								
								<td>$row[3] / $row[4]</td>								
								<td>$row[2] / $row[5]</td>								
								<td>".strtoupper($row[6])."</td>								
								<td>$row[8],$row[9],$row[10],$row[11],$row[12],$row[7]</td>
								<td>$row[13]</td>
								<td>$row[16]</td>
								<td>$row[17]</td>
								<td>$row[14]</td>
								<td>$row[15]</td>
								<td>					 
									$muestraboton
								</td>
								</tr>";
							}
							?>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
				<div class="well">
					 <p>Hola como estas?</p>
				</div>
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->