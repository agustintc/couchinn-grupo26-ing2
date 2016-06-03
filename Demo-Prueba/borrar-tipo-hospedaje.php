<?php
require_once('conexion.php');
$mdb= connectDB();
$mdb->set_charset('utf8');
//If de preguntar si esta logueado y es admin
$id= 0 + $_GET['id'];
$sql = "select * from tipos_hospedajes where  id_tipo_hospedaje =".$_GET['id'] ;
$result=$mdb->query($sql);
$total= mysqli_num_rows($result);
	if ($total== 0)
		{
			header("location: ruta-invalida.php");//valores a cargar noexiste Ruta incorrecta
		}
	else
		{
			$tipo=mysqli_fetch_assoc($result);
			$nombreTipo= $tipo['nombre_tipo_hospedaje'];
			$sql = "select * from hospedajes where nombre_tipo_hospedaje ='".$nombreTipo."'";
			$result=$mdb->query($sql);
			$total= mysqli_num_rows($result);
			if($total==0)
			{
				//delete final del tipo
				$sql="DELETE FROM tipos_hospedajes WHERE id_tipo_hospedaje=".$_GET['id'];
				$result=$mdb->query($sql);
				echo 'Borrado Definitivo';				
				/*$TipoHosp=mysqli_fetch_assoc($result);
				$tipo = $TipoHosp['nombre_tipo_hospedaje'];
				$descripcion = $TipoHosp['descripcion_tipo_hospedaje'];
				//echo $descripcion;*/
			}
			else 
			{
				// baja logica con update poniendo en 1
				$sql="UPDATE tipos_hospedajes SET estado_tipo_hospedaje='1' WHERE id_tipo_hospedaje=".$_GET['id'];
				$result=$mdb->query($sql);
				echo 'baja Logica';
			}
				
			}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Borrar Tipo Hospedaje</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
</head>

<body>
	<header></header>
</body>

</html>
