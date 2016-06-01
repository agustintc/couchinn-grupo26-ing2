<html>
<head>

  <!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones.js"></script>
</head>
<body>
<?php

	session_start();
	require ("conexion.php");
	
	$mdb = connectDB();
	$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
	$result= $mdb->query($sql);
	$usuario = mysqli_fetch_assoc($result)


?>
 
	<form action="actualizar.php"  id="form1" method="post"  >
		<b>Nombre: </b>
		<input type="text" name="nombre" id="nombre" value="<?php echo $usuario['nombre_usuario'];?>">
		<div id="ErrorName"></div>
		<br>
		<b>Apellido: </b>
		<input type="text" name="apellido" id="apellido" value="<?php echo $usuario['apellido_usuario'];?>">
		<div id="ErrorLastName"></div>
		<br>
		<b>Direccion: </b>
		<input type="text" name="direccion" id="direccion" value="<?php echo $usuario['direccion_usuario']; ?>">
		<div id="ErrorDireccion"></div>
		<br>
		<b>Edad: </b>
		<input type="text" name="edad" id="edad" value="<?php echo ($usuario['edad_usuario'] == 0) ? '' : $usuario['edad_usuario']; ?>">
		<div id="ErrorEdad"</div>
		<br>
		<b>Ocupacion: </b>
		<input type="text" name="ocupacion" id="ocupacion" value="<?php echo $usuario['ocupacion_usuario']; ?>">
		<div id="ErrorOcupacion"</div>
		<br>
		<b>Contraseña: </b>
		<input type="password" name="pass" id="pass" value="">
		<div id="ErrorPassword"></div>
		<br>
		<b>Repite contraseña:</b>
		<input type="password" name="pass2" id="pass2" value="">
		<div id="ErrorPassword2"></div>
		<b>
		<br><br>
		<input type="submit" id="enviar" value="Confirmar"> <input type="button" onclick="window.location.replace('perfil.php')" value="Cancelar" />
	</form>
	

	
</body>
</head>