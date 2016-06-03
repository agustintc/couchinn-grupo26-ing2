<?php
require_once('conexion.php');

$mdb= connectDB();
$mdb->set_charset('utf8');
session_start();
	if (isset($_POST['Cambiar']))
	{
		$sql = "select * from usuarios where email_usuario='".$_SESSION['session_username']."' and pass_usuario ='".$_POST['passactual']."'";
		$result=$mdb->query($sql);
		$total= mysqli_num_rows($result);
		$user=mysqli_fetch_assoc($result);
		$id= $user['id_usuario'];
		if($total == 1)
		{
			 $sql = "UPDATE usuarios SET pass_usuario='".$_POST['password']."',tipo_clave=null WHERE id_usuario =".$id;
			 $result=$mdb->query($sql);
			 header("location: inicio.php");
		}
		else {$errorPass="Password Invalido";}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
	<title> Cambiar Contraseña</title>
	  <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones-jorge.js"></script>
</head>

<body>
	<header></header>
	<ul>
	<li>Agregar</li>
	</ul>
	<form method="post" class="form" id="cambiar-contrasenia" name="cambiar-contrasenia" action="cambiar-contrasenia.php">
		<fieldset>
			<legend>Cambiar Contrase&ntilde;a</legend>	
			<label> Contrase&ntilde;a Actual: </label>	
			<input type="password" id="passactual" name="passactual" required>
			<div id="PasswordActual"> <?php if(isset($errorPass)){echo $errorPass;} ?></div>
			<label> Contrase&ntilde;a Nueva: </label> 
			<input type="password" id="password" name="password"required>
			<div id="ErrorPassword"></div>
			<label> Repetir Contrase&ntilde;a Nueva: </label> 
			<input type="password" id="rPassword" name="rPassword"required>
			<div id="ErrorRPassword"></div>
			<input type="button" value="Limpiar" onClick="this.form.reset()">
			<input type="submit" name="Cambiar" value="Cambiar">
		</fieldset>
	</form>

	
</body>

</html>
