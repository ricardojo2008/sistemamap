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


</head>

<body>

    <div id="wrapper">
      <?php include("../menues.php");?>
	  <?php include("formenvios.php");?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestión de envios </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<div class="row">
				<div class="col-lg-12">

				<?php if(!empty($_GET['incluir'])) { ?>
					<div class="alert alert-warning alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						El envio se agreg&oacute; con &eacute;xito.
					</div>
				<?php } ?>
				<?php if(!empty($mensaje)) { ?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo $mensaje;?>
					</div>
				<?php } ?>
				<?php if(!empty($_GET['hacer'])) { ?>
					<div class="alert alert-danger alert-dismissable">
						<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
						<?php echo "Se puede proceder a modificar ID:".$_GET['id'];?>
					</div>
				<?php } ?>
				<input class="form-control" value='' name='hacer' value='nada' >
					<div class="panel panel-primary">
						<div class="panel-heading">
							Registro de envios.
						</div>
						<div class="panel-body">
							<form role="form" action="envios.php" method="POST">
							<div class="col-lg-3" class="form-group">
                <input type='hidden' id='id' value='' disabled>
								<label>Ubicacion</label>
								<input class="form-control" value='' name='ubicacion' id='ubicacion' placeholder="Escribir dirección de envio.">
							</div>
							<div class="col-lg-3" class="form-group">
								<label>Usuario Destino</label>
								<input class="form-control" value='' name='usuario' id='usuario' placeholder="Nombre del Usuario destinatario">
							</div>
							<div class="col-lg-3" class="form-group">
								<label>Marca</label>
								<input class="form-control" value='' name='marca' id='marca' placeholder="Ingrese una marca del equipo">
							</div>
							<div class="col-lg-3" class="form-group">
								<label>Modelo</label>
								<input class="form-control" value='' name='modelo' id='modelo' placeholder="Escribir el modelo del equipo.">
							</div>
							<div class="col-lg-6" class="form-group">
								<label>Remito</label>
								<input class="form-control" value='' name='remito' id='remito' placeholder="Escribir # Remito si aplica.">
							</div>
							<div class="col-lg-6" class="form-group">
								<label>Serial</label>
								<input class="form-control" value='' name='serial' id='serial' placeholder="Escribir # de serie si aplica.">
							</div>
							<div class="col-lg-6" class="form-group">
								<label>Componente</label>
								<textarea class="form-control" value='' name='componente' id='componente' placeholder="Escriba Componente"></textarea>
							</div>
							<div class="col-lg-6" class="form-group">
								<label>Observacion</label>
								<textarea class="form-control" value='' name='observacion' id='observacion' placeholder="Escriba una Observacion"></textarea>
							</div>


						</DIV>
						<div class="panel-body">
							<div class="col-lg-6" class="form-group">
								<button  type ="button" class="btn btn-online btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal" >Guardar</button>
							</div>
							<div class="col-lg-6" class="form-group">

							</div>
						</div>

						<div class="panel-body">
                         <!-- Modal -->
                  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                  <h4 class="modal-title" id="myModalLabel">Enviar Datos</h4>
                              </div>
                              <div class="modal-body">
        											<div class="row">
        												<div class="col-lg-12" class="form-group">
        													<p>Esta seguro que desea guardar los datos?</p>
        												</DIV>
        											</div>
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                                  <button type="button" onClick="IngresarEnvios()"  class="btn btn-primary">Aceptar</button>
                              </div>
                          </div>
                          <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                  </div>
							</form><!--formulario registro de envios-->
						</div>
					</div>
				</div>
			</div>
			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Envios realizados en Mapfre hasta el 19 de Abril del 2018
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
							<table class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Equipo</th>
                                            <th>Modelo</th>
                                            <th>Marca</th>
                                            <th>Serial</th>
                                            <th>Usuario</th>
                                            <th>Ubicacion</th>
                                            <th>Remito</th>
                                            <th>Fecha</th>
                                            <th>Editar</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											require_once 'conexcion.php';
											// Conectando y seleccionado la base de datos
											$dbconn = conectar_PostgreSQL();
											//echo $dbconn;
											/*
											$dbconn = pg_connect("host='localhost' dbname='mapfre' user='postgres' password='COPO2009'")
												or die('No se ha podido conectar: ' . pg_last_error());

												*/

											// Realizando una consulta SQL
											$query = 'select id,componente,modelo,marca,serial,usuario,ubicacion,remito,fecha_envio FROM envios ORDER BY id DESC';
											$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

											// Imprimiendo los resultados en HTML

											if (!$result) {
												echo "Ocurrió un error.\n";
												exit;
											}
											while ($row = pg_fetch_row($result)) {
												echo"<a href='envios.php?id='$row[0]''><tr> <a href='formenvios.php?id='$row[0]',hacer='editar''>
												<td>$row[0]</td>
												<td>$row[1]</td>
												<td>$row[2]</td>
												<td>$row[3]</td>
												<td>$row[4]</td>
												<td>$row[5]</td>
												<td>$row[6]</td>
												<td>$row[7]</td>
												<td><input class='form-control' value='' name='serial' value='' placeholder='$row[8]'></td>
												<td><a href='envios.php?id=$row[0]'>editar</a></td>
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

	<!-- Custom Search Pane
  <link href="../bower_components/searchpane/dataTables.searchPane.min.css" rel="stylesheet" type="text/css">
	<script src="../bower_components/searchpane/dataTables.searchPane.min.js"></script>
  -->


    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    /************************fORMULARIO DE INGRESO DE ENVIOS AJAX *******************************/
	function IngresarEnvios(id) {
		alert("hola"+id);
	}
   /* function IngresarEnvios(funcion,id) {
  	//alert("entro"+id);
  	//parnew=document.getElementById("new"+id).value;
  	//estatus=document.getElementById("estatus"+id).value;
  	//serial=document.getElementById("serial"+id).value;
  	//alert("parnew"+parnew);
  	alert("estatus"+funcion);


             // $('.ajaxgif').removeClass('hide');

           /*   var datos = 'parnew='+ parnew + '&estatus=' + estatus + '&id=' + id + '&serial=' + serial ;
              $.ajax({
                  type: "POST",
                  url: "upatenvios.php",
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

		*/
    /********************************************************************************************/

    </script>
</body>
</html>
