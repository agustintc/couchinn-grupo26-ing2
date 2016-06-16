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
		
	
	if ($usuario['tipo_usuario']=='1')
	{?>
	<ul>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a> </li>
		<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
		<li><a class="active" href="">Mis Hospedajes</a></li>
		<li><a href="premium.php">Premium</a></li>
		<li><a href="logout.php">Cerrar Sesion</a> </li>
	</ul>
	<?php
	}
	else if($usuario['tipo_usuario']=='2')
	{?>
	<ul>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a> </li>
		<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
		<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
		<li><a href="mis_reservas.php">Mis Reservas</a></li>
		<li><a href="logout.php">Cerrar Sesion</a> </li>
	</ul>
	<?php
		}
		else {?>
		<ul>
			<li><a href="inicio.php">Inicio</a></li>
			<li><a href="perfil.php">Perfil</a> </li>	
			<li><a href="logout.php">Cerrar Sesion</a> </li>
			<li><a href="alta_tipo_hospedaje.php">Alta Tipo de Hospedajes</a></li>
			<li><a href="listar_tipo_hospedajes.php">Listar Tipo de Hospedajes</a></li>
		</ul>
		<?php
		}
?>
<?php
	$sql = "UPDATE reservas SET estado = 2 WHERE id_reserva = '" . $_GET['id']. "'";
	$result= $mdb->query($sql);
	if($result){
		$sql = "SELECT * FROM reservas WHERE id_reserva = '" . $_GET['id'] . "'";
		$result = $mdb->query($sql);
		$reserva = mysqli_fetch_assoc($result);
		$comienzo = $reserva['comienzo'];
		$finalizacion = $reserva['finalizacion'];
		$sql = "SELECT * FROM reservas WHERE id_hospedaje = '" . $reserva['id_hospedaje']. "'";
		$result_reservas= $mdb->query($sql);
		if ($result){
			while($reservas=mysqli_fetch_assoc($result_reservas)){
				
				if (($reservas['comienzo'] >= $comienzo && $reservas['finalizacion'] <= $finalizacion) || 
					(($reservas['comienzo'] >= $comienzo) && ($reservas['comienzo'] <= $finalizacion)) || 
					($comienzo == $reservas['comienzo'] || $comienzo == $reservas['finalizacion'])){
					if ($reservas['id_reserva'] != $_GET['id']){
						$sql = "UPDATE reservas SET estado = 1 WHERE id_reserva = '" . $reservas['id_reserva']. "'";
						$result_update = $mdb->query($sql);
						if (!$result_update){
							echo "Fallo al actualizar reservas";
						}
					}
				}
			}
			?>
			<h1 style="text-align:center;">Reserva Aceptada con Exito!</h1>
			<div style="text-align:center;"><a href=mis_hospedajes.php>Volver</a></div>
			<?php
		}

	}
	else{
		echo "Error";
	}
	
?>
</body>
</html>