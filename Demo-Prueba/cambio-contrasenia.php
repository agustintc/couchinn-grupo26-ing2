<?php

require_once('conexion.php');

$mdb= connectDB();
$mdb->set_charset('utf8');

//Método con str_shuffle()
function generateRandomString($length = 6) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}
				$claveTemporal = generateRandomString();
				$TipoClave = '1';
if (isset($_GET['id']))
{
	$id= 0 + $_GET['id'];
	$sql = "select * from usuarios where  id_usuario =".$id;
	
	$result=$mdb->query($sql);
	$total= mysqli_num_rows($result);
	if($total == 0)
	{
		header("location: ruta-invalida.php");
	}
	else
	{
		$user=mysqli_fetch_assoc($result);
		$email=$user['email_usuario'];
		$id=$user['id_usuario'];
		//$pass=$user['pass_usuario'];
		$passTemporal = generateRandomString();
		/*echo $email;
		echo '<br>';
		echo $passTemporal;*/
		$sql = "UPDATE usuarios SET pass_usuario = '".$passTemporal."' WHERE id_usuario = ".$id ;
		$result=$mdb->query($sql);
		
	}	
}
else {
		header("location: ruta-invalida.php");
	}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Cambio Contraseña</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
	
	<!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones-jorge.js"></script>
	
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">

</head>
<body>
<header></header>
<ul>
  <li><a href="#home">Inicio</a></li>		
  <li><a href="bienvenida.php">Iniciar Sesion</a></li>
  <li><a href="registrar.php">Registrarse</a> </li>
</ul> 
	<?php 
	echo $email;
	echo '<br>';
	echo $passTemporal;
	?>
	
</body>

</html>
