<?php
require_once('conexion.php');
session_start();
$mdb= connectDB();
$mdb->set_charset('utf8');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>	Solicitudes Aceptadas</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
	    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link href="boots/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
    
        <!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones.js"></script>
</head>

<body>
<header>
</header>	
<?php
if (isset($_SESSION['session_username'])){
			if(($_SESSION["tipo"])==2){
				?>
				<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted posee  privilegios premium</h2>
				<?php	
			}
			if(($_SESSION["tipo"])==1) {
					?>
						<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?></h2>
					<?php	
			}
			if(($_SESSION["tipo"])==3){
						?>
							<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted es administrador</h2>
						<?php	
			}
			$query = "SELECT * FROM usuarios WHERE email_usuario = '" . $_SESSION['session_username']. "'";
			$result_query = $mdb->query($query);
			$tipo = (mysqli_fetch_assoc($result_query)['tipo_usuario']);
		}
		else{
			$tipo = '4';
		}
	
	
	?>
	<ul>
		<?php
		if (!isset($_SESSION['session_username'])){?>
			<li><a class="active" href="inicio.php">Inicio</a></li>
			<li><a href="bienvenida.php">Iniciar Sesion</a></li>
			<li><a href="registrar.php">Registrarse</a></li>
		<?php
		}
		else{?>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a></li>
		<?php 
			if($_SESSION['tipo'] == 3) {?>
				<li><a href='alta_tipo_hospedaje.php'>Alta Tipo de Hospedajes</a></li>
				<li><a href='listar_tipo_hospedajes.php'>Listar Tipo de Hospedajes</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else if($_SESSION['tipo']==1)
			{?>	<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href="busqueda.php">Buscar Hospedaje</a></li>
				<li><a href="mis-calificaciones.php">Mis Calificaciones</a></li>
				<li><a href='premium.php'>Premium</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else {?>
				<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href="busqueda.php">Buscar Hospedaje</a></li>
				<li><a href="mis-calificaciones.php">Mis Calificaciones</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
		}
		?>
	
	</ul>
	<form id="solicitudesa" class="form" name "solicitudesa" action="" method="Post">
<fieldset>
			<legend>Consultar Solicitudes Aceptadas</legend>
			<label> Fecha de Inicio: </label> 
			<input type="date" class="form-control" id="comienzo" name="comienzo">
			</br>
			<label> Fecha de Fin:</label>
			<input type="date" class="form-control" id="finalizacion" name="finalizacion">
			<div id="ErrorFecha"></div>
			<div class="col-sm-8" id="ErrorFecha"></div>
			<br>
			<input type="submit" id="enviar" name="enviar" value="Consultar">
</fieldset>	
</form>	
<?php
$fecha_actual=date("Y-m-d");
if(isset($_POST['enviar'])) {
	if(isset($_POST['comienzo'])&& isset($_POST['finalizacion'])){
			if ($fecha_actual>=$_POST['finalizacion']){
				
				$comienzo = $_POST['comienzo'];
				$finalizacion = $_POST['finalizacion'];
				$sql = "SELECT * FROM reservas LEFT JOIN hospedajes on reservas.id_hospedaje=hospedajes.id_hospedaje WHERE estado = '2' or estado='3' ";
				$result= $mdb->query($sql);
				$total=0;
				if ($result){
					$total=0;
					?>
					<table class="table table-hover">
					<thead>
						<tr>
							<th scope="row">Huesped</th>
							<th scope="row">Hospedaje</th>
							<th scope="row">dueño</th>
							<th scope="row">Fecha de Aceptacion</th>
						</tr>
					<thead>
					<?php
					while($pago=mysqli_fetch_assoc($result) ){
						
						if 
						((($pago['fecha_aceptado'] >= $comienzo && $pago['fecha_aceptado'] <= $finalizacion) ))
						{ 
						$total=$total+1;
						//echo $pago['email_usuario'];echo  $pago['saldo_pago'];
						?>
						<tbody>
						<tr>
							<th><?php echo $pago['id_huesped'];?></th>
							<th><?php echo $pago['nombre_hospedaje'];?></th>
							<th><?php echo $pago['id_usuario'];?></th>
							<th><?php echo $pago['fecha_aceptado'];?></th>
							</tr>
							</tbody>
						<?php	
						}	
					}
					?>
					</table>
					<?php
					
				}
				if($total!=0){
					?>
						<h2 style ="font-size:30px;font-weight: bold;font-family:Arial;text-align:center;" >Los hospedajes aceptados en las fechas ingresadas son  <?php echo $total?></h2>
					<?php	
					}
					else{
						?>
						<h2 style ="font-size:30px;font-weight: bold;font-family:Arial;text-align:center;" >No se registraron hospedajes aceptados en las fechas ingresadas</h2>
					<?php	
					}
			}
			else {
						?>
						<h2 style ="font-size:30px;font-weight: bold;font-family:Arial;text-align:center;" >No se pueden calcular hospedajes aceptados futuros</h2>
						<?php	
			}		
	}
}
?>