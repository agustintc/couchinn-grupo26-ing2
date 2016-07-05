<?php
require_once('conexion.php');

$mdb= connectDB();
$mdb->set_charset('utf8');
session_start();
if((isset($_SESSION['session_username']))&&($_SESSION['tipo']==3)){

		$id= 0 + $_GET['id'];
		$sql = "select * from tipos_hospedajes where  id_tipo_hospedaje = ".$_GET['id'] ;
		$result=$mdb->query($sql);
		$total= mysqli_num_rows($result);
		
		if ($total== 0)
		{
			header("location: ruta-invalida.php");//valores a cargar noexiste Ruta incorrecta
		}
		else
			{
				//echo "no existe el tipo ";
				$TipoHosp=mysqli_fetch_assoc($result);
				$tipo = $TipoHosp['nombre_tipo_hospedaje'];
				$descripcion = $TipoHosp['descripcion_tipo_hospedaje'];
				//echo $descripcion;
				
			}
		}
 //disconectDB($mdb);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Actualizar Tipo de Hospedaje</title>
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
	<header></header>
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
		<li><a href="alta_tipo_hospedaje.php">Alta Tipo de Hospedaje</a></li>
		<li><a href="listar_tipo_hospedajes.php"> Listar Tipo de Hospedajes</a></li>
		<li><a href="logout.php">Cerrar Session</a> </li>
	</ul>
	<form method="post" class="form" id="updateTipoHosp" name="updateTipoHosp" action="">
		<fieldset>
			<legend>Modificar Tipo de Hospedaje</legend>	
			<input name="id" type="hidden" value= "<?php echo $_GET['id'] ?>">
			<label> Nombre de Tipo: </label>	
			<input tipe="text" id="nombreTipo" name="nombreTipo" value="<?php echo $tipo; ?>">
			<div id="errorNombreTipo" style="color:#d32e12;"><?php if (isset($_GET['do'])){echo 'El Tipo: '.$_GET['do'].'. Ya Existe.'; }?></div>
			<label> Descripcion de Tipo: </label> 
			<input type="text" id="descTipo" name="descTipo" value = "<?php echo $descripcion; ?>" >
			<div id="errorDescTipo"></div>
			</br>
			<input type="button" value="Limpiar" onClick="this.form.reset()">
			<input type="submit" name="Guardar" value="Guardar">
		</fieldset>
	</form>
</body>

</html>
<?php
	if (isset($_POST['Guardar'])) {
		$sql ="SELECT * FROM tipos_hospedajes WHERE nombre_tipo_hospedaje ='".$_POST['nombreTipo']."' and id_tipo_hospedaje <> ".$_POST['id'] ;
		$result=$mdb->query($sql);
		$total= mysqli_num_rows($result);
		if($total==0){
		$sql = "UPDATE tipos_hospedajes SET nombre_tipo_hospedaje='".$_POST['nombreTipo']."',descripcion_tipo_hospedaje = '".$_POST['descTipo']."' WHERE id_tipo_hospedaje = ".$_POST['id'] ;
		$result=$mdb->query($sql);
		
		if ($result){
			$ruta="location: modificacion-tipo-exitosa.php?id=".$_POST['id'];
			header($ruta);
			} //redirijo a ver detalle
		else
			{
				echo "no se pudo actualizar";
			}
		}
		else  {
			$ruta="location: modificar_tipo_hospedaje.php?id=".$_POST['id']."&do=".$_POST['nombreTipo'];
			header($ruta);
			}
}
//echo $_POST['nombreTipo'];
?>
