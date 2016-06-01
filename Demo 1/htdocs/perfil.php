<html>
<head>
  <!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones.js"></script>
</head>
<body>
<?php

		require_once('conexion.php');
		session_start();
		$mdb = connectDB();
		$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
		$result= $mdb->query($sql);
		
		$usuario = mysqli_fetch_assoc($result);
	
?> 

	<div>
	<h1> Perfil </h1>
	
	<b>Nombre: </b><?php echo $usuario['nombre_usuario']; ?>
	<br>
	<b>Apellido: </b><?php echo $usuario['apellido_usuario']; ?>
	<br>
	<b>Email: </b><?php echo $usuario['email_usuario']; ?>
	<br>
	<b>Direccion: </b><?php echo $usuario['direccion_usuario']; ?>
	<br>
	<b>Edad: </b><?php echo $usuario['edad_usuario']==0 ? '' : $usuario['edad_usuario'];?>
	<br>
	<b>Ocupacion:</b><?php echo $usuario['ocupacion_usuario'];?>
	<br>
	<input type="button" onclick="window.location.replace('inicio.php')" value="Home"/>
	<input type="button" onclick="window.location.replace('editar.php')" value="Editar Perfil" />
	</div>

</body>
</html>