<?php 
ob_start();
session_start();
//require_once '..\sismapfre\config.php'; 
if(!isset($_SESSION['logged_in'])){
	header('Location: ..\..\sismapfre\index.php');
}
?>
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
        <li class="dropdown"><?php echo "Nos Visita:" . $_SERVER['REMOTE_ADDR'];?>
		<input type='hidden' id='ipcliente' value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
            </a>
             <ul class="dropdown-menu dropdown-user">
                <li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil Uuasuario <input type="hidden" id='userlog'  value="" ></a>
                </li>
                <li><a href="#"><i class="fa fa-gear fa-fw"></i> Actulalizar Perfil</a>
                </li>
                <li class="divider"></li>
                <li><a href="..\..\sismapfre\logout.php"><i class="fa fa-sign-out fa-fw"></i> Salir</a>
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
                
                 <li>
                    <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Mapfre<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
						<!--
						<li>
                            <a href="RecambioLavalle.php"><i class="fa fa-refresh"></i> Recambio LAVALLE</a>
                        </li> 
                        <li>
                            <a href="RecambioOtima.php"><i class="fa fa-refresh"></i> Recambio Optima</a>
                        </li>
                        <li>
                            <a href="RecambioCordoba.php"><i class="fa fa-refresh"></i> Recambio Cordoba</a>
                        </li>
                        <li>
                            <a href="RecambioMardelplata.php"><i class="fa fa-refresh"></i> Recambio Mar del Plata</a>
                        </li>						
                        <li>
                            <a href="RecambioRosario.php"><i class="fa fa-refresh"></i> Recambio Rosario</a>
                        </li>												
                        <li>
                            <a href="RecambioMendoza.php"><i class="fa fa-refresh"></i> Recambio Mendoza</a>
                        </li>
						<li>
                            <a href="envios.php"><i class="fa fa-paper-plane"></i> Gestion de Envios</a>
                        </li>
						
						<li>
                            <a href="BajasPcRecambio.php"><i class="fa fa-bitbucket"></i> Reporte Equipos Cambiados</a>
                        </li>
						-->
						<li>
                            <a href="EquiposLandesk.php"><i class="fa fa-desktop"></i> Reporte Equipos (Landesk)</a>
                        </li>
                        <li>
                            <a href="EquiposMapfreTodos.php"><i class="fa  fa-desktop"></i> Reporte Equipos (McAffe)</a>
                        </li>						
                        <li>
                            <a href="EquiposTodosAD.php"><i class="fa fa-sitemap"></i> Reporte PC Combinados</a>
                        </li>						
						<?php //if( $_SERVER['REMOTE_ADDR'] == '10.220.1.86'){?>
						
						<li>
                            <a href="EquiposInventarioMapfre.php"><i class="fa fa-desktop"></i> Inventario Mapfre (new)</a>
                        </li>
						<?php //}?>
						<li>
                            <a href="..\..\sismapfre\logout.php"><i class="fa fa-bitbucket"></i> Salir</a>
                        </li>
						
						<!--
						<li>
                            <a href=""><i class="fa  fa-bar-chart-o "></i> Gráficos (Pruebas)</a>
                        </li>
						-->
						
                    </ul>
                    <!-- /.nav-second-level -->
                </li>
            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>
<script>
var wsh = new ActiveXObject('WScript.Shell');
var usuario = wsh.ExpandEnvironmentStrings('%USERNAME%');
document.getElementById("pendiente").value=usuario;

</script>