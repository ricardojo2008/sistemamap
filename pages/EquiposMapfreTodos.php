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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">
       <?php include("../menues.php");?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Información McAffe</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            Equipos / Notebook / Detallado segun Consola McAffe 26 Abril 2018
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Par</th>
                                            <th>Ip</th>
                                            <th>User.</th>
                                            <th>Sistema</th>
                                            <th>Comu.</th>
                                            <th>Registro</th>
                                            <th>Cpu</th>
                                            <th>Ram</th>
                                            <th>Dns</th>


                                        </tr>
                                    </thead>
                                    <tbody>
										<?php
											$ultima_linea = system('ls', $retval);
											// Imprimir informacion adicional
											echo '
											</pre>
											<hr />Ultima linea de la salida: ' . $ultima_linea . '
											<hr />Valor de retorno: ' . $retval;

											//<!--  tiposrvipack  ultimo campo que me falta por mostrar en el listado de equipos
											// Conectando y seleccionado la base de datos
											$dbconn = pg_connect("host='localhost' dbname='mapfre' user='postgres' password='COPO2009'")
												or die('No se ha podido conectar: ' . pg_last_error());
											// Realizando una consulta SQL  MUESTRA TODOS LOS EQUIPOS DISPONIBLES CON SUS DATOS SEGUN MCAFEE
											/***********************************************************************************************/
											/****************************  Conculta Todos Los Registros   *//////////////////////////////////
											/*
											$query = 'SELECT nom_sis,ip,nom_user,etique,tip_so,pack_so,ult_comuni,ver_dat,nom_gru,sistem_64,tip_cpu,memor_fis_t,nom_dns  FROM equipos_mcaffe';

											/***************************************************************************************************/
											/***************************************************************************************************/
											/****************************  Conculta Equipos sin McAffe del listado de landesk   ****************/

											$query = 'SELECT nom_sis,ip,nom_user,tip_so,ult_comuni,nom_gru,tip_cpu,memor_fis_t,nom_dns  FROM equipos_mcaffe';


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
												/*$salida = shell_exec('ping '.$row[0] );
												echo "$row[0]". $salida;
												echo "<br>". $salida;*/
											  echo "<tr>
												<th>$row[0]</th>
												<th>$row[1]</th>
												<th>$row[2]</th>
												<th>$row[3]</th>
												<th>$row[4]</th>
												<th>$row[5]</th>
												<th>$row[6]</th>
												<th>$row[7]</th>
												<th>$row[8]</th>
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
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
