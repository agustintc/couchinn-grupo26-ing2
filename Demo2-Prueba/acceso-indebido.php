<?php
session_start();
if(isset($_SESSION['session_username']))
	{
	if ($_SESSION['tipo']==1)
		{
		echo'<header></header>
		<ul>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a> </li>
		<li><a href="mis-calificaciones.php">Mis Calificaciones</a></li>
		<li><a href="logout.php">Cerrar Session</a> </li> 
		<li><a href="premiun.php">Premiun</a> </li> </ul>';
		}
	else if ($_SESSION['tipo']==2)
	{
		echo'<header></header>
		<ul>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a> </li>
		<li><a href="mis-calificaciones.php">Mis Calificaciones</a></li>
		<li><a href="logout.php">Cerrar Session</a> </li> </ul>';
	}
	else if ($_SESSION['tipo']==3)
	 {
		echo'<header></header>
		<ul>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a> </li>
		<li><a href="logout.php">Cerrar Session</a> </li> 
		<li><a href="alta_tipo_hospedaje.php">Alta Tipo de Hospedaje</a> </li>
		<li><a href="listar_tipo_hospedajes.php">Listar Tipo de Hospedajes</a> </li>  </ul>';
	}
	}	
else {
	echo'<header></header>
	<ul>
	<li><a href="inicio.php">Inicio</a></li>
	<li><a href="bienvenida.php">Iniciar Sesion</a> </li>
	<li><a href="registrar.php">Registrarse</a> </li> </ul>';	
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Acceso Indebido</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
</head>

<body>
	<div id="noLink">
		Acesso indebido
		<br>
		<a href="inicio.php"> Volver al Inicio</a>
	</div>
	
</body>

</html>
