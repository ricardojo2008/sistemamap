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

    <!-- DataTables searchpane CSS -->
    <link href="../bower_components/searchpane/dataTables.searchPane.min.css" rel="stylesheet">

   
    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
	 <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>
	 <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

	
	<!-- DataTables SearchPane -->
    <script src="..bower_components/searchpane/dataTables.searchPane.min.js"></script>
	<script type="text/javascript" charset="utf-8">
			$(document).ready( function () {
				$('#example').DataTable( {
					searchPane: true,
					stateSave: true,
					select: true,
					select: {
						style: 'multi'
					}
				} );
				
			} );
			 
	</script>
</head>

<body>

    <div id="wrapper">
      <?php include("../menues.php");?>
      <div id="page-wrapper">
			<br>
			<div class="container">
				<div class="row">
					<div class="col-md-11">
						<div class="jumbotron">
							<h1>Mapfre 2018 (Optima PCs)</h1> 
							<p>Reporte Generado del Inventario Mapfre 2018, solo PCs con nombre del usuario, ubicación, interno e IP.</p> 
						</div>
					</div>
				</div>	
			</div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            Datos
                        </div>
						  <!-- <div class="container"> -->
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="dataTable_wrapper">
									<table class="table table-striped table-bordered table-hover" id="example">
										<thead>
											<tr>
												<th>Nombre</th>
												<th>S.O</th>
												<th>Piso</th>
												<th>Identificador</th>
												<th>Puesto</th>
												<th>Usuario</th>
												<th>Observacion</th>
											</tr>
										</thead>
										
										<tbody>
										<?php
											echo 

											//<!--  tiposrvipack  ultimo campo que me falta por mostrar en el listado de equipos
											// Conectando y seleccionado la base de datos
											$dbconn = pg_connect("host='localhost' dbname='mapfre' user='postgres' password='COPO2009'")
												or die('No se ha podido conectar: ' . pg_last_error());
											// Realizando una consulta SQL  MUESTRA TODOS LOS EQUIPOS DISPONIBLES CON SUS DATOS SEGUN LANDESK

											/***********************************************************************************************/
											/****************************  Conculta Todos Los Registros   *//////////////////////////////////
											/*
											$query = 'SELECT nom_par,tipo,sistema,ip,gateway,scan,usuario  FROM equipos_landesk ';
											/*************************************************************************************************/
											/***********************************************************************************************/
											/****************************  Conculta Equipos sin McAffe del listado de landesk   *//////////////////////////////////

											$query = 'SELECT nombreequipo,ip,sis_operativo,marca,modelo,nombreuser,oficina,puestocompleto,interno,observacion,piso,letra,puesto  FROM equipos_mapfre ';


											/*LISTADO DE EQUIPOS REVISAR LANDESK AL 03 09 2017 LA CONSULTA SE REALIZA CON LA TABLA COMPARAR

											$query = 'SELECT c.nombrepar,e.ip,usuario,e.tipoequipo,e.tiposistema,e.fechaultanti,e.versionanti,e.ubiacacionequipo
											FROM  comparar as c  full join equipos as e on e.nombrepar=c.nombrepar order by c.nombrepar asc';
											*/

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
												<td>S.O=$row[2]</td>
												<td>($row[10])></td>
												<td>$row[11]</td>
												<td>$row[12]</td>
												<td>".ucwords($row[5])."</td>
												<td>Interno:$row[8] :: Equipo : $row[3],$row[4]. :: IP:$row[1] :: $row[9] </td></tr>";
											}
										?>
									   </tbody>
									</table>
									
								 <!-- </div> -->
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

   

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

   
    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
	/*
	
	$('#dataTables-example').DataTable( {
    searchPane: true
	} );
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true

        });
    });
	$('#dataTables-example').DataTable( {
    searchPane: {
        container: '.searchPanes',
        threshold: 0
    }
	} );
	var table = $('#dataTables-example').DataTable( {
    searchPane: true
	} );
 
	table.row.add( ... ).draw();
	table.searchPanes.rebuild();
	
	
	*/
	/*$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#example tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
 
    // DataTable
    var table = $('#example').DataTable();
 
    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
	} );*/
    </script>

</body>

</html>
