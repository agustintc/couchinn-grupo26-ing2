<?php
session_start();
	require ("conexion.php");
	
	$mdb = connectDB();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Calificar a Usuarios</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
			<link rel="stylesheet" TYPE="text/css" href="style/style.css">
	    <!-- Bootstrap core CSS -->
    <link href="boots/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones-jorge.js"></script>
</head>
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
				<li><a href="ganancias.php">Ganancias</a> </li>
				<li><a href="solicitudesaceptadas.php">Solicitudes Aceptadas</a> </li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else if($_SESSION['tipo']==1)
			{?>	<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a class="active" href="mis-calificaciones.php">Mis Calificaciones</a></li>
				<li><a href="lugares-visitados.php">Lugares Visitados</a></li>
				<li><a href='premium.php'>Premium</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else {?>
				<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a class="active" href="mis-calificaciones.php">Mis Calificaciones</a></li>
				<li><a href="lugares-visitados.php">Lugares Visitados</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
		}
		?>
	
	</ul>
	<?php
	
	$sql="select  id_calificaciones, hospedaje_calificado, valoracion, comentario, email_calificador, nombre_hospedaje, id_usuario from calificaciones_hospedajes AS ch INNER JOIN hospedajes AS h ON ( ch.hospedaje_calificado = h.id_hospedaje ) where valoracion<>0 and id_usuario ='".$_SESSION['session_username']."'";	

	$result= $mdb->query($sql);
	$total =mysqli_num_rows($result);
	if($total==0)
	{ echo '<h1> Calificaciones a Mis Hospedajes:</h1><h2> No tienes Calificaciones Realizadas </h2>';}
	else {
		echo  '</table> <h1> Calificaciones a Mis Hospedajes</h1>	<table class=table>	<thead>	<tr> <th scope="row">Hospedaje Calificado</th> <th scope="row">Usuario Calificador</th><th scope="row">Calificacion</th> <th scope="row"> Comentario</th>	</tr></thead>';
		 echo '<tbody>';
		while($calif=mysqli_fetch_assoc($result)){
		echo '<tr>';	
		echo '<th>'.$calif['nombre_hospedaje'].'</th>';
		echo '<th>'.$calif['email_calificador'].'</th>';
		echo '<th>'.$calif['valoracion'].'</th>';
		echo '<th>'.$calif['comentario'].'</th>';
		echo '</tr>';
		}
		echo '</tbody> ';
	}
	
	?>

	
</body>

</html>
