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
				echo '<th>';
				if ($tipo == 1 || $tipo == 4){
					$directory="imagenes/logo/";
				}
				else{
					$directory="imagenes/hospedajes/" .$hospedaje['id_hospedaje']."";
				}
				$isDirEmpty = !(new \FilesystemIterator($directory))->valid();
				if (! $isDirEmpty){
				$scanned_directory = array_diff(scandir($directory), array('..', '.'));
						echo '<div class="col-sm-2 col-md-4 img-hover">';
						echo '<div class="thumbnail">
							<img src="'.$directory."/".$scanned_directory[2].'"  height=340px; width=500px"></img>
							</div>';	
						echo '</div>';
					
				}
				echo '<th><a href=ver_detalle.php?id=' .$hospedaje["id_hospedaje"] . '>
				<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-plus"></span></button></a></th>';
				echo '</tr>';
				echo '</tbody>';

		}	
		echo '</table>';
	
?>

</body>

</html>
