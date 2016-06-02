
<?php

	function validar($nombre,$apellido,$direccion,$edad,$ocupacion){
		
		if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/",$nombre)) {
			echo ("Nombre invalido"); 
			echo '<a href="editar.php">Volver</a>';
			exit ();
		}
		if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/",$apellido)) {
			echo ("Apellido invalido");
			echo '<a href="editar.php">Volver</a>';
			exit ();
		}
		
	
		if (preg_match('/^[A-Z]-[0-9]$/',$direccion)) {
			echo ("Direccion invalida");
			echo '<a href="editar.php">Volver</a>';
			exit ();
		}	
		
		if ($edad > 99 & $edad < 0){
			echo ("Edad erronea");
			echo '<a href="editar.php">Volver</a>';
			exit ();
		}
	}
	session_start();
	require ("conexion.php");
	$mdb = connectDB();
	$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
	$result= $mdb->query($sql);
	$usuario = mysqli_fetch_assoc($result);
	
	$session_mail = $_SESSION['session_username'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$direccion = $_POST['direccion'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	$edad = $_POST['edad'];
	$ocupacion = $_POST['ocupacion'];

	if (empty($pass) && !empty($pass2)){		
		echo ("Ingrese la contraseña en los dos campos");
		echo '<a href="editar.php">Volver</a>';
		exit ();
	}
	if (!empty($pass) && empty($pass2)){
		echo ("Ingrese la contraseña en los dos campos");
		echo '<a href="editar.php">Volver</a>';
		exit ();
	}
	
	if (!empty($pass) && !empty($pass2)){
	
		validar($nombre,$apellido,$direccion,$pass,$pass2,$edad,$ocupacion);
		
		if ((strlen($pass) < 6) || (strlen($pass2) < 6)){
			echo "Contraseña invalida. Minimo 6 caracteres";
			echo '<a href="editar.php">Volver</a>';
			exit ();
		}
		
		$result=$mdb->query($sql= "UPDATE usuarios SET nombre_usuario='$nombre', apellido_usuario='$apellido',
		pass_usuario='$pass', direccion_usuario='$direccion', edad_usuario='$edad', ocupacion_usuario='$ocupacion' WHERE email_usuario = '$session_mail'");
		
		if (!$result){
			echo ("Error al actualizar");
		}
		else{
			echo ("Datos Actualizados");
			header("Location:perfil.php");

		}
	}
	if (empty($pass) && empty($pass2)){
		validar($nombre,$apellido,$direccion,$pass,$pass2,$edad,$ocupacion);
		$result=$mdb->query($sql= "UPDATE usuarios SET nombre_usuario='$nombre', apellido_usuario='$apellido',
		direccion_usuario='$direccion', edad_usuario='$edad', ocupacion_usuario='$ocupacion' WHERE email_usuario = '$session_mail'");
		
		if (!$result){
			echo ("Error al actualizar");
		}
		else{
			echo ("Datos Actualizados");
			header("Location:perfil.php");
		}
	}

?>

