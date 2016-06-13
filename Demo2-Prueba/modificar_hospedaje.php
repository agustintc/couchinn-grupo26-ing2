<?php
ob_start();
?>
<html>
<head>
	<title>Modificar Hospedaje</title>
	<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones.js"></script>
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
	<link href="boots/css/bootstrap.min.css" rel="stylesheet">
	<style>
			#imglist img {
				width: 100px;
				height: 100px;
			}
			.selected { border: 1px solid red; }
	</style>

</head>
<body>
	<header></header>	
	<?php
		session_start();
		if (isset($_SESSION['session_username'])){
			if(($_SESSION["tipo"])==2){
				?>
				<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted posee  privilegios premium</h2>
				<?php	
			}
			if(($_SESSION["tipo"])==1) {
					?>
						<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?></h2>
					<?php	
			}
			if(($_SESSION["tipo"])==3){
						?>
							<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted es administrador</h2>
						<?php	
			}
		}?>
		<ul>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a></li>
		<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
		<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
		<?php 
			if($_SESSION['tipo'] == 3) {?>
				<li><a href='alta_tipo_hospedaje.php'>Alta Tipo de Hospedajes</a></li>
				<li><a href='listar_tipo_hospedajes.php'>Listar Tipo de Hospedajes</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else if($_SESSION['tipo']==1)
			{?>	<li><a href='premium.php'>Premium</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else {?>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}?>
	</ul>
	<?php
		require_once('conexion.php');
		$mdb= connectDB();
		$mdb->set_charset('utf8');
		$sql = "SELECT * FROM hospedajes WHERE  id_hospedaje = ".$_GET['id'] ;
		$result=$mdb->query($sql);
		$hospedaje= mysqli_fetch_assoc($result);
		$sql= "SELECT * FROM tipos_hospedajes WHERE estado_tipo_hospedaje = 0";
		$result_tipos = $mdb->query($sql);
	?>
	<?php
		function mostrar_imagenes($hospedaje){
			$directory="imagenes/hospedajes/" . $hospedaje['id_hospedaje']."";
			if (file_exists($directory)){
				$dirint = dir($directory);
				?>
				<div id="imglist">
				<?php
				$id=1;
				while (($archivo = $dirint->read()) !== false)
			{
					if (eregi("gif", $archivo) || eregi("jpg", $archivo) || eregi("png", $archivo)){?>
						<img class="imgClick" id="<?php echo $archivo;?>" src="<?php echo ''.$directory .'/' . $archivo ; ?>"/>
						<input type="checkbox" id="images[<?php echo $archivo;?>]" name="images[<?php echo $archivo;?>]"/>
					<?php
						$id++;
					}
				}?>
				</div>
			<?php
			}
		}
?>
	<h1 align="center">Modificacion de Hospedaje</h1>
	<div style="text-align:center;" align="center">
	<div class="container">
		<form action="" method="POST" id="form-alta" name="form-alta" enctype="multipart/form-data">
			<input name="id" type="hidden" value= "<?php echo $_GET['id'] ?>">
			<div class="form-group row">
				<label for="hospedaje" class="col-sm-3 form-control-label">Nombre del Hospedaje</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Hospedaje" required
						value="<?php echo ($hospedaje['nombre_hospedaje']);?>">
				</div>
				<div class="col-sm-8" id="ErrorName"></div>
			</div>
			<div class="form-group row">
				<label for="direccionHospedaje" class="col-sm-3 form-control-label">Direccion del Hospedaje</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="direccionHospedaje" name="direccionHospedaje" placeholder="Direccion del Hospedaje" required
						value="<?php echo ($hospedaje['direccion_hospedaje']);?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="capacidadHospedaje" class="col-sm-3 form-control-label">Capacidad</label>
				<div class="col-sm-6">
					<input class="form-control" type="number" min="1" max="15" id="capacidadHospedaje" name="capacidadHospedaje" required
						value="<?php echo ($hospedaje['capacidad_hospedaje']);?>">
				</div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="hospedajes">Tipos de Hospedajes</label>
					<div class="col-sm-6">
						<select class="form-control" id="tiposHospedaje" name="tiposHospedaje">
						<optgroup label="Seleccione un tipo de hospedaje">
						<?php
							while ($tipos_hospedajes = mysqli_fetch_assoc($result_tipos)){
								$nombre_tipo = $tipos_hospedajes['nombre_tipo_hospedaje'];
						?>
							<option required <?php if ($nombre_tipo == $hospedaje['nombre_tipo_hospedaje']) {?>selected="selected"<?php } ?>><?php echo $nombre_tipo;?></option>
							<?php
							}
							?>
						</select>
					</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label" for="comienzo">Comienzo</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" name="comienzo" id="comienzo" required
						value="<?php echo ($hospedaje['comienzo']);?>">
				</div>
				<div class="col-sm-8" id="ErrorFecha"></div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label" for="finalizacion">Terminacion</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" name="finalizacion" id="finalizacion" required
						value="<?php echo ($hospedaje['finalizacion']);?>">
				</div>
				<div class="col-sm-8" id="ErrorFecha"></div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="descripcionHospedaje">Descripcion del Hospedaje</label>
				<div class="col-sm-6">
					<textarea class="form-control" id="descripcionHospedaje" name="descripcionHospedaje" rows="3" required><?php echo ($hospedaje['descripcion_hospedaje']);?></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label" for="imagenesHospedaje">Seleccione las imagenes a borrar</label>
				<div class="col-sm-6">
					<?php mostrar_imagenes($hospedaje);?>
				</div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="imagenesHospedaje">Imagenes del Hospedaje:</label>
				<div class="col-sm-6">
					<input type="file" id="file" name="file[]" multiple="multiple" ><a>Debe de seleccionar todas las imagenes a subir</a>
				</div>
				<div class="col-sm-8" id="ErrorSubida"></div>
			</div>
			<input type="submit" id="enviar" name="enviar" value="Actualizar">
		</form>
	</div>
</div>
<?php
	if (isset($_POST['enviar'])){	
		$allowed = array("jpg", "jpeg", "png","JPG","JPEG","PNG");
		for($i=0; $i<count($_FILES['file']['name']); $i++) {
			$tmpFilePath = $_FILES['file']['tmp_name'][$i];
			$filename = $_FILES['file']['name'][$i];
			$ext = pathinfo($filename, PATHINFO_EXTENSION);
			if(!in_array($ext, $allowed)){?>
				<script>
					$("#ErrorSubida").text("Error. Formatos validos: .jpg/.png");
					$("#ErrorSubida").css('color','#d32e12');
				</script>
				<?php
				die();
			}
		}
		$hospedaje=mysqli_fetch_assoc($result);
		$dir = "imagenes/hospedajes/" . $_POST['id'];
		$directory="imagenes/hospedajes/" . $_POST['id'];
		$dirint = dir($directory);		
		//$folder = new FilesystemIterator($dir, FilesystemIterator::SKIP_DOTS);
		//$size = (iterator_count($folder));
		if (isset($_POST['images'])){
			$array = $_POST['images'];	
			while (($archivo = $dirint->read()) !== false){
				if ($archivo !== '.' && $archivo !== '..'){
					if (isset($array[$archivo])){
						chmod($dir . '/' . $archivo, 0750);
						unlink($dir . '/' . $archivo);
					}
				}
			}
		}
		$sql = "UPDATE hospedajes SET nombre_hospedaje = '".$_POST['nombre']."', descripcion_hospedaje = '" .$_POST['descripcionHospedaje']."',
			direccion_hospedaje = '".$_POST['direccionHospedaje']."', capacidad_hospedaje = '".$_POST['capacidadHospedaje']."',
			nombre_tipo_hospedaje = '".$_POST['tiposHospedaje']."', comienzo = '".$_POST['comienzo']."', finalizacion='".$_POST['finalizacion']."' 
			WHERE id_hospedaje = ".$_POST['id'] ;
		$result=$mdb->query($sql);
		if ($result != 0){
			$pathfile = "imagenes/hospedajes/" . $_POST['id'];
			if (!file_exists($pathfile)) {
				mkdir($pathfile, 0777, true);
			}	
			foreach ($_FILES["file"]["error"] as $key => $error) {
				if ($error == UPLOAD_ERR_OK) {
					$tmp_name = $_FILES["file"]["tmp_name"][$key];
					$name = $_FILES["file"]["name"][$key];
					$extension = pathinfo($name, PATHINFO_EXTENSION);
					move_uploaded_file($tmp_name, "$pathfile/$name.$extension");
				}
			}
			header("location:ver_detalle.php?id=" . $_POST['id']);
		}
	}
?>
</body>
</head>
<?php
ob_end_flush();
?>