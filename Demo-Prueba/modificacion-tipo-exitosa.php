<?php
require_once('conexion.php');
$mdb= connectDB();
$mdb->set_charset('utf8');
if (isset($_GET['id']))
{
	$id= 0 + $_GET['id'];
	$sql = "select * from tipos_hospedajes where  id_tipo_hospedaje =".$id;
	
	$result=$mdb->query($sql);
	$total= mysqli_num_rows($result);
	if($total == 0)
	{
		header("location: ruta-invalida.php");
	}
	else
	{
		$tipo=mysqli_fetch_assoc($result);
		$nombre=$tipo['nombre_tipo_hospedaje'];
		$desc=$tipo['descripcion_tipo_hospedaje'];	
		
	}	

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Modificacion Exitosa</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
	
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">

	    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	
</head>

<body>
	<header></header>
	<ul>
		<li><a href="#">Inicio</a></li>
		<li><a href="#">Perfil</a> </li>
		<li><a href="#">Alta Tipo de Hospedaje</a></li>
		<li><a href=""> Listar Tipo de Hospedajes</a></li>
		<li><a href="#">Cerrar Session</a> </li>
</ul> 
	<?php 
	echo $nombre;
	echo '<br>';
	echo $desc;
	?>
</body>

</html>
