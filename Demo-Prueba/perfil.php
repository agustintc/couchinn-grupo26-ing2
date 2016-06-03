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


		
	
	<ul>
		<li><a  href="inicio.php">Inicio</a></li>
		<li><a class="active" href="perfil.php">Perfil</a></li>
			<li><a href="logout.php">Cerrar Sesion</a> </li>
		<?php 
			if($usuario['tipo_usuario'] == 3) {
				echo "<li><a href='alta_tipo_hospedaje.php'>Alta Tipo de Hospedajes</a></li>";
				echo "<li><a href='listar_tipo_hospedajes.php'>Listar Tipo de Hospedajes</a></li>";
			}
			else if($usuario['tipo_usuario']==1)
			{echo"<li><a href='premium.php'>Premium</a></li>";}
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
	
	
	<input type="button" onclick="window.location.replace('inicio.php')" value="Home"/>
	<input type="button" onclick="window.location.replace('editar.php')" value="Editar Perfil" />
</body>
</html>	
