<?php

require_once('conexion.php');
$mdb = connectDB();

session_start();
?>

<head>

   <link href="boots/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" TYPE="text/css" href="style/style.css">
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
</head>
<body>
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
						<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;" >Bienvenido, <?php echo $_SESSION['nombre'];?></h2>
					<?php	
					}
					else {
						if(($_SESSION["tipo"])==3){
						?>
							<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted es administrador</h2>
						<?php	
						}
					}	
				}		
		}
		?>
<ul>
		<?php
		if (!isset($_SESSION['session_username'])){?>
			<li><a class="active" href="inicio.php">Inicio</a></li>
			<li><a href="bienvenida.php">Iniciar Sesion</a></li>
			<li><a href="registrar.php">Registrarse</a></li>
			<li><a href="busqueda.php">Buscar Hospedaje</a></li>
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
				<li><a class="active" href="mis_favoritos.php">Mis Favoritos</a></li>
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
				<li><a class="active" href="mis_favoritos.php">Mis Favoritos</a></li>
				<li><a href="mis-calificaciones.php">Mis Calificaciones</a></li>
				<li><a href="lugares-visitados.php">Lugares Visitados</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
		}
		?>
	
	</ul>
	

	<?php
	
		$sql = "SELECT * FROM FAVORITOS WHERE id_usuario = '" . $_SESSION['session_username'] . "'";
		$result = $mdb->query($sql);
		
		if ($result){
			$total = mysqli_num_rows($result);
			if ($total != 0){
		?>
		<table class="table table-hover">
				<thead>
					<tr>
						<th scope="row">Nombre del Hospedaje</th>
						<th scope="row">Borrar Favorito</th>
						<th scope="row">Ver detalle</th>
						
					</tr>
				<thead>
				<?php
				while($favoritos=mysqli_fetch_assoc($result)){
					$sql = "SELECT * FROM hospedajes WHERE id_hospedaje = '" . $favoritos['id_hospedaje'] . "'";
					$result_hospedaje = $mdb->query($sql);
					$hospedaje = mysqli_fetch_assoc($result_hospedaje);
					
				?>
					<tbody>
						<tr>
							<th><?php echo $hospedaje['nombre_hospedaje'];?></th>
							<th><a href=marcar_favorito.php?id=<?php echo $hospedaje["id_hospedaje"];?>>
							<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></th>
							<th><a href=ver_detalle.php?id=<?php echo $hospedaje["id_hospedaje"];?>>
							<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span></button></a></th>
						</tr>
					</tbody>
				<?php
				}
				?>
			</table>
		<?php
			}
				else{
			?> 
				<h1 style="text-align:center;"> Aun no tiene ningun hospedaje como favorito </h1>
			<?php
			}
	
		}
		
	?>
<body>
</body>
</html>
