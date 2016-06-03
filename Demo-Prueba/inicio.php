<<html>

<?php

require_once('conexion.php');
$mdb = connectDB();

session_start();
?>

<head>


<link rel="stylesheet" TYPE="text/css" href="style/style.css">
<title> Inicio </title>

</head>
<body>
		<header></header>
<ul>
  <li><a class="active" href="inicio.php">Inicio</a></li>
  <?php
  if(!isset($_SESSION["session_username"])) {
  ?>
	<li><a href="bienvenida.php">Iniciar Sesion</a> </li>
	<li><a href="registrar.php">Registrarse</a> </li>
<?php
} else {
	
  echo '<li><a href="perfil.php">Perfil</a></li>';
  echo '<li><a href="logout.php">Cerrar Sesion</a> </li>';
  
?>
  
  <?php
		$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
		$result= $mdb->query($sql);
		$usuario = mysqli_fetch_assoc($result);
		$tipousuario = $usuario['tipo_usuario'];
		if($usuario['tipo_usuario'] == 3) {
			echo"<li><a href=alta_tipo_hospedaje.php>Alta Tipo Hospedaje</a></li>";
			echo "<li><a href='listar_tipo_hospedajes.php'>Listar Tipo de Hospedajes</a></li>";
		}
	
  ?>
<?php

$sql = 'SELECT email_usuario FROM pagos WHERE email_usuario="'.$_SESSION["session_username"].'"'; 
        $mdb->set_charset('utf8');
		$result=$mdb->query($sql);
       
				
        if(mysqli_num_rows($result)==0 and $tipousuario != 3) 
        { 
?>
		<li><a href="premium.php">Premium</a></li>
 
<?php
		}
}
?>

</ul>
<?php
		require("listar_hospedajes.php");	
?>
</body>
</html>
