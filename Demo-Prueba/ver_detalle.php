<head> <title> Detalle </title></head>
<style type="text/css">


.img-hover img {
    -webkit-transition: all .3s ease;
  	-moz-transition: all .3s ease;
  	-o-transition: all .3s ease; 
  	-ms-transition: all .3s ease; 
  	transition: all .3s ease;
}
.img-hover img:hover {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transform:translateZ(0) scale(1.20);
    -moz-transform:scale(1.20); 
    -ms-transform:scale(1.20); 
    -o-transform:translatZ(0) scale(1.20);
    transform:translatZ(0) scale(1.20);
}
  
  
.grayscale {
  -webkit-filter: brightness(1.10) grayscale(100%) contrast(90%);
  -moz-filter: brightness(1.10) grayscale(100%) contrast(90%);
  filter: brightness(1.10) grayscale(100%); 
}



</style>
<!-- Bootstrap core CSS -->
    <link href="boots/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" TYPE="text/css" href="style/style.css">
 <header></header>   

<?php

	require_once('conexion.php');
	$mdb = connectDB();
	if(!isset($_SESSION["session_username"])){
		session_start();
		if (isset($_SESSION['session_username'])){
			$query = "SELECT * FROM usuarios WHERE email_usuario = '" . $_SESSION['session_username']. "'";
			$result_query = $mdb->query($query);
			$tipo = (mysqli_fetch_assoc($result_query)['tipo_usuario']);
		}
		else{
			$tipo = '4';
		}
	}
	if ($tipo == '4'){
	?>
	<ul>
	<li><a href="inicio.php">Inicio</a></li>
	<li><a href="bienvenida.php">Iniciar Sesion</a> </li>
	<li><a href="registrar.php">Registrarse</a> </li>
	</ul>
	<?php
	}
	if ($tipo == '1'){
	?>
	<ul> <li><a href="inicio.php">Inicio</a></li>
	<li><a href="perfil.php">Perfil</a> </li>
	<li><a href="premiun.php">Premium</a></li>
	<li><a href="logout.php">Cerrar Session</a> </li>
	</ul>
	<?php
	}
	if ($tipo == '2'){
	?>
	<ul>
	<li><a href="inicio.php">Inicio</a></li>
	<li><a href="perfil.php">Perfil</a> </li>
	<li><a href="logout.php">Cerrar Session</a> </li>
	</ul>
	<?php
	}
	if ($tipo == '3'){
	?>
	<ul>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a> </li>
		<li><a href="alta_tipo_hospedaje.php">Alta Tipo de Hospedaje</a></li>
		<li><a href="listar_tipo_hospedajes.php"> Listar Tipo de Hospedajes</a></li>
		<li><a href="logout.php">Cerrar Session</a> </li>
	</ul>
	<?php
	}
	$id = $_GET['id'];
	$sql="SELECT * FROM hospedajes WHERE id_hospedaje = $id";
	$result= $mdb->query($sql);
	
		$hospedaje=mysqli_fetch_assoc($result)
		
	
?>
	<h1 align="center"><?php echo $hospedaje['nombre_hospedaje'];?></h1>
	
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
		$dirint = dir($directory);
		echo '<div align="center">';
		echo '<div class="container" style="padding-top: 1em;">';
		echo '<div class="row">';

		while (($archivo = $dirint->read()) !== false)
		{
			if (eregi("gif", $archivo) || eregi("jpg", $archivo) || eregi("png", $archivo)){
				echo '<div class="col-sm-2 col-md-4 img-hover">';
					echo '<div class="thumbnail">
							<img src="'.$directory."/".$archivo.'"  height=340px; width=500px"></img>
						</div>';	
				echo '</div>';
			}
		}
		
		echo '</div>';
		echo '</div>';
		echo'<p>Tipo de Hospedaje:' . $hospedaje["nombre_tipo_hospedaje"] . '</p>';
		echo'<p>Descripcion: ' . $hospedaje["descripcion_hospedaje"] . '</p>';
		echo'<p>Capacidad: ' . $hospedaje["capacidad_hospedaje"] . ' Personas</p>';
		echo'<p>Direccion: ' . $hospedaje["direccion_hospedaje"] . '</p>';
		echo '<a href=><input type="button" value="Reservar"></a>';
		echo '</div>';
		$dirint->close();
	?>
