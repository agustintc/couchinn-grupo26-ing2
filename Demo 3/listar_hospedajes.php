<html>
<head>
	    <!-- Bootstrap core CSS -->
    <link href="boots/css/bootstrap.min.css" rel="stylesheet">

<head>
<body>

<?php
		require_once('conexion.php');
		$mdb = connectDB();
	if(isset($_POST['enviar'])){
		 if($_POST['criterio']=="Puntaje"){
        $sql = "SELECT id_hospedaje, nombre_hospedaje, descripcion_hospedaje, nombre_lugar, direccion_hospedaje, capacidad_hospedaje, h.nombre_tipo_hospedaje, id_usuario, estado_hospedaje, id_tipo_hospedaje,th.estado_tipo_hospedaje, IFNULL( ROUND( AVG( valoracion ) , 2 ) , 0 ) AS prom
		FROM hospedajes AS h
		INNER JOIN tipos_hospedajes AS th ON ( h.nombre_tipo_hospedaje = th.nombre_tipo_hospedaje ) 
		LEFT JOIN calificaciones_hospedajes AS ch ON ( id_hospedaje = hospedaje_calificado ) 
		WHERE h.estado_hospedaje =0
		AND th.estado_tipo_hospedaje =0
		GROUP BY id_hospedaje
		ORDER BY prom DESC ";
		 }
       if($_POST['criterio']=="Alfabetico"){
		   $sql = "SELECT id_hospedaje, nombre_hospedaje, descripcion_hospedaje, nombre_lugar, direccion_hospedaje, capacidad_hospedaje, h.nombre_tipo_hospedaje, id_usuario, estado_hospedaje, id_tipo_hospedaje,th.estado_tipo_hospedaje, IFNULL( ROUND( AVG( valoracion ) , 2 ) , 0 ) AS prom
		FROM hospedajes AS h
		INNER JOIN tipos_hospedajes AS th ON ( h.nombre_tipo_hospedaje = th.nombre_tipo_hospedaje ) 
		LEFT JOIN calificaciones_hospedajes AS ch ON ( id_hospedaje = hospedaje_calificado ) 
		WHERE h.estado_hospedaje =0
		AND th.estado_tipo_hospedaje =0
		GROUP BY id_hospedaje
		ORDER BY  h.nombre_hospedaje";
		}
        if($_POST['criterio']=="Capacidad"){
		 $sql = "SELECT id_hospedaje, nombre_hospedaje, descripcion_hospedaje, nombre_lugar, direccion_hospedaje, capacidad_hospedaje, h.nombre_tipo_hospedaje, id_usuario, estado_hospedaje, id_tipo_hospedaje,th.estado_tipo_hospedaje, IFNULL( ROUND( AVG( valoracion ) , 2 ) , 0 ) AS prom
		FROM hospedajes AS h
		INNER JOIN tipos_hospedajes AS th ON ( h.nombre_tipo_hospedaje = th.nombre_tipo_hospedaje ) 
		LEFT JOIN calificaciones_hospedajes AS ch ON ( id_hospedaje = hospedaje_calificado ) 
		WHERE h.estado_hospedaje =0
		AND th.estado_tipo_hospedaje =0
		GROUP BY id_hospedaje
		ORDER BY  h.capacidad_hospedaje DESC ";
        }
		}
	else {
		$sql = "SELECT id_hospedaje, nombre_hospedaje, descripcion_hospedaje, nombre_lugar, direccion_hospedaje, capacidad_hospedaje, h.nombre_tipo_hospedaje, id_usuario, estado_hospedaje, id_tipo_hospedaje,th.estado_tipo_hospedaje, IFNULL( ROUND( AVG( valoracion ) , 2 ) , 0 ) AS prom
		FROM hospedajes AS h
		INNER JOIN tipos_hospedajes AS th ON ( h.nombre_tipo_hospedaje = th.nombre_tipo_hospedaje ) 
		LEFT JOIN calificaciones_hospedajes AS ch ON ( id_hospedaje = hospedaje_calificado ) 
		WHERE h.estado_hospedaje =0
		AND th.estado_tipo_hospedaje =0
		GROUP BY id_hospedaje
		ORDER BY prom DESC ";
		
		
	}
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
		?>
		<table class="table table-hover">
		<thead>
		<tr>
		<th scope="row">Nombre de Hospedaje</th>
		<th scope="row">Descripcion</th>
		<th scope="row">Puntaje</th>
		<th scope="row">Capacidad</th>
		</tr>
		<thead>
		<?php
		while($hospedaje=mysqli_fetch_assoc($result)){
				if ($hospedaje['estado_tipo_hospedaje'] == 0 && $hospedaje['estado_hospedaje'] == 0){	
					?>
					<tbody>
					<tr>
					<th> <?php echo $hospedaje['nombre_hospedaje'];?></th>
					<th> <?php echo $hospedaje['descripcion_hospedaje'];?></th>
					<th> <?php echo $hospedaje['prom'];?></th>
					<th> <?php echo $hospedaje['capacidad_hospedaje'];?></th>

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
		?>
		</table>
		<?php
	
?>

</body>

</html>
