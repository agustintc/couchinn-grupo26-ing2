<style type="text/css">
.div-table{
  display:table;
  margin:auto;
  width:auto;         
  background-color:#eee;         
  border:1px solid  #666666;         
  border-spacing:5px;
}

.div-row{
  display:table-row;
  width:auto;
  clear:both;
}
.div-col{
  float:left;/*fix for  buggy browsers*/
  display:table-column;         
  width:200px;         
  background-color:#ccc;  
}


.div-th{
	float:left;
	width:200px;
}

.volver{
	
	float:left;
	margin:auto;
	border:1px;
}


</style>

<?php

	require_once('conexion.php');
	session_start();
	$mdb = connectDB();
	$id = $_GET['id'];
	$sql="SELECT * FROM hospedajes WHERE id_hospedaje = $id";
	$result= $mdb->query($sql);
		
		echo '<div class = "div-table">';
		echo '<div class = "div-th">Nombre de Hospedaje</div>';
		echo '<div class = "div-th">Descripcion</div>';
		echo '<div class = "div-th">Direccion</div>';
		echo '<div class = "div-th">Capacidad</div>';
		echo '<div class = "div-th">Tipo de hospedaje</div>';

		
		while($hospedaje=mysqli_fetch_assoc($result)){
		
			echo '<div class = "div-row">';	
			echo '<div class = "div-col">' . $hospedaje['nombre_hospedaje'] . '</div>';
			echo '<div class = "div-col">' . $hospedaje['descripcion_hospedaje'] . '</div>';
			echo '<div class = "div-col">' . $hospedaje['direccion_hospedaje'] . '</div>';
			echo '<div class = "div-col">' . $hospedaje['capacidad_hospedaje'] . '</div>';
			echo '<div class = "div-col">' . $hospedaje['nombre_tipo_hospedaje'] .'</div>';
		}
		echo '</div>';
		echo '</div>';
		


?>
	<a href=inicio.php><input type="button" class="volver" value="Volver"></a>
