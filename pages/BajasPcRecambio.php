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
<body>
    <div id="wrapper">
      <?php include("../menues.php");?>
	  <?php include("formenvios.php");?>
        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Los PAR Viejos pueden ser dados de BAJA en el: Active Direct y Seguridad Informática </h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<!-- /.row -->
            <div class="row">
                <div class="col-lg-12"><!-- /.row -->
					<div class="panel-body">
						<!-- Nav tabs -->
						<ul class="nav nav-pills">
							<li class="active"><a href="#home" data-toggle="tab">LaValle</a>
							</li>
							<li><a href="#seguridad" data-toggle="tab">Optima</a>
							</li>							
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div class="tab-pane fade in active" id="home">
								<h4>..</h4>
								<?php include("../graficasbajas.php");?>
							</div>
							<div class="tab-pane fade" id="seguridad">
								<h4>.. </h4>
								<?php include("../graficasbajas2.php");?>
							</div>
						</div>
                     </div>				
				</div>
			</div>
            

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
        $('#dataTables-example2').DataTable({
                responsive: true
        });
    });
	function verificar(id) {
	//alert("entro"+id);
	parnew=document.getElementById("new"+id).value;
	estatus=document.getElementById("estatus"+id).value;
	serial=document.getElementById("serial"+id).value;
	//alert("parnew"+parnew);
	//alert("estatus"+estatus);
	
	   
           // $('.ajaxgif').removeClass('hide');
            var datos = 'parnew='+ parnew + '&estatus=' + estatus + '&id=' + id + '&serial=' + serial ;
            $.ajax({
                type: "POST",
                url: "updateoptima.php",
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

</html>
