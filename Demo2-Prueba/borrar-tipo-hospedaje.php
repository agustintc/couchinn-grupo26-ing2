<?php
require_once('conexion.php');
$mdb= connectDB();
$mdb->set_charset('utf8');
session_start();
//If de preguntar si esta logueado y es admin
if((isset($_SESSION['session_username']))&&($_SESSION['tipo']==3)){
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
				//echo 'Borrado Definitivo';				
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
				//echo 'baja Logica';
			}
				
			}
}
else {header("location: acceso-indebido.php");}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Alta Exitosa Tipo Hospedaje</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
		
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">

	    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<header>
</header>
<?php
		if(isset($_SESSION["session_username"])) {
			
			if(($_SESSION["tipo"])==2){
				?>
				<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted posee  privilegios premium</h2>
				<?php	
				}
			else{
					if(($_SESSION["tipo"])==1) {
					?>
						<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;" >Bienvenido, <?php echo $_SESSION['nombre'];?></h2>
					<?php	
					}
					else {
						if(($_SESSION["tipo"])==3){
						?>
							<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted es administrador</h2>
						<?php	
						}
					}	
				}		
		}
		?>
<ul>
  	<li><a href="inicio.php">Inicio</a></li>
	<li><a href="perfil.php">Perfil</a> </li>
	<li><a href="logout.php">Cerrar Session</a> </li>
	<li><a href="alta_tipo_hospedaje.php">Alta Tipo de Hospedaje</a></li>
	<li><a href="listar_tipo_hospedajes.php"> Listar Tipo de Hospedajes</a></li>
</ul>
	<div id="noLink">
		El Tipo de Hospedaje ha sido Borrado Exitosamente
		<a href="inicio.php"> Volver al Inicio</a>
	</div>
</body>

</html>
