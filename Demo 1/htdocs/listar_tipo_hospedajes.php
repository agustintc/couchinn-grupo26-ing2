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

</style>

<?php


		require_once('conexion.php');
		$mdb = connectDB();
		$sql = "SELECT * FROM tipos_hospedajes";
		$mdb->set_charset('utf8');
		$result=$mdb->query($sql);
			
		echo '<div class = "div-table">';
		echo '<div class = "div-th">Tipo de Hospedaje</div>';
		echo '<div class = "div-th">Descripcion</div>';
		while($tipo_hospedaje=mysqli_fetch_assoc($result)){
			echo '<div class = "div-row">';	
			if ($tipo_hospedaje['estado_tipo_hospedaje'] == 0){	
				echo '<div class = "div-col">' . $tipo_hospedaje['nombre_tipo_hospedaje'] . '</div>';
				echo '<div class = "div-col">' . $tipo_hospedaje['descripcion_tipo_hospedaje'] . '</div>';
				echo '<a href=modificar-tipo-hospedaje.php?id=' .	 $tipo_hospedaje["id_tipo_hospedaje"] . '><input type="button" value="Modificar"></a>';
				echo '<a href=borrar-tipo-hospedaje.php?id=' .	 $tipo_hospedaje["id_tipo_hospedaje"] . '><input type="button" value="Borrar"></a>';

			}
			echo '</div>';
		}
		echo '</div>';


?>

	
