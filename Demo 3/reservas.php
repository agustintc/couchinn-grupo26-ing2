<html>
<head>
 <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones.js"></script>
	    <link href="boots/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
</head>
<body>
	<?php
	
	session_start();
	require ("conexion.php");
	
	$mdb = connectDB();
	$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
	$result= $mdb->query($sql);
	$usuario = mysqli_fetch_assoc($result);
	
	?>
	<header></header>
	<?php
	if(isset($_SESSION["session_username"])) {
			
			if(($_SESSION["tipo"])==2){
				?>
				<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted posee  privilegios premium</h2>
				<?php	
				}
			else{
					if(($_SESSION["tipo"])==1) {
					?>
						<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?></h2>
					<?php	
					}
					else {
						if(($_SESSION["tipo"])==3){
							 header("location:acceso-indebido.php");
						?>
							<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted es administrador</h2>
							
						<?php	
						}
					}	
				}		
		}
		else{
			 header("location:acceso-indebido.php");
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
				<li><a href="ganancias.php">Ganancias</a> </li>
				<li><a href="solicitudesaceptadas.php">Solicitudes Aceptadas</a> </li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else if($_SESSION['tipo']==1)
			{?>	<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href="busqueda.php">Buscar Hospedaje</a></li>
				<li><a href="mis-calificaciones.php">Mis Calificaciones</a></li>
				<li><a href="lugares-visitados.php">Lugares Visitados</a></li>
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
				<li><a href="lugares-visitados.php">Lugares Visitados</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
		}
		?>
	
	</ul>
<?php
	$sql= "SELECT * FROM reservas WHERE id_hospedaje = '" . $_GET['id']. "'";
	$result= $mdb->query($sql);
?>
		<div style="text-align:center;"><h1>Reservas Sin Confirmar</h1></div>
		<br>
	<div style="border: 1px solid red;">
		<table class="table table-hover">
				<thead>
					<tr>
						<th scope="row">Usuario</th>
						<th scope="row">Fecha Comienzo</th>
						<th scope="row">Fecha Finalizacion</th>
						<th scope="row">Aceptar</th>
						<th scope="row">Cancelar</th>
					</tr>
				<thead>
				<?php
				while($reservas=mysqli_fetch_assoc($result)){
				?>
					<tbody>
						<tr><?php
							if ($reservas['estado'] == 0){?>
								<th><?php echo $reservas['id_huesped'];?></th>
								<th><?php echo $reservas['comienzo'];?></th>
								<th><?php echo $reservas['finalizacion'];?></th>
								<th><a href=aceptar_reserva.php?id=<?php echo $reservas["id_reserva"];?>>
								<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></a></th>
								<th><a href=rechazar_reserva.php?id=<?php echo $reservas["id_reserva"];?>>
								<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a></th>		
							<?php
							}?>
						</tr>
					</tbody>
				<?php
				}
				?>
			</table>
	</div>
			<div style="text-align:center;"><h1>Reservas Confirmadas</h1></div>
			<br>
	<div style="border: 1px solid red;">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="row">Usuario</th>
						<th scope="row">Fecha Comienzo</th>
						<th scope="row">Fecha Finalizacion</th>
					</tr>
				<thead>
				<?php
				$result= $mdb->query($sql);
				while($reservas=mysqli_fetch_assoc($result)){
				?>
					<tbody>
						<tr><?php
							if ($reservas['estado'] == 2){?>
								<th><?php echo $reservas['id_huesped'];?></th>
								<th><?php echo $reservas['comienzo'];?></th>
								<th><?php echo $reservas['finalizacion'];?></th>
								<?php
							}?>
						</tr>
					</tbody>
				<?php
				}
				?>
			</table>
	</div>
			<div style="text-align:center;"><h1>Reservas Rechazadas</h1></div>
			<br>
	<div style="border: 1px solid red;">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="row">Usuario</th>
						<th scope="row">Fecha Comienzo</th>
						<th scope="row">Fecha Finalizacion</th>
					</tr>
				<thead>
				<?php
				$result= $mdb->query($sql);
				while($reservas=mysqli_fetch_assoc($result)){
				?>
					<tbody>
						<tr><?php
							if ($reservas['estado'] == 1){?>
								<th><?php echo $reservas['id_huesped'];?></th>
								<th><?php echo $reservas['comienzo'];?></th>
								<th><?php echo $reservas['finalizacion'];?></th>
								<?php
							}?>
						</tr>
					</tbody>
				<?php
				}
				?>
			</table>
	</div>
			<div style="text-align:center;"><h1>Reservas Finalizadas</h1></div>
			<br>
	<div style="border: 1px solid red;">
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="row">Usuario</th>
						<th scope="row">Fecha Comienzo</th>
						<th scope="row">Fecha Finalizacion</th>
					</tr>
				<thead>
				<?php
				$result= $mdb->query($sql);
				while($reservas=mysqli_fetch_assoc($result)){
				?>
					<tbody>
						<tr><?php
							if ($reservas['estado'] == 3){?>
								<th><?php echo $reservas['id_huesped'];?></th>
								<th><?php echo $reservas['comienzo'];?></th>
								<th><?php echo $reservas['finalizacion'];?></th>
								<?php
							}?>
						</tr>
					</tbody>
				<?php
				}
				?>
			</table>	
	</div>
	<?php
?>
</body>
</html>
