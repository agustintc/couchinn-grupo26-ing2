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
					<input type="text" class="form-control" id="nombre_hospedaje" name="nombre_hospedaje" placeholder="Nombre del Hospedaje">
				</div>
				<div class="col-sm-8" id="ErrorName"></div>
			</div>
			<div class="form-group row">
				<label for="lugarHospedaje" class="col-sm-3 form-control-label">Lugar del Hospedaje</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="descripcion_hospedaje" name="descripcion_hospedaje" placeholder="Lugar del Hospedaje">
				</div>
			</div>
			<div class="form-group row">
				<label for="capacidadHospedaje" class="col-sm-3 form-control-label">Capacidad</label>
				<div class="col-sm-6">
					<input class="form-control" type="number" id="capacidad_hospedaje" name="capacidad_hospedaje">
				</div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="hospedajes">Tipos de Hospedajes</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nombre_tipo_hospedaje" name="nombre_tipo_hospedaje" >
					</div>	
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="descripcionHospedaje">Descripcion del Hospedaje</label>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="descripcion_hospedaje" name="descripcion_hospedaje" rows="3" >
				</div>
			</div>
			<div class="form-group row">
				<label  class="col-sm-3 form-control-label" for="lugares">Lugar del Hospedaje</label>
					<div class="col-sm-6">
						<input type="text" class="form-control" id="nombre_lugar" name="nombre_lugar" >
					</div>
			</div>
			
			<input type="submit" id="enviar" name="enviar" value="Buscar!">
		</form>
	</div>
</div>

			
<?php
if(isset($_POST['enviar'])) {
	
    $campos = array('nombre_hospedaje', 'capacidad_hospedaje','descripcion_hospedaje','nombre_tipo_hospedaje','nombre_lugar');
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
	while ($hospedajes = mysqli_fetch_assoc($result)){
		
		echo $hospedajes['nombre_hospedaje'] .  '  capacidad  ';
		echo $hospedajes['capacidad_hospedaje'];
		?>
		<br>
		<?php		
		
	}
	
}
?>
</body>
</html>