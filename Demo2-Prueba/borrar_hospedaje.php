<head>
	<title>Baja de Hospedaje</title>
	
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
	    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<header>
</header>
<?php
		session_start();
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
							header("location:acceso-indebido.php");
						?>
							<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted es administrador</h2>
						<?php	
						}
					}	
				}		
		}
		?>
	<ul>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a></li>
		<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
		<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
		<?php 
			if($_SESSION['tipo'] == 3) {?>
				<li><a href='alta_tipo_hospedaje.php'>Alta Tipo de Hospedajes</a></li>
				<li><a href='listar_tipo_hospedajes.php'>Listar Tipo de Hospedajes</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else if($_SESSION['tipo']==1)
			{?>	<li><a href='premium.php'>Premium</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else {?>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}?>
	</ul>
	<?php
	require_once('conexion.php');
	$mdb= connectDB();
	$mdb->set_charset('utf8');
	if((isset($_SESSION['session_username']))){
		$id= $_GET['id'];
		$sql = "SELECT * FROM hospedajes WHERE id_hospedaje = " .$_GET['id'] ;
		$result=$mdb->query($sql);
		$total= mysqli_num_rows($result);
		if ($total== 0){?>
			<div><h1 style="text-align:center;">El hospedaje no ha podido ser borrado porque no existe</h1></div>
			<div style="text-align:center;"><a href="mis_hospedajes.php">Volver</a></div>
		<?php
			die();
		}
		else{
			$hospedaje = mysqli_fetch_assoc($result);
			if ($hospedaje['estado_hospedaje'] == 1){
				?>
				<div><h1 style="text-align:center;">El hospedaje no ha podido ser borrado porque no existe</h1></div>
				<div style="text-align:center;"><a href="mis_hospedajes.php">Volver</a></div>
				<?php
			die();
			}
			$sql= "SELECT * FROM RESERVAS WHERE id_hospedaje = " . $_GET['id'];
			$result = $mdb->query($sql);
			$total= mysqli_num_rows($result);
			if ($total == 0){
				echo "hola";
				$sql="DELETE FROM hospedajes WHERE id_hospedaje = ".$_GET['id'];
				$result=$mdb->query($sql);
			}
			else{
				$boolean = 0;
				while ($reservas = mysqli_fetch_assoc($result)){
					if ($reservas['estado'] == 2){
						$boolean = 1;
					}
				}
				if ($boolean == 1){
					$sql= "UPDATE hospedajes SET estado_hospedaje = '1' WHERE id_hospedaje= " .$_GET['id'];
					$result=$mdb->query($sql);
					
				}
				else{
				
					$sql="DELETE FROM hospedajes WHERE id_hospedaje = ".$_GET['id'];
					$result=$mdb->query($sql);
				}
			}
		}
	}
	else{
		header("location: acceso-indebido.php");
	}
?>
	<div><h1 style="text-align:center;">El hospedaje ha sido borrado exitosamente</h1></div>
	<div style="text-align:center;"><a href="mis_hospedajes.php">Volver</a></div>
</body>
</html>