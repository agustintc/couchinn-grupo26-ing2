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
  float:left;
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
		$sql = "SELECT * FROM hospedajes";

		$mdb->set_charset('utf8');
		$result=$mdb->query($sql);
	
		echo '<div class = "div-table">';
		echo '<div class = "div-th">Nombre de Hospedaje</div>';
		echo '<div class = "div-th">Descripcion</div>';
		while($hospedaje=mysqli_fetch_assoc($result)){
				echo '<div class = "div-row">';	
				echo '<div class = "div-col">' . $hospedaje['nombre_hospedaje'] . '</div>';
				echo '<div class = "div-col">' . $hospedaje['descripcion_hospedaje'] . '</div>';
				echo '<a href=ver_detalle.php?id=' .$hospedaje["id_hospedaje"] . '><input type="button" value="Ver Detalle"></a>';

		}
		echo '</div>';
		echo '</div>';		
?>