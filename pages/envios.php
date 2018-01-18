<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

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
	<script src="../bower_components/searchpane/dataTables.searchPane.min.js"></script>

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">Verificación de Equipos Mapfre.</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil Uuasuario</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i> Actulalizar Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->
			
            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Mapfre<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                               <li>
                                    <a href="EquiposLandesk.php">Equipos Landesk</a>
                                </li>
								<li>
                                    <a href="EquiposMapfreTodos.php">Equipos / Servidores / Notebook / Detallado</a>
                                </li>                                
								<li>
                                    <a href="EquiposTodosAD.php">Equipos AD</a>
                                </li>
                                <li>
                                    <a href="envios.php">Envios</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>
		
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Gestión de Envios </h1>
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
					<div class="panel panel-primary">
						<div class="panel-heading">
							Registro de envios.
						</div>
						<div class="panel-body">
							<form role="form" action="formenvios.php" method="post">
							<div class="col-lg-3" class="form-group">								
								<label>Ubicacion</label>								
								<input class="form-control" value='' name='ubicacion' placeholder="Escribir dirección de envio.">				
							</div>
							<div class="col-lg-3" class="form-group">								
								<label>Usuario Destino</label>								
								<input class="form-control" value='' name='usuario' placeholder="Nombre del Usuario destinatario">
							</div>
							<div class="col-lg-3" class="form-group">								
								<label>Marca</label>								
								<input class="form-control" value='' name='marca' placeholder="	Ingrese una marca del equipo">			
							</div>
							<div class="col-lg-3" class="form-group">								
								<label>Modelo</label>								
								<input class="form-control" value='' name='modelo' placeholder="Escribir el modelo del equipo.">
							</div>		
							<div class="col-lg-6" class="form-group">								
								<label>Remito</label>								
								<input class="form-control" value='' name='remito' placeholder="Escribir # Remito si aplica.">
							</div>
							<div class="col-lg-6" class="form-group">								
								<label>Serial</label>								
								<input class="form-control" value='' name='serial' placeholder="Escribir # de serie si aplica.">
							</div>
							<div class="col-lg-6" class="form-group">								
								<label>Componente</label>								
								<textarea class="form-control" value='' name='componente' placeholder="Escriba Componente"></textarea>		
							</div>
							<div class="col-lg-6" class="form-group">								
								<label>Observacion</label>								
								<textarea class="form-control" value='' name='observacion' placeholder="Escriba una Observacion"></textarea>
							</div>
							
						
						</DIV>
						<div class="panel-body">
							<div class="col-lg-6" class="form-group">								
								<button  type ="button" class="btn btn-online btn-primary btn-lg btn-block" data-toggle="modal" data-target="#myModal" >Guardar</button>
							</div>	
							<div class="col-lg-6" class="form-group">								
								<button  class="btn btn-online btn-success btn-lg btn-block" data-toggle="modal" data-target="#myModal" disabled >Modificar</button>
							</div>
						</div>
						
						<div class="panel-body">
								
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
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
                                            <button type="submit" class="btn btn-primary">Aceptar</button>
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
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Envios realizados en Mapfre hasta el 11 de Diciembre del 2017
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
							                                 <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>componente</th>
                                            <th>modelo</th>
                                            <th>marca</th>
                                            <th>serial version</th>
                                            <th>usuario</th>
                                            <th>ubicacion</th>
                                            <th>crq</th>
                                            <th>Fecha</th>
                                        </tr>
                                    </thead>
                                    <tbody>  
										<?php
										require_once 'conexcion.php';
										// Conectando y seleccionado la base de datos  
										$dbconn = conectar_PostgreSQL();
										echo $dbconn;
										/*
										$dbconn = pg_connect("host='localhost' dbname='mapfre' user='postgres' password='COPO2009'")
											or die('No se ha podido conectar: ' . pg_last_error());
											
											*/

										// Realizando una consulta SQL
										$query = 'SELECT componente,modelo,marca,serial,usuario,ubicacion,crq,fecha_envio FROM envios order by componente asc';
										$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());

										// Imprimiendo los resultados en HTML
										 $cmdtuples= pg_affected_rows($result); 
										 

										if (!$result) {
											echo "Ocurrió un error.\n";
											exit;
										}
										while ($row = pg_fetch_row($result)) {
										echo "<tr>
											<td>$row[0]</td>
											<td>$row[1]</td>
											<td>$row[2]</td>
											<td>$row[3]</td>
											<td>$row[4]</td>
											<td>$row[5]</td>
											<td>$row[6]</td>  
											<td>$row[7]</td></tr>";
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

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
	/*$(document).ready(function() {
		$('#dataTables-example').DataTable( {
		searchPane: true
		});
    });*/
		
    </script>
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
