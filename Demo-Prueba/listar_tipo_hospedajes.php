<html>
<head>
	    <!-- Bootstrap core CSS -->
    <link href="boots/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
	<title> Listar Tipo De Hospedajes</title>
<head>
<body>
<?php
		require_once('conexion.php');
		$mdb = connectDB();
		session_start();
		$mdb->set_charset('utf8');

		
		if((isset($_SESSION['session_username']))&&($_SESSION['tipo']==3)){
			
			$sql = "SELECT * FROM tipos_hospedajes WHERE estado_tipo_hospedaje = 0";
			$result=$mdb->query($sql);
			
			echo '<table class="table table-hover">';
			echo '<thead>';
			echo '<tr>';
			echo '<th scope="row">Tipo de Hospedaje</th>';
			echo '<th scope="row">Descripcion</th>';
			echo '</tr>';
			echo '<thead>';
			while($tipo_hospedaje=mysqli_fetch_assoc($result)){
				echo '<tbody>';
				echo '<tr>';
				echo '<th>' . $tipo_hospedaje['nombre_tipo_hospedaje'] . '</th>';
				echo '<th>' . $tipo_hospedaje['descripcion_tipo_hospedaje'] . '</th>';
				echo '<th><a href=modificar_tipo_hospedaje.php?id=' .	 $tipo_hospedaje["id_tipo_hospedaje"] . '>
				<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button></a></th>';
				echo '<th><a href=borrar-tipo-hospedaje.php?id=' .	 $tipo_hospedaje["id_tipo_hospedaje"] . '>
				<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></th>';
				echo '</tr>';

				echo '</tbody>';
			}
			echo '</table>';
		}
		else{
			 header("location:acceso-indebido.php");
		}
?>
<ul>
	<li><a href="inicio.php">Inicio</a></li>
	<li><a href="perfil.php">Perfil</a></li>
	<li><a href="logout.php">Cerrar Sesion</a> </li>
	<li><a href="alta_tipo_hospedaje.php">Alta Tipo De Hospedaje</a></li>
	<li><a class="active" href="listar_tipo_hospedajes.php">Listar Tipo De Hospedaje</a></li>
	</ul>


</body>
</html>
  
	
