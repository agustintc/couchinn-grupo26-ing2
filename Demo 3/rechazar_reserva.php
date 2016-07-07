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
		
	
	if ($usuario['tipo_usuario']=='1')
	{?>
	<ul>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a> </li>
		<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
		<li><a class="active" href="">Mis Hospedajes</a></li>
		<li><a href="busqueda.php">Buscar Hospedaje</a></li>
		<li><a href="mis-calificaciones.php">Mis Calificaciones</a></li>
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
		<li><a href="busqueda.php">Buscar Hospedaje</a></li>
		<li><a href="mis-calificaciones.php">Mis Calificaciones</a></li
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
	<h1 style="text-align:center;">Para rechazar la reserva, por favor escriba porque no ha querido aceptarla</h1>
	<div class="container">
		<form action="" method="POST" id="form-comentario" name="form-comentario" >
		<div class="form-group row">
				<label  class="col-sm-3 form-control-label"></label>
				<div class="col-sm-6">
					<textarea class="form-control" id="comentario" name="comentario" rows="3" required></textarea>
				</div>
		</div>
			<div  style="text-align:center;" >
			<input type="submit" id="enviar" name="enviar" value="Enviar">
			</div>	
		</form>
	</div>
<?php
	if (isset($_POST['enviar'])){
		
		$sql = "SELECT id_hospedaje FROM reservas WHERE id_reserva = '" . $_GET['id']. "'";
		$result = $mdb->query($sql);
		$hospedaje = mysqli_fetch_assoc($result);
		$sql = "UPDATE reservas SET estado = 1, comentario = '" . $_POST['comentario'] . "' WHERE id_reserva = '" . $_GET['id']. "'";
		$result= $mdb->query($sql);
		
		if($result){?>
			
			<h1 style="text-align:center;">Reserva rechazada exitosamente!</h1>			
			<div style="text-align:center;"><a href=reservas.php?id=<?php echo $hospedaje['id_hospedaje'];?>>Volver</a></div>
			<?php
		}
		else{?>
			<h1 style="text-align:center;">Error al rechazar la reserva!</h1>
			<div style="text-align:center;"><a href=reservas.php?id=<?php echo $hospedaje['id_hospedaje'];?>>Volver</a></div>
		<?php
		}
	}
?>

</body>
</html>
