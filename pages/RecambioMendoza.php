<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Mapfretec</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<!-- Custom Search Pane -->
    <link href="../bower_components/searchpane/dataTables.searchPane.min.css" rel="stylesheet" type="text/css">
</head>
<?php // if(trim($_SERVER['REMOTE_ADDR'])=="10.220.0.68" || trim($_SERVER['REMOTE_ADDR'])==trim(":::1") || trim($_SERVER['REMOTE_ADDR'])=="10.216.149.120" || trim($_SERVER['REMOTE_ADDR'])=="10.220.0.36" || trim($_SERVER['REMOTE_ADDR'])=="10.220.1.114"){?>
<body>
    <div id="wrapper">
      <?php include("../menues.php");?>
	  <?php include("formenvios.php");?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Recambio Informático Mapfre Mendoza </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
				<div class="col-lg-12">
					<div class="col-lg-6" height="auto">
							<div id="donut-exampleRicardo"></div>
					</div>
					<div class="col-lg-6">
						<div class="alert alert-success alert-dismissable">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
							<?php
							$query = 'select estatus, count(*) from recambiomendoza group by estatus';
							$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
							$cambiado=0;
							$proceso=0;
							$pendiente=0;
							if (!$result) {	echo "Ocurrió un error.\n";	exit;
							}
							$cant=0;
							while ($row = pg_fetch_row($result)) {

								echo $row[0]."=".$row[1]."<br></P>";
								if($row[0]=="CAMBIADO"){
									$cambiado=$row[1];
									$cant=$cant + $row[1] ;

								}
								if($row[0]=="PROCESO"){
									$proceso=$row[1];
									$cant=$cant + $row[1] ;

								}
								if($row[0]=="PENDIENTE"){
									$pendiente=$row[1];
									$cant=$cant + $row[1] ;

								}
							}  
							echo "Total de Equipos para Cambiar en Mendoza=$cant</p>";
							?>
							<input type='hidden' id='cambiado' value='<?php echo $cambiado; ?>'>
							<input type='hidden' id='proceso' value='<?php echo $proceso; ?>'>
							<input type='hidden' id='pendiente' value='<?php echo $pendiente; ?>'>
						</div>
					</div>

				</div>
				<!--
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<p>Nota: Para habilitar la edición del formulario, comunicarse al interno 3029, Soporte Microinformática.</p>
				</div>
				-->
			</div>
			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Listado de recambios equipos Mendoza
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
							<table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Empleado/Numa</th>
                                            <th>Direccion/Cargo</th>
                                            <th>ParAnterior</th>
                                            <th>Equipo Obsoleto</th>
                                            <th>Estatus(*)</th>
                                            <th>ParNuevo(*)</th>
                                            <th>Serial(*)</th>
                                            <th></th>

                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										$query = "select id,sucursal,direccion,empleado,numa,cargo, par, ip,observacion,modelo,ram,cpu,hd,estatus,parnew,serial,sistema,fecha_cambio FROM recambiomendoza  ORDER BY estatus ASC";
										$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

										// Imprimiendo los resultados en HTML

										if (!$result) {
											echo "Ocurrió un error.\n";
											exit;
										}
										while ($row = pg_fetch_row($result)) {
											$apagar="";
											$muestraboton="<button $apagar onClick='verificar($row[0])' class='btn btn-default'><i class='fa fa-save'></i></button>";
											$valor1=strtoupper($row[3]);
											$valor2=strtoupper($row[4]);

											$dapaga1="";
											$dapaga2="";
											$cadena="";
											if($row[13]=="PENDIENTE")
											{
												$cadena=$cadena."<option selected value='PENDIENTE' >PENDIENTE</option>";
											}else
												{
													$cadena=$cadena."<option value='PENDIENTE'>PENDIENTE</option>";
											}
											if($row[13]=="PROCESO")
											{
												$cadena=$cadena."<option selected value='PROCESO' >EN PROCESO</option>";
											}else{
												$cadena=$cadena."<option value='PROCESO'>EN PROCESO</option>";
											}
											if($row[13]=="CAMBIADO")
											{
												$cadena=$cadena."<option selected value='CAMBIADO' >CAMBIADO</option>";
												$muestraboton="(OK) $row[17]";
												$dapaga1="disabled";
												//$dapaga2="disabled";
											}else{
												$cadena=$cadena."<option value='CAMBIADO'>CAMBIADO</option>";
											}

										echo"<a href='envios.php?id='$row[0]''><tr> <a href='formenvios.php?id='$row[0]',hacer='editar''>



											<td>$valor1 / $valor2</td>
											<td>$row[2] / $row[5]</td>
											<td>".strtoupper($row[6])."</td>

											<td>$row[8],$row[9],$row[10],$row[11],$row[12],$row[7],Sis:$row[16]</td>
											<td>
												<select $apagar name='estatus$row[0]' $dapaga1 id='estatus$row[0]' class='form-control'>
												$cadena
                        </select>
											</td>
											<td>
												<input  class='form-control' $apagar size='11' id='new$row[0]' name='new$row[0]' value='".strtoupper($row[14])."' placeholder='Definir'>
											</td>
											<td>
												<input $apagar class='form-control' $dapaga2 size='11' id='serial$row[0]' name='serial$row[0]' value='$row[15]' placeholder='Serial'>
											</td>
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

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Custom Search Pane  -->
	<script src="../bower_components/searchpane/dataTables.searchPane.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

	<!-- Morrys  JavaScript -->
    <script src="../bower_components/morrisjs/morris.min.js"></script>
	<!-- raphael  JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript
    <script src="../dist/js/sb-admin-2.js"></script>
	-->
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->

    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
	function verificar(id) {
	//alert("entro"+id);
	parnew=document.getElementById("new"+id).value;
	estatus=document.getElementById("estatus"+id).value;
	serial=document.getElementById("serial"+id).value;
	ipcliente=document.getElementById("ipcliente").value;
	//alert("parnew"+parnew);
	//alert("estatus"+estatus);


           // $('.ajaxgif').removeClass('hide');
            var datos = 'parnew='+ parnew + '&estatus=' + estatus + '&id=' + id + '&serial=' + serial + '&ipcliente=' + ipcliente ;
            $.ajax({
                type: "POST",
                url: "updatemendoza.php",
                data: datos,
                success: function() {
                  //  $('.ajaxgif').hide();
					alert("Datos Ingresados Correctamente. Gracias");
					//document.getElementById("divinclu").disabled = true;
                    //$('.msg').text('Dato sActualizados!').addClass('msg_ok').animate({ 'right' : '130px' }, 300);
                },
                error: function() {
                   // $('.ajaxgif').hide();
					alert("Algo salio mal, Intente de neuvo mas tarde, informar a Ricardo Lopez, int:3029");
					//document.getElementById("divinclu").disabled = false;
                    //$('.msg').text('Hubo un error!').addClass('msg_error').animate({ 'right' : '130px' }, 300);
                }
            });
            return false;
      }
    	pendiente=document.getElementById("pendiente").value;
    	proceso=document.getElementById("proceso").value;
    	cambiado=document.getElementById("cambiado").value;
    	Morris.Donut({
    	  element: 'donut-exampleRicardo',
    	  data: [
    		{label: "PENDIENTE", value: pendiente},
    		{label: "EN PROCESO", value: proceso},
    		{label: "CAMBIADO", value: cambiado}
    	  ]
    	});

    </script>

</body>
<?php// }else{echo "No esta autorizado, para entrar a este sitio comunicarse al 3029. Gracias.";}?>

</html>
