<html>
<head>
	    <!-- Bootstrap core CSS -->
    <link href="boots/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
	<title> Listar Tipo De Hospedajes</title>
<head>
<body>

<header>
</header>
<div>
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
	<li><a href="perfil.php">Perfil</a></li>
	<li><a href="logout.php">Cerrar Sesion</a> </li>
	<li><a href="alta_tipo_hospedaje.php">Alta Tipo De Hospedaje</a></li>
	<li><a class="active" href="listar_tipo_hospedajes.php">Listar Tipo De Hospedaje</a></li>
	</ul>
	
<?php
		require_once('conexion.php');
		$mdb = connectDB();
		$mdb->set_charset('utf8');
		if((isset($_SESSION['session_username']))&&($_SESSION['tipo']=="3")){
			
			$sql = "SELECT * FROM tipos_hospedajes WHERE estado_tipo_hospedaje = 0";
			$result=$mdb->query($sql);
			?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th scope="row">Tipo de Hospedaje</th>
						<th scope="row">Descripcion</th>
					</tr>
				<thead>
				<?php
				while($tipo_hospedaje=mysqli_fetch_assoc($result)){
				?>
					<tbody>
						<tr>
							<th><?php echo $tipo_hospedaje['nombre_tipo_hospedaje'];?></th>
							<th><?php echo $tipo_hospedaje['descripcion_tipo_hospedaje'];?></th>
							<th><a href=modificar_tipo_hospedaje.php?id=<?php echo $tipo_hospedaje["id_tipo_hospedaje"];?>>
							<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button></a></th>
							<th><a href=borrar-tipo-hospedaje.php?id=<?php echo $tipo_hospedaje["id_tipo_hospedaje"];?>>
							<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></th>
						</tr>
					</tbody>
				<?php
				}
				?>
			</table>
			<?php
		}
		else{
			 header("location:acceso-indebido.php");
		}
?>

</body>
</html>
  
	
