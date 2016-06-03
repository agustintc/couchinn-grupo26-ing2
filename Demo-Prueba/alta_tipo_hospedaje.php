<?php
require_once('conexion.php');
session_start();
$mdb= connectDB();
$mdb->set_charset('utf8');

if((isset($_SESSION['session_username']))&&($_SESSION['tipo']==3))
{
	//echo $_SESSION['tipo'];
	if (isset($_POST['Guardar']))
	{
		
	//echo $_POST['nombreTipo'];
	//echo $_POST["descTipo"];
	$sql = "INSERT INTO tipos_hospedajes (id_tipo_hospedaje, nombre_tipo_hospedaje, descripcion_tipo_hospedaje, estado_tipo_hospedaje) VALUES(null,'".$_POST['nombreTipo']."','".$_POST["descTipo"]."','0')";
	$mdb->set_charset('utf8');
	$result=$mdb->query($sql);
	 if ($result)
	 {
		 $id=mysqli_insert_id($mdb);
		 $ruta="location: alta-tipo-exitosa.php?id=".$id;//cambio-contrasenia.php?id=".$user['id_usuario'];
		 header($ruta);
	 } 
	 else
		{
			echo 'erroneo'; // 
			}
	}
}
else {header("location:acceso-indebido.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Alta Tipo de Hospedaje</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
	
	
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">

	    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones-jorge.js"></script>
	
</head>

<body>
	
	<header>
		
		<!-- <a href="index.php"><img class="icon" alt="Se vera el logo de la Empreza" src="style/img/head_title.png" /> -->
        
		
	</header>
<ul>
	<li><a href="inicio.php">Inicio</a></li>
	<li><a href="perfil.php">Perfil</a> </li>
		<li><a href="logout.php">Cerrar Session</a> </li>
	<li><a class="active" href="alta_tipo_hospedaje.php">Alta Tipo de Hospedaje</a></li>
	<li><a href="listar_tipo_hospedajes.php"> Listar Tipo de Hospedajes</a></li>

</ul>
	
	<form id="altaTipoHosp" class="form" action="alta_tipo_hospedaje.php" method="Post">
		<fieldset>
			<legend>Alta Tipo de Hospedaje</legend>
			<label> Nombre de Tipo: </label>	
			<input tipe="text" id="nombreTipo" name="nombreTipo"> 
			</br>
			<div id="errorNombreTipo"></div>
			</br>
			<label> Descripcion de Tipo: </label> 
			<input tipe="text" id="descTipo" name="descTipo">
			<div id="errorDescTipo"></div>
			</br>
			<input type="button" value="Limpiar" onClick="this.form.reset()">
			<input type="submit" name="Guardar" value="Guardar">
		</fieldset>	
	</form>
	
</body>

</html>

