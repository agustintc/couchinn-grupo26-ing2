<html>
<head>
  <!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones.js"></script>
	
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
</head>
<body>
<?php

		require_once('conexion.php');
		session_start();
		$mdb = connectDB();
		$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
		$result= $mdb->query($sql);
		
		$usuario = mysqli_fetch_assoc($result);
	
?> 


		<div class="text-xs-center">
			<img src="imagenes/logo/logo.png"" class="img-responsive" width=420px alt="couchinn">
		</div>
	
	<ul>
		<li><a class="active" href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a></li>
		<li><a href="logout.php">Cerrar Sesion</a> </li>
		<?php 
			if($usuario['tipo_usuario'] == 3) {
				echo "<li><a href='listar_tipo_hospedajes.php'>Listar Tipo de Hospedajes</a></li>";
			}
		?>
	</ul>
	
	<div align="center"><h1>Perfil</h1></div>

	<table class="table table-striped">
	
		<tbody>
			<tr>
				<th>Nombre: </th>
					<td><?php echo $usuario['nombre_usuario'];?></td>
				</th>
			</tr>
			<tr>
				<th>Apellido: </th>
					<td><?php echo $usuario['apellido_usuario'];?></td>
				</th>
			</tr>
			<tr>
				<th>Email: </th>
					<td><?php echo $usuario['email_usuario'];?></td>
				</th>
			</tr>
			<tr>
				<th>Direccion: </th>
					<td><?php echo $usuario['direccion_usuario'];?></td>
				</th>
			</tr>
			<tr>
				<th>Edad: </th>
					<td><?php echo $usuario['edad_usuario']==0 ? '' : $usuario['edad_usuario'];?></td>
				</th>
			</tr>
			<tr>
				<th>Ocupacion: </th>
					<td><?php echo $usuario['ocupacion_usuario'];?></td>
				</th>
			</tr>
		</tbody>
	</table>
	
	
	<input type="button" onclick="window.location.replace('inicio.php')" value="Home"/>
	<input type="button" onclick="window.location.replace('editar.php')" value="Editar Perfil" />
</body>
</html>	
