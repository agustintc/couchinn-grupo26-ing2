

<?php

require_once('conexion.php');
$mdb = connectDB();

session_start();
?>

<head>


<link rel="stylesheet" TYPE="text/css" href="style/style.css">
<title> Inicio </title>

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
		<?php
		if (!isset($_SESSION['session_username'])){?>
			<li><a class="active" href="inicio.php">Inicio</a></li>
			<li><a href="bienvenida.php">Iniciar Sesion</a></li>
			<li><a href="registrar.php">Registrarse</a></li>
			<li><a href="busqueda.php">Buscar Hospedaje</a></li>
		<?php
		}
		else{?>
		<li><a class="active" href="inicio.php">Inicio</a></li>
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
	<form id="ordenar" class="form" name "ordenar action="" method="Post">

		
			<select  class="form-control" id="criterio"  name="criterio" >
							<?php if(isset($_POST['criterio'])){
								?>
								<option ><?php  echo $_POST['criterio'];?></option><?php
							}?>
							<?php if(isset($_POST['criterio'])&& $_POST['criterio']=="Puntaje" ){
							?>
							<?php
							}
							else {
								?><option >Puntaje</option><?php
							}
							?>
							<?php if(isset($_POST['criterio'])&& $_POST['criterio']=="Alfabetico" ){
							?>
							<?php
							}
							else {
								?><option >Alfabetico</option><?php
							}
							?>
							<?php if(isset($_POST['criterio'])&& $_POST['criterio']=="Capacidad" ){
							?>
							<?php
							}
							else {
								?><option >Capacidad</option><?php
							}
							?>
							
							</select> 
			<input type="submit" id="enviar" name="enviar" value="Ordenar">
	
</form>	
<?php

		require("listar_hospedajes.php");	
		require("chequear_reservas.php");
		require("chequear_hospedajes.php");
		chequear_reservas();
		chequear_hospedajes();
?>
</body>
</html>
