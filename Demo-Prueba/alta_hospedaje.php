<html>
<title>Alta de Hospedaje</title>
<head>
<script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones.js"></script>
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">

  <link href="boots/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
	<header></header>
	<?php
		session_start();
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
		else{
			 header("location:acceso-indebido.php");
		}
	?>
<?php
	require_once('conexion.php');
	$mdb = connectDB();
	$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
	$result= $mdb->query($sql);
	$usuario = mysqli_fetch_assoc($result);

?>
<ul>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a></li>
		<li><a class="active" href="alta_hospedaje.php">Alta de Hospedaje</a></li>
		<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
		<?php 
			if($usuario['tipo_usuario'] == 3) {?>
				<li><a href='alta_tipo_hospedaje.php'>Alta Tipo de Hospedajes</a></li>
				<li><a href='listar_tipo_hospedajes.php'>Listar Tipo de Hospedajes</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else if($usuario['tipo_usuario']==1)
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
	
	$sql= "SELECT * FROM tipos_hospedajes WHERE estado_tipo_hospedaje = 0";
	$result= $mdb->query($sql);
	
?>
	
		<h1 align="center">Alta de Hospedaje</h1>
	<div style="text-align:center;" align="center">
	<div class="container">
		<form action="" method="POST" id="form-alta" name="form-alta" enctype="multipart/form-data">
			<div class="form-group row">
				<label for="hospedaje" class="col-sm-3 form-control-label">Nombre del Hospedaje</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del Hospedaje" required>
				</div>
				<div class="col-sm-8" id="ErrorName"></div>
			</div>
			<div class="form-group row">
				<label for="direccionHospedaje" class="col-sm-3 form-control-label">Direccion del Hospedaje</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="direccionHospedaje" name="direccionHospedaje" placeholder="Direccion del Hospedaje" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="capacidadHospedaje" class="col-sm-3 form-control-label">Capacidad</label>
				<div class="col-sm-6">
					<input class="form-control" type="number" min="1" max="15" id="capacidadHospedaje" name="capacidadHospedaje" required>
				</div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="hospedajes">Tipos de Hospedajes</label>
					<div class="col-sm-6">
						<select class="form-control" id="tiposHospedaje" name="tiposHospedaje" >
						<?php
							while ($tipos = mysqli_fetch_assoc($result)){
								$nombre = $tipos['nombre_tipo_hospedaje'];
						?>
							<option required  value="<?php echo $nombre;?>"><?php echo $nombre;?></option>
							<?php
							}
							?>
						</select>
					</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label" for="comienzo">Comienzo</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" name="comienzo" id="comienzo" required>
				</div>
				<div class="col-sm-8"  id="ErrorFecha"></div>
			</div>
			<div class="form-group row">
				<label class="col-sm-3 form-control-label" for="finalizacion">Terminacion</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" name="finalizacion" id="finalizacion" required>
				</div>
				<div class="col-sm-8" id="ErrorFecha"></div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="descripcionHospedaje">Descripcion del Hospedaje</label>
				<div class="col-sm-6">
					<textarea class="form-control" id="descripcionHospedaje" name="descripcionHospedaje" rows="3" required></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="imagenesHospedaje">Imagenes del Hospedaje:</label>
				<div class="col-sm-6">
					<input type="file" id="file" name="file[]" multiple="multiple" required><a>Debe de seleccionar todas las imagenes a subir</a>
				</div>
			</div>
			<input type="submit" id="enviar" name="enviar" value="Publicar">
		</form>
	</div>
</div>

<?php
	
	
	if(isset($_POST['enviar'])){
		$sql = "INSERT INTO hospedajes (id_hospedaje,nombre_hospedaje,descripcion_hospedaje,direccion_hospedaje,capacidad_hospedaje,nombre_tipo_hospedaje,id_usuario,comienzo,finalizacion)
			VALUES (NULL, '" . $_POST["nombre"] . "', '" . $_POST['descripcionHospedaje'] . "', '" . $_POST['direccionHospedaje'] . "', '" . $_POST['capacidadHospedaje'] ."',
			'" . $_POST['tiposHospedaje'] . "', '" . $_SESSION['session_username'] . "', '" . $_POST['comienzo'] . "','" . $_POST['finalizacion'] . "')";
		$mdb->query($sql);
		
			$sql= "SELECT * FROM hospedajes ORDER BY id_hospedaje DESC LIMIT 1";
			$result =  $mdb->query($sql);
			$result =  mysqli_fetch_assoc($result);
			$result = $result['id_hospedaje'];
			$pathfile = "imagenes/hospedajes/" . $result;
			if (!file_exists($pathfile)) {
				mkdir($pathfile, 0777, true);
			}
			foreach ($_FILES["file"]["error"] as $key => $error) {
				if ($error == UPLOAD_ERR_OK) {
				$tmp_name = $_FILES["file"]["tmp_name"][$key];
				$name = $_FILES["file"]["name"][$key];
				move_uploaded_file($tmp_name, "$pathfile/$name");
			}
		}
	}
?>

</body>
</html>