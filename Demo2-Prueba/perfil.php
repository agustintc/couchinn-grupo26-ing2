<html>
<head>
  <!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones.js"></script>
    
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
	<!-- Bootstrap core CSS -->
    <link href="boots/css/bootstrap.min.css" rel="stylesheet">
    <title> Perfil </title>


</head>
<body>
	<header></header>
<?php

		require_once('conexion.php');
		session_start();
		$mdb = connectDB();
		$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
		$result= $mdb->query($sql);
		
		$usuario = mysqli_fetch_assoc($result);
	
?> 
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
		else{
			 header("location:acceso-indebido.php");
		}
		?>

		
	<ul>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a class="active" href="perfil.php">Perfil</a></li>
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
				<li><a href='premium.php'>Premium</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else {?>
				<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
		
		?>
	
	</ul>
	
	<div align="center"><h1>Perfil</h1></div>

	<table class="table table-striped">
	
		<tbody>
			<tr>
				<th>Nombre: </th>
					<td><?php echo $usuario['nombre_usuario'];?></td>
				</th>
			</tr>
			<tr>
				<th>Apellido: </th>
					<td><?php echo $usuario['apellido_usuario'];?></td>
				</th>
			</tr>
			<tr>
				<th>Email: </th>
					<td><?php echo $usuario['email_usuario'];?></td>
				</th>
			</tr>
			<tr>
				<th>Direccion: </th>
					<td><?php echo $usuario['direccion_usuario'];?></td>
				</th>
			</tr>
			<tr>
				<th>Edad: </th>
					<td><?php echo $usuario['edad_usuario']==0 ? '' : $usuario['edad_usuario'];?></td>
				</th>
			</tr>
			<tr>
				<th>Ocupacion: </th>
					<td><?php echo $usuario['ocupacion_usuario'];?></td>
				</th>
			</tr>
		</tbody>
	</table>
	
<div text-align="center" style="margin:0 auto;">	<input type="button" style=" height:30px;   width:100px;    margin: -20px -50px;   position:relative; top:60%; 
						left:50%;" onclick="window.location.replace('editar.php')" value="Editar Perfil" /> </div>
</body>
</html>	
