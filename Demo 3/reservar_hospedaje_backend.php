<?php

require_once('conexion.php');
session_start();
$mdb= connectDB();
$mdb->set_charset('utf8');
//$id=$_GET['id'];
$sql="SELECT * FROM reservas WHERE estado = 2 and id_hospedaje=".$_POST['id']." and finalizacion >='".$_POST['fechaIng']."' and comienzo <='".$_POST['fechaSal']."'";
//echo $sql;
$result=$mdb->query($sql);
$total= mysqli_num_rows($result);
if ($total == 0)
{
	$sql="SELECT * FROM reservas WHERE estado = 0 and id_huesped='".$_SESSION['session_username']."' and id_hospedaje=".$_POST['id']." and finalizacion >='".$_POST['fechaIng']."' and comienzo <='".$_POST['fechaSal']."'";
	$result=$mdb->query($sql);
	$total= mysqli_num_rows($result);
	if($total==0){
	$sql="insert into reservas (id_reserva, comienzo, finalizacion, estado, id_huesped, id_hospedaje, comentario) values (null,'".$_POST['fechaIng']."','".$_POST['fechaSal']."',0,'".$_SESSION['session_username']."',".$_POST['id'].",' ')";
	//echo $sql;
	$result=$mdb->query($sql);
	$mensajeReserva = "Su Reserva ha sido Registrada Exitosamente";
	$reservaExitosa = true;
    }
    else {
		$mensajeReserva = "Usted Ya Tiene una Reserva Pendiente con las fechas Ingresadas";
	$reservaExitosa = true;
		}
}

else 
{
	$mensajeReserva = "El Hospedaje No se encuentra Disponible en las Fechas que usted desea";
	$reservaExitosa = false;
}	


//echo $total;
//echo $_POST['id'].'<br>'; 
//echo $_POST['fechaIng'].'<br>';
//echo $_POST['fechaSal'].'<br>';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Reserva de Hospedaje</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
	    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones-jorge.js"></script>
</head>

<body>
<header></header>	
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
	
<div id="noLink">
	<?php 
	if($reservaExitosa == true)
	{
	echo $mensajeReserva;}
	else 
	{ 
	echo $mensajeReserva; ?>
	<br>
	<a href=reservar-hospedaje.php?id=<?php echo $_POST['id']?>> Cambiar Fechas de Reserva</a>	
	<?php }?>
	
</div>
	
</body>

</html>
