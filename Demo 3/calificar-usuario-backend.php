<?php
session_start();
require ("conexion.php");
	$mdb = connectDB();
	$sql = "UPDATE calificaciones_usuarios SET valoracion =".$_POST['calificacion'].", comentario ='".$_POST['comentario']."' WHERE id_calificaciones = ".$_POST['id'] ;
	echo $sql;
 	$result = $mdb->query($sql);
	//$calificacion = mysqli_fetch_assoc($result);
	header("location: calificaciones-usuarios.php");
	


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Backend</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
</head>

<body>
	
</body>

</html>
