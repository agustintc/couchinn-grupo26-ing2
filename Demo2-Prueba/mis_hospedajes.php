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
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else if($_SESSION['tipo']==1)
			{?>	<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a class="active" href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href='premium.php'>Premium</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else {?>
				<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a class="active" href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
		}
		?>
	
	</ul>
<?php

	$sql = "SELECT * FROM Hospedajes WHERE id_usuario = '" . $_SESSION['session_username']. "'";
	$result = $mdb->query($sql);
	if (mysqli_num_rows($result) == 0){
		?>
		<div style="text-align:center;"><h1>Aun no ha creado ningun hospedaje</h1></div>
			<?php

			die();
		
	}
	?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="row">Hospedajes</th>
					</tr>
				<thead>
				<?php
				while($hospedaje=mysqli_fetch_assoc($result)){
				?>
					<tbody>
						<tr>
							<th><?php echo $hospedaje['nombre_hospedaje'];?></th>
							<th><a href=modificar_hospedaje.php?id=<?php echo $hospedaje["id_hospedaje"];?>>
							<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button></a></th>
							<th><a href=borrar_hospedaje.php?id=<?php echo $hospedaje["id_hospedaje"];?>>
							<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></th>
							<th><a href=ver_detalle.php?id=<?php echo $hospedaje["id_hospedaje"];?>>
							<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></button></a></th>
							<th><a href=reservas.php?id=<?php echo $hospedaje["id_hospedaje"];?>>
							<button type= "button" class="btn btn-default btn-lg"><span aria-hidden="true">Reservas</span></button></a></th>								
						</tr>
					</tbody>
				<?php
				}
				?>
			</table>
	<?php
?>
</body>
</html>