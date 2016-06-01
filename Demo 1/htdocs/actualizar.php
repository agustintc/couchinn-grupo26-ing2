
<?php


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
	
	if (!empty($nombre) && !empty($apellido) && !empty($direccion) && !empty($pass) && !empty($pass2) && !empty($edad) && !empty($ocupacion)){
		if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
			echo ("Nombre invalido"); 
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$apellido)) {
			echo ("Apellido invalido");
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$pass)) {
			echo ("Contraseña invalida");
		}
		if ($pass == $pass2){
			echo ("Las contraseñas no coinciden"); 
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$direccion)) {
			echo ("Direccion invalida");
		}
		$result=$mdb->query($sql= "UPDATE usuarios SET nombre_usuario='$nombre', apellido_usuario='$apellido',
		pass_usuario='$pass', direccion_usuario='$direccion', edad_usuario='$edad', ocupacion_usuario='$ocupacion' WHERE email_usuario = '$session_mail'");
		
		if (!$result){
			echo "Error al actualizar";
		}
		else{
			header('Location:perfil.php');
		}
	}
	if (!empty ($nombre) && !empty($apellido) && !empty($direccion) && empty($pass) && empty($pass2)&& !empty($edad) && !empty($ocupacion)){
		
		if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
			echo ("Nombre invalido"); 
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$apellido)) {
			echo ("Apellido invalido");
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$pass)) {
			echo ("Contraseña invalida");
		}
		if ($pass == $pass2){
			echo ("Las contraseñas no coinciden"); 
		}
		if (!preg_match("/^[a-zA-Z ]*$/",$direccion)) {
			echo ("Direccion invalida");
		}
		$result=$mdb->query($sql= "UPDATE usuarios SET nombre_usuario='$nombre', apellido_usuario='$apellido',
		direccion_usuario='$direccion', edad_usuario='$edad', ocupacion_usuario='$ocupacion' WHERE email_usuario = '$session_mail'");
		
		if (!$result){
			echo "Error al actualizar";
		}
		else{
			header('Location:perfil.php');
		
		}
	}
	

?>