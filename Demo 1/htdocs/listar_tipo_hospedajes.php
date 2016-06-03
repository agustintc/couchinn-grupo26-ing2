<html>
<head>
	    <!-- Bootstrap core CSS -->
    <link href="boots/css/bootstrap.min.css" rel="stylesheet">
	



<style>
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
    float: left;
}

li a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover:not(.active) {
    background-color: #111;
}

.active {
    background-color: #4CAF50;
}
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
<head>
<body>
<ul>
	<li><a class="active" href="#home">Inicio</a></li>
	<li><a href="perfil.php">Perfil</a></li>
  <li><a href="logout.php">Cerrar Sesion</a> </li>
	</ul>

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
  
	
