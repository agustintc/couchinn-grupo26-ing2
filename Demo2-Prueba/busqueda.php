<html>
<head>
 <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones.js"></script>
	    <link href="boots/css/bootstrap.min.css" rel="stylesheet">

	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
</head>
<body>
	<?php
	
	session_start();
	require ("conexion.php");
	
	$mdb = connectDB();
	$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
	$result= $mdb->query($sql);
	$usuario = mysqli_fetch_assoc($result);
	if(isset($_SESSION["session_username"])){
			if (isset($_SESSION['session_username'])){
			$query = "SELECT * FROM usuarios WHERE email_usuario = '" . $_SESSION['session_username']. "'";
			$result_query = $mdb->query($query);
			$tipo = (mysqli_fetch_assoc($result_query)['tipo_usuario']);
			}
		}
		else{
				$tipo = '4';
			}
	?>
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
						<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?></h2>
					<?php	
					}
					else {
						if(($_SESSION["tipo"])==3){
							header("location:acceso-indebido.php");
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
<ul>
		<?php
		if (!isset($_SESSION['session_username'])){?>
			<li><a class="active" href="inicio.php">Inicio</a></li>
			<li><a href="bienvenida.php">Iniciar Sesion</a></li>
			<li><a href="registrar.php">Registrarse</a></li>
		<?php
		}
		else{?>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a></li>
		<?php 
			if($_SESSION['tipo'] == 3) {?>
				<li><a href='alta_tipo_hospedaje.php'>Alta Tipo de Hospedajes</a></li>
				<li><a href='listar_tipo_hospedajes.php'>Listar Tipo de Hospedajes</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else if($_SESSION['tipo']==1)
			{?>	<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a class="active" href="">Buscar Hospedaje</a></li>
				<li><a href='premium.php'>Premium</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else {?>
				<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a class="active" href="">Buscar Hospedaje</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
		}
		?>
	
	</ul>
	
	<h1 align="center">Busqueda de Hospedaje</h1>
	<div style="text-align:center;" align="center">
	<div class="container">
		<form action="" method="POST" id="form-busqueda" name="form-busqueda">
			<div class="form-group row">
				<label for="hospedaje" class="col-sm-3 form-control-label">Nombre del Hospedaje</label>
				<div class="col-sm-6">
					<input type="text" class="form-control"  value="<?php if(isset($_POST['enviar'])){ echo $_POST['nombre_hospedaje'];}?>" id="nombre_hospedaje" name="nombre_hospedaje" placeholder="Nombre del Hospedaje">
				</div>
				<div class="col-sm-8" id="ErrorName"></div>
			</div>
			<div class="form-group row">
				<label for="capacidadHospedaje" class="col-sm-3 form-control-label">Capacidad</label>
				<div class="col-sm-6">
					<input class="form-control" type="number" value="<?php if(isset($_POST['enviar'])){ echo $_POST['capacidad_hospedaje'];}?>" id="capacidad_hospedaje" min="1" max="99" name="capacidad_hospedaje">
				</div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="hospedajes">Tipos de Hospedajes</label>
					<div class="col-sm-6">
							<select  class="form-control" id="nombre_tipo_hospedaje"  name="nombre_tipo_hospedaje" >
							<?php if(isset($_POST['nombre_tipo_hospedaje'])){
								?>
								<option ><?php  echo $_POST['nombre_tipo_hospedaje'];?></option><?php
							}?>
							<?php if(isset($_POST['nombre_tipo_hospedaje'])&& $_POST['nombre_tipo_hospedaje']=="Todos" ){
							?>
							<?php
							}
							else {
								?><option >Todos</option><?php
							}
							
							
							$sql= "SELECT * FROM tipos_hospedajes WHERE estado_tipo_hospedaje = 0";
							$result_tipos = $mdb->query($sql);
							while ($tipos_hospedajes = mysqli_fetch_assoc($result_tipos)){
								$nombre_tipo = $tipos_hospedajes['nombre_tipo_hospedaje'];
							?>
							<?php if(isset($_POST['nombre_tipo_hospedaje'])&& $_POST['nombre_tipo_hospedaje']==$nombre_tipo ){
							?>
							<?php
							}
							else {
								?><option ><?php echo $nombre_tipo;?></option><?php
							}
							}
							?>
							</select> 
						
					</div>	
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="descripcionHospedaje">Descripcion del Hospedaje</label>
				<div class="col-sm-6">
					<textarea class="form-control" id="descripcion_hospedaje"   name="descripcion_hospedaje" rows="3" ><?php if(isset($_POST['enviar'])){ echo $_POST['descripcion_hospedaje'];}?></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="lugares">Lugar del Hospedaje</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nombre_lugar" value="<?php if(isset($_POST['enviar'])){ echo $_POST['nombre_lugar'];}?>" name="nombre_lugar" >
					</div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label">Fecha Inicio</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="comienzo" value="<?php if(isset($_POST['enviar'])){ echo $_POST['comienzo'];}?>" name="comienzo" >
				</div>
			</div>
				<div class="form-group row">
				<label  class="col-sm-3 form-control-label">Fecha Finalizacion</label>
				<div class="col-sm-6">
					<input type="date" class="form-control" id="finalizacion" value="<?php if(isset($_POST['enviar'])){ echo $_POST['finalizacion'];}?>" name="finalizacion" >
				</div>
				<div class="col-sm-8" id="ErrorFecha"></div>
			</div>
			<input type="submit" id="enviar" name="enviar" value="Buscar">
		</form>
	</div>
</div>

			
<?php
if(isset($_POST['enviar'])) {
	if($_POST['nombre_tipo_hospedaje']=='Todos'){
		unset($_POST['nombre_tipo_hospedaje']);
	}
	$cantidad=0;
    $campos = array('nombre_hospedaje', 'capacidad_hospedaje','descripcion_hospedaje','nombre_tipo_hospedaje','nombre_lugar','estado_hospedaje');
    $condiciones = array();

    foreach($campos as $campo){
        if(isset($_POST[$campo]) && $_POST[$campo] != '') {
			
            $condiciones[] = "" .$campo . " LIKE '%" . $_POST[$campo] . "%'";
        }
    }

    $query = "SELECT * FROM hospedajes ";
	
    if(count($condiciones) > 0) {
		
        $query .= "WHERE " . implode (' AND ', $condiciones);
    }
	
    $result = $mdb->query($query);
	?>
	<table class="table table-hover">
		<thead>
		<tr>
		<th scope="row">Nombre de Hospedaje</th>
		<th scope="row">Descripcion</th>
		</tr>
		<thead>
		<?php
	while($hospedaje=mysqli_fetch_assoc($result)){
			if(isset($_POST['comienzo'])&& isset($_POST['finalizacion'])){
				$nosuperpone = true;
				$comienzo = $_POST['comienzo'];
				$finalizacion = $_POST['finalizacion'];
				$sql = "SELECT * FROM reservas WHERE id_hospedaje = '" . $hospedaje['id_hospedaje']. "'";
				$result_reservas= $mdb->query($sql);
				if ($result){
					while($reservas=mysqli_fetch_assoc($result_reservas) ){
						if 
						((($reservas['comienzo'] >= $comienzo && $reservas['finalizacion'] <= $finalizacion) || 
						(($reservas['comienzo'] >= $comienzo) && ($reservas['comienzo'] <= $finalizacion)) || 
						($comienzo == $reservas['comienzo'] || $comienzo == $reservas['finalizacion']) ||
						($reservas['finalizacion'] >= $comienzo && $reservas['finalizacion'] <= $finalizacion)) || 
						(($reservas['comienzo'] <= $comienzo && $reservas['finalizacion'] >= $finalizacion)))
						{ 
						$nosuperpone=false;
						//echo "entra2";
						}
						else{
							//echo "entra";
						}
					}
				}	
				if($nosuperpone==true){
					//echo "entra3";
					if ($hospedaje['estado_hospedaje'] == 0){	
					$cantidad=1;
					?>
					<tbody>
					<tr>
					<th> <?php echo $hospedaje['nombre_hospedaje'];?></th>
					<th> <?php echo $hospedaje['descripcion_hospedaje'];?></th>
					<th>
					<?php
					if ($tipo == 1 || $tipo == 4){
						$directory="imagenes/logo/";
					}
					else{
						$directory="imagenes/hospedajes/" .$hospedaje['id_hospedaje']."";
					}
					if (!file_exists($directory)){
						$directory="imagenes/logo/";
					}
					$isDirEmpty = !(new \FilesystemIterator($directory))->valid();
					if (! $isDirEmpty){
					$scanned_directory = array_diff(scandir($directory), array('..', '.'));
							?>
							<div class="col-sm-2 col-md-4 img-hover">
							<div class="thumbnail">
							<img src="<?php echo $directory . '/' . $scanned_directory[2] ; ?>" height=340px; width=500px"></img>
							</div>			
						</div>
							<?php
					}
					else{
						$directory="imagenes/logo/";
						$scanned_directory = array_diff(scandir($directory), array('..', '.'));
						?>
								<div class="col-sm-2 col-md-4 img-hover">
							<div class="thumbnail">
							<img src="<?php echo $directory . '/' . $scanned_directory[2] ; ?>" height=340px; width=500px"></img>
							</div>	
						</div>
						<?php
					}
					?>
					<th><a href=ver_detalle.php?id=<?php echo $hospedaje["id_hospedaje"];?>>
					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button></a></th>
					</tr>
					</tbody>
					<?php
					}
				}					
			}	
			else{
				//echo "entra4";
				if ($hospedaje['estado_hospedaje'] == 0){	
					$cantidad=1;
					?>
					<tbody>
					<tr>
					<th> <?php echo $hospedaje['nombre_hospedaje'];?></th>
					<th> <?php echo $hospedaje['descripcion_hospedaje'];?></th>
					<th>
					<?php
					if ($tipo == 1 || $tipo == 4){
						$directory="imagenes/logo/";
					}
					else{
						$directory="imagenes/hospedajes/" .$hospedaje['id_hospedaje']."";
					}
					if (!file_exists($directory)){
						$directory="imagenes/logo/";
					}
					$isDirEmpty = !(new \FilesystemIterator($directory))->valid();
					if (! $isDirEmpty){
						$scanned_directory = array_diff(scandir($directory), array('..', '.'));
							?>
							<div class="col-sm-2 col-md-4 img-hover">
							<div class="thumbnail">
							<img src="<?php echo $directory . '/' . $scanned_directory[2] ; ?>" height=340px; width=500px"></img>
							</div>			
						</div>
							<?php
					}
					else{
						$directory="imagenes/logo/";
						$scanned_directory = array_diff(scandir($directory), array('..', '.'));
						?>
								<div class="col-sm-2 col-md-4 img-hover">
							<div class="thumbnail">
							<img src="<?php echo $directory . '/' . $scanned_directory[2] ; ?>" height=340px; width=500px"></img>
							</div>	
						</div>
						<?php
					}
				
					
					?>
					<th><a href=ver_detalle.php?id=<?php echo $hospedaje["id_hospedaje"];?>>
					<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button></a></th>
					</tr>
					
					</tbody>
			
	
	<?php
				}
	}
	
}
		
		?>
		</table>
	
	
	

		<?php	
		if($cantidad==0){
			?>
						<h2 style ="font-size:30px;font-weight: bold;font-family:Arial;text-align:center;" >no se encontro ningun hospedaje que cumpla las caracteristicas</h2>
					<?php	
						}	
}		

?>
</body>
</html>