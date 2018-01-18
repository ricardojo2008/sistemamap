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

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
                <a class="navbar-brand" href="index.html"></a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
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
                                    <a href="EquiposTodosAD.php">Equipos AD (PAR)</a>
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
                <div class="col-lg-24">
                    <h1 class="page-header">Listado de Equipos del AD (PAR) POR OFICINA</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-24">
                    <div class="panel panel-green">
                        <div class="panel-heading">
							Listado de Equipos del AD (PAR)
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
											<th>Oficina</th>
                                            <th>Nombreequipo</th>
                                            <th>Ip</th>
                                            <th>Sis_operativo</th>          
                                            <th>Parlandesk</th>
                                            <th>UserLandesk</th>
                                            <th>ReportLandesk</th>
                                            <th>ParMcAffe</th>
                                            <th>UserMcAffe</th>
											<th>Arquitectura Version</th>
                                            <th>Marca</th>
                                            <th>Modelo</th>
                                            <th>Memoria</th>
                                            <th>Cpu</th>  
											<th>ComuniMcAffe</th>
                                            		
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
											<td>$row[14]</td>
											<td>$row[0]</td>
											<td>$row[1]</td>
											<td>$row[2]</td>
											
											<td>$row[8]</td> 
											<td>$row[9]</td>  
											<td>$row[10]</td>  
											<td>$row[11]</td>  
											<td>$row[12]</td>  
											<td>$row[3]</td>
											
											<td>$row[4]</td>
											<td>$row[5]</td>
											<td>$row[6]</td>  
											<td>$row[7]</td>
											
																						 
											 <td>$row[13]</td> 											
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
