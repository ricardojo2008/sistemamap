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

    <!-- Morris Charts CSS -->
    <link href="../bower_components/morrisjs/morris.css" rel="stylesheet">
	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
      <?php require_once 'menues.php';?>
        <div id="page-wrapper">
		<div id="myfirstchart" style="height: 20%;"></div>
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Equipos Active Direct Completo</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <!-- /.row -->
            <div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            Equipos Mapfre segun Active Direct
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombreequipo</th>
                                            <th>Ip</th>
                                            <th>Sis_operativo</th>
                                            <th>Arquitectura Version</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Memoria</th>
                                            <th>Cpu</th>
                                            <th>Parlandesk</th>
                                            <th>Usuariolandesk</th>
                                            <th>Comuni_landesk</th>
                                            <th>Parmcaffe</th>
                                            <th>Usuariocaffe</th>
                                            <th>Comuni_caffe</th>
											<th>Oficina</th>
                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
										// Conectando y seleccionado la base de datos
										$dbconn = pg_connect("host='localhost' dbname='mapfre' user='postgres' password='COPO2009'")
											or die('No se ha podido conectar: ' . pg_last_error());

										// Realizando una consulta SQL  MUESTRA TODOS LOS EQUIPOS DISPONIBLES CON SUS DATOS SEGUN MCAFEE

										//consulta con la tabla equipos_horacio
										//$query = 'SELECT nombreequipo,ip,sis_operativo,arquitectura,arquitectura2,marca,modelo,memoria,nombre_puesto,direccion,ubicacion_fiscal_emple,usuario, count(*) as repite  FROM equipos_horacio group by nombreequipo,ip,sis_operativo,arquitectura,arquitectura2,marca,modelo,memoria,nombre_puesto,direccion,ubicacion_fiscal_emple,usuario order by repite desc ';
										//consulta con la tabla equipos_ad
										/*

										$query = 'SELECT nombreequipo,ip,sis_operativo,arquitectura,marca,modelo,memoria,cpu,(select oficina from ofired where SUBSTRING(ip,1,9)=SUBSTRING(dir_red,1,9) limit 1)   FROM equipos_ad group by nombreequipo,ip,sis_operativo,arquitectura,marca,modelo,memoria,cpu  ';
										*/

										//select * from equiposadcompleto where parlandesk is null
										$query = 'SELECT par_ad,ip_ad,sistem_ad,arquitectura_ad,marca_ad,modelo_ad,memoria_ad,cpu_ad,parlandesk,usuariolandesk,scanlandesk,parmcaffe,usuariomcaffe,ult_comunimcaffe,(select oficina from ofired where SUBSTRING(ip_ad,1,9)=SUBSTRING(dir_red,1,9) limit 1)   FROM equiposadcompleto group by par_ad,ip_ad,sistem_ad,arquitectura_ad,marca_ad,modelo_ad,memoria_ad,cpu_ad,parlandesk,usuariolandesk,scanlandesk,usuariomcaffe,ult_comunimcaffe,parmcaffe';


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
											<td>$row[1]</td>
											<td>$row[2]</td>
											<td>$row[3]</td>
											<td>$row[4]</td>
											<td>$row[5]</td>
											<td>$row[6]</td>
											<td>$row[7]</td>
											<td>$row[8]</td>
											<td>$row[9]</td>
											<td>$row[10]</td>
											<td>$row[11]</td>
											<td>$row[12]</td>
											<td>$row[13]</td>
											<td>$row[14]</td></tr>";
										}
										?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                            <div class="well">
                               <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
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

     <!-- Morris Charts JavaScript -->
    <script src="../bower_components/raphael/raphael-min.js"></script>
    <script src="../bower_components/morrisjs/morris.min.js"></script>
    <script src="../js/morris-data.js"></script>

	<!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

	 <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>

		new Morris.Bar({
			// ID of the element in which to draw the chart.
			element: 'myfirstchart',
			// Chart data records -- each entry in this array corresponds to a point on
			// the chart.
			data: [   //Se saco del listado las Oficinas con menos de 10 Equipos
				/*{ Tecnico: 'Daniel Blanco', value: 12 },
				{ Tecnico: 'Maximiliano Ventura', value: 3 },
				{ Tecnico: 'Pablo Zapata', value: 15 }*/
				//{ Tecnico: 'Avellaneda', value: 5},
				{ Tecnico: 'Bahía Blanca', value: 8},
				//{ Tecnico: 'Bariloche', value: 3},
				//{ Tecnico: 'Caballito', value: 5},
				//{ Tecnico: 'Catamarca', value: 3},
				//{ Tecnico: 'Chaco', value: 2},
				{ Tecnico: 'Cordoba I Colon', value: 26},
				{ Tecnico: 'Corrientes ', value: 34},
				//{ Tecnico: 'La Plata', value: 6},
				{ Tecnico: 'Lavalle', value: 63},
				//{ Tecnico: 'Lomas de Zamora', value: 5},
				{ Tecnico: 'Mar del Plata', value: 23},
				{ Tecnico: 'Mendoza', value: 22},
				{ Tecnico: 'Neuquen', value: 8},
				//{ Tecnico: 'Olavarria', value: 3},
				{ Tecnico: 'OPTIMA', value: 360},
				//{ Tecnico: 'Pilar', value: 5},
				//{ Tecnico: 'Posadas ', value: 2},
				//{ Tecnico: 'Río Cuarto', value: 5},
				{ Tecnico: 'Rosario', value: 25},
				{ Tecnico: 'San Juan', value: 8},
				/*{ Tecnico: 'San Luis', value: 4},
				{ Tecnico: 'Santa Fe', value: 3},
				{ Tecnico: 'Santa Rosa', value: 4},*/
				{ Tecnico: 'Libertador(CTS Belgrano)', value: 8},
				{ Tecnico: 'Tucuman', value: 10},
				//{ Tecnico: 'Villa Gesell', value: 2},
				//{ Tecnico: 'Villa Maria', value: 5},
				//{ Tecnico: 'Zarate', value: 5},
				{ Tecnico: 'Vacio', value: 2}
			],
			grid:true,
			hideHover:false,
			// The name of the data record attribute that contains x-values.
			xkey: 'Tecnico',
			// A list of names of data record attributes that contain y-values.
			ykeys: ['value'],
			// Labels for the ykeys -- will be displayed when you hover over the
			// chart.
			labels: ['Value'],
			resize:true
		});

	</script>


</body>

</html>
