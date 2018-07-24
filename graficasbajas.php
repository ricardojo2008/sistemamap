<div class="col-lg-12">
	<div class="panel panel-default">
			<div class="panel-heading">
				Listado de Bajas de Pc Pendientes (Recambio)
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Empleado/Numa</th>     
								<th>Par Viejo</th>
								<th>Equipo Viejo</th>
								<th>Estatus</th>
								<th>Sucursal</th>
								<th>Fecha Cambio</th>
								<th>..</th>
							</tr>
						</thead>
						<tbody><?php
							$query = "select id,sucursal,direccion,empleado,numa,cargo, par, ip,observacion,modelo,ram,cpu,hd,estatus,parnew,serial,sucursal,fecha_cambio FROM recambio where estatus='CAMBIADO' ORDER BY fecha_cambio DESC";
							$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

							// Imprimiendo los resultados en HTML

							if (!$result) {
								echo "Ocurrió un error.\n";
								exit;
							}
							$cant=0;
							while ($row = pg_fetch_row($result)) {
								$apagar="disabled";
								$cant++;
								$muestraboton="<button $apagar onClick='' class='btn btn-default'><i class='fa fa-save'></i></button>";


							echo"

								<td>$cant</td>																	
								<td>$row[3] / $row[4]</td>	
								<td>".strtoupper($row[6])."</td>
								<td>$row[8],$row[9],$row[10],$row[11],$row[12],$row[7]</td>
								<td>$row[13]</td>
								<td>$row[16]</td>
								<td>$row[17]</td>
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
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
