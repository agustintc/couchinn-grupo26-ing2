<?php
require_once('conexion.php');

$mdb= connectDB();
$mdb->set_charset('utf8');


if (!isset($_POST['Guardar']))
	{
		$sql = "select * from tipos_hospedajes where  id_tipo_hospedaje = ".$_GET['id'] ;
		$result=$mdb->query($sql);
		 $total= mysqli_num_rows($result);
		
		if ($total== 0)
		{
			//no existe
		}
		else
			{
				
				$TipoHosp=mysqli_fetch_assoc($result);
				$tipo = $TipoHosp['nombre_tipo_hospedaje'];
				$descripcion = $TipoHosp['descripcion_tipo_hospedaje'];
				
				
			}
	}
else
	{
		$sql = "UPDATE tipos_hospedajes SET descripcion_tipo_hospedaje = '".$_POST['descTipo']."' WHERE id_tipo_hospedaje = ".$_POST['id'] ;
		$result=$mdb->query($sql);
		
		if ($result){
			echo 'actualizado';} //redirijo a ver detalle
		else
			{echo "no se pudo actualizar";}
	}
 //disconectDB($mdb);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Actualizar Tipo</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
</head>

<body>
	<form method="post" id="updateTipoHosp" name="updateTipoHosp" action="modificar-tipo-hospedaje.php">
	<input name="id" type="hidden" value= "<?php echo $_GET['id'] ?>">
	<label> Nombre de Tipo: <?php echo $tipo; ?></label>	
			<!--<input tipe="text" id="nombreTipo" name="nombreTipo"> -->
			
			<div id="errorNombreTipo"></div>
			</br>
			<label> Descripcion de Tipo: </label> 
			<input type="text" id="descTipo" name="descTipo" value = "<?php echo $descripcion; ?>" >
			<div id="errorDescTipo"></div>
			</br>
			<input type="button" value="Limpiar" onClick="this.form.reset()">
			<input type="submit" name="Guardar" value="Guardar">
	</form>
</body>

</html>
