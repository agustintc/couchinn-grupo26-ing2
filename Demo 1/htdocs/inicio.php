<html>

<?php

require_once('conexion.php');
$mdb = connectDB();

session_start();
?>

<head>




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
<ul>
  <li><a class="active" href="#home">Inicio</a></li>
  <?php
  if(!isset($_SESSION["session_username"])) {
  ?><li><a href="bienvenida.php">Iniciar Sesion</a> </li>
	<li><a href="registrar.php">Registrarse</a> </li>
<?php
} else {
?>
  <li><a href="perfil.php">Perfil</a></li>
  <li><a href="logout.php">Cerrar Sesion</a> </li>
  
<?php

$sql = 'SELECT email_usuario FROM pagos WHERE email_usuario="'.$_SESSION["session_username"].'"'; 
        $mdb->set_charset('utf8');
		$result=$mdb->query($sql);
       
				
        if(mysqli_num_rows($result)==0 ) 
        { 
?>
		<li><a href="premium.php">ser premium</a></li>
 
<?php
		}
}
?>

</ul>
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
</body>
</html>