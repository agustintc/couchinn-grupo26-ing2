

  <!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones.js"></script>
	
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">




<?php
	session_start();
	require ("conexion.php");
	
	$mdb = connectDB();
	$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
	$result= $mdb->query($sql);
	$usuario = mysqli_fetch_assoc($result);
	echo '<header></header>';
	
	
		if(isset($_SESSION["session_username"])) {
			
			if(($_SESSION["tipo"])==2){
				?>
				<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;" >Bienvenido, <?php echo $_SESSION['nombre'];?>, usted posee  privilegios premium</h2>
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
				<li><a href="ganancias.php">Ganancias</a> </li>
				<li><a href="solicitudesaceptadas.php">Solicitudes Aceptadas</a> </li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else if($_SESSION['tipo']==1)
			{?>	<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href="busqueda.php">Buscar Hospedaje</a></li>
				<li><a href="mis_favoritos.php">Mis Favoritos</a></li>
				<li><a href="mis-calificaciones.php">Mis Calificaciones</a></li>
				<li><a href="lugares-visitados.php">Lugares Visitados</a></li>
				<li><a href='premium.php'>Premium</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else {?>
				<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href="busqueda.php">Buscar Hospedaje</a></li>
				<li><a href="mis_favoritos.php">Mis Favoritos</a></li>
				<li><a href="mis-calificaciones.php">Mis Calificaciones</a></li>
				<li><a href="lugares-visitados.php">Lugares Visitados</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
		}
		?>
	
	</ul>
	<form action= ""  id="formulario_editar_perfil" nombre="formulario_editar_perfil" class="form" method="post" >
		<fieldset>
			<legend>Modificar Perfil</legend>
			<b>Nombre: </b>
			<input type="text" name="nombre" id="nombre" required value="<?php echo $usuario['nombre_usuario'];?>">
			<div id="ErrorName"></div>
			<br>
			<b>Apellido: </b>
			<input type="text" name="apellido" id="apellido"  required  value="<?php echo $usuario['apellido_usuario'];?>">
			<div id="ErrorLastName"></div>
			<br>
			<b>Direccion: </b>
			<input type="text" name="direccion" id="direccion" required  value="<?php echo $usuario['direccion_usuario']; ?>">
			<div id="ErrorDireccion"></div>
			<br>
			<b>Edad: </b>
			<input type="number" name="edad" id="edad" min="18" max="99" value="<?php echo ($usuario['edad_usuario'] == 0) ? '' : $usuario['edad_usuario']; ?>">
			<div id="ErrorEdad"</div>
			<br>
			<b>Ocupacion: </b>
			<input type="text" name="ocupacion" id="ocupacion"  value="<?php echo $usuario['ocupacion_usuario']; ?>">
			<div id="ErrorOcupacion"</div>
			<br>
			<b>Contraseña: </b>
			<input type="password" name="pass" id="pass"  value="">
			<div id="ErrorPassword"></div>
			<br>
			<b>Repite contraseña:</b>
			<input type="password" name="pass2" id="pass2"  value="">
			<div id="ErrorPassword2"></div>
			<b>
			<br><br>
			<input type="submit" id="enviar" name="enviar" value="Confirmar"> <input type="button" onclick="window.location.replace('perfil.php')" value="Volver" />
		</fieldset>
	</form>
	
	

<?php

	function validar($nombre,$apellido,$direccion,$edad,$ocupacion){
		
		if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/",$nombre)) {
			?><script>
			$("#ErrorName").text("Error. Nombre Invalido");
			$("#ErrorName").css('color','#d32e12');</script>
			<?php
			exit ();
		}
		if (!preg_match("/^[a-zA-ZáéíóúÁÉÍÓÚäëïöüÄËÏÖÜàèìòùÀÈÌÒÙ\s]+$/",$apellido)) {
			?><script>
			$("#ErrorName").text("Error. Apellido Invalido");
			$("#ErrorName").css('color','#d32e12');</script>
			<?php
			exit ();
		}
		
	
		if (preg_match('/^[A-Z]-[0-9]$/',$direccion)) {
			echo ("Direccion invalida");
			exit ();
		}	
	
	}
	if(isset($_POST['enviar'])){
	
	$mdb = connectDB();
	$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
	$result= $mdb->query($sql);
	$usuario = mysqli_fetch_assoc($result);
	
	$session_mail = $_SESSION['session_username'];
	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$direccion = $_POST['direccion'];
	$pass = $_POST['pass'];
	$pass2 = $_POST['pass2'];
	$edad = $_POST['edad'];
	$ocupacion = $_POST['ocupacion'];
	if (empty($pass) && !empty($pass2)){		
		?><script>
		$("#ErrorPassword").text("Error. Ingrese la contraseña");
          $("#ErrorPassword").css('color','#d32e12');</script>
		<?php
		exit ();
	}
	if (!empty($pass) && empty($pass2)){
		?><script>
		$("#ErrorPassword2").text("Error. Ingrese la contraseña");
          $("#ErrorPassword2").css('color','#d32e12');</script>
		<?php
		exit ();
	}
	
	if (!empty($pass) && !empty($pass2)){
	
		validar($nombre,$apellido,$direccion,$pass,$pass2,$edad,$ocupacion);
		
		if ((strlen($pass) < 6) || (strlen($pass2) < 6)){
			?><script>
		$("#ErrorPassword").text("Error. Contraseña Invalida. Minimo 6 caracteres")
        $("#ErrorPassword").css('color','#d32e12');</script>
		<?php
			exit ();
		}
		
		if ($pass != $pass2){
			?><script>
			$("#ErrorPassword2").text("Error. La Contraseña debe ser iguales");
			$("#ErrorPassword2").css('color','#d32e12');
			</script><?php
			exit();
		}
		
		$result=$mdb->query($sql= "UPDATE usuarios SET nombre_usuario='$nombre', apellido_usuario='$apellido',
		pass_usuario='$pass', direccion_usuario='$direccion', edad_usuario='$edad', ocupacion_usuario='$ocupacion' WHERE email_usuario = '$session_mail'");
		
		if (!$result){
			echo ("Error al actualizar");
		}
		else{
			echo ("Datos Actualizados");
			header("Location:perfil.php");


		}
	}
	if (empty($pass) && empty($pass2)){
		validar($nombre,$apellido,$direccion,$pass,$pass2,$edad,$ocupacion);
		$result=$mdb->query($sql= "UPDATE usuarios SET nombre_usuario='$nombre', apellido_usuario='$apellido',
		direccion_usuario='$direccion', edad_usuario='$edad', ocupacion_usuario='$ocupacion' WHERE email_usuario = '$session_mail'");
		
		if (!$result){
		}
		else{
			echo ("Datos Actualizados");
			header("Location:perfil.php");

		}
	}
	}

?>	
