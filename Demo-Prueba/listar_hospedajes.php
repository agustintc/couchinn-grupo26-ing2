<html>
<head>
	    <!-- Bootstrap core CSS -->
    <link href="boots/css/bootstrap.min.css" rel="stylesheet">
<head>
<body>

<?php

		require_once('conexion.php');
		$mdb = connectDB();
		$sql = "SELECT * FROM hospedajes";

		$mdb->set_charset('utf8');
		$result=$mdb->query($sql);
	
	
		echo '<table class="table table-hover">';
		echo '<thead>';
		echo '<tr>';
		echo '<th scope="row">Nombre de Hospedaje</th>';
		echo '<th scope="row">Descripcion</th>';
		echo '</tr>';
		echo '<thead>';
		while($hospedaje=mysqli_fetch_assoc($result)){
			
				echo '<tbody>';
				echo '<tr>';
				echo '<th>' . $hospedaje['nombre_hospedaje'] . '</th>';
				echo '<th>' . $hospedaje['descripcion_hospedaje'] . '</th>';
				echo '<th><a href=ver_detalle.php?id=' .$hospedaje["id_hospedaje"] . '>
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button></a></th>';
				echo '</tr>';
				echo '</tbody>';

		}	
		echo '</table>';
	
?>

</body>

</html>
