<html>
<head>
	    <!-- Bootstrap core CSS -->
    <link href="boots/css/bootstrap.min.css" rel="stylesheet">
<head>
<body>
<?php

		require_once('conexion.php');
		$mdb = connectDB();
		$sql = "SELECT * FROM tipos_hospedajes WHERE estado_tipo_hospedaje = 0";
		$mdb->set_charset('utf8');
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
				echo '<th><a href=modificar-tipo-hospedaje.php?id=' .	 $tipo_hospedaje["id_tipo_hospedaje"] . '>
				<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-wrench" aria-hidden="true"></span></button></a></th>';
				echo '<th><a href=borrar-tipo-hospedaje.php?id=' .	 $tipo_hospedaje["id_tipo_hospedaje"] . '>
				<button type="button" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></th>';
				echo '</tr>';

			echo '</tbody>';
		}
		echo '</table>';

?>
</body>
</html>
  
	
