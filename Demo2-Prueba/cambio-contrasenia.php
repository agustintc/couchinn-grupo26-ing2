<?php

require_once('conexion.php');

$mdb= connectDB();
$mdb->set_charset('utf8');

//Método con str_shuffle()
function generateRandomString($length = 6) {
    return substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, $length);
}
				$claveTemporal = generateRandomString();
				$TipoClave = '1';
if (isset($_GET['id']))
{
	$id= 0 + $_GET['id'];
	$sql = "select * from usuarios where  id_usuario =".$id;
	
	$result=$mdb->query($sql);
	$total= mysqli_num_rows($result);
	if($total == 0)
	{
		header("location: ruta-invalida.php");
	}
	else
	{
		$user=mysqli_fetch_assoc($result);
		$email=$user['email_usuario'];
		$id=$user['id_usuario'];
		//echo $id;
		//echo $email;
		//$pass=$user['pass_usuario'];
		$passTemporal = generateRandomString();
		/*echo $email;
		echo '<br>';
		echo $passTemporal;*/
		$sql = "UPDATE usuarios SET pass_usuario='".$passTemporal."',tipo_clave='1' WHERE id_usuario =".$id;
		//$sql = "UPDATE usuarios SET pass_usuario ='".$passTemporal."',SET tipo_clave ='1' WHERE email_usuario ='".$email."'" ;
		$result=$mdb->query($sql);
		
	}	
}
else {
		header("location: ruta-invalida.php");
	}

	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Cambio Contraseña</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
	
	<!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones-jorge.js"></script>
	
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">

</head>
<body>
<header></header>
<?php
		if(isset($_SESSION["session_username"])) {
			
			if(($_SESSION["tipo"])==2){
				?>
				<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted posee  privilegios premium</h2>
				<?php	
				}
			else{
					if(($_SESSION["tipo"])==1) {
					?>
						<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;" >Bienvenido, <?php echo $_SESSION['nombre'];?></h2>
					<?php	
					}
					else {
						if(($_SESSION["tipo"])==3){
						?>
							<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted es administrador</h2>
						<?php	
						}
					}	
				}		
		}
		?>
<ul>
  <li><a href="#home">Inicio</a></li>		
  <li><a href="bienvenida.php">Iniciar Sesion</a></li>
  <li><a href="registrar.php">Registrarse</a> </li>
</ul> 
<div id="noLink">
	<?php 
	echo $email;
	echo '<br>';
	echo $passTemporal;
	?>
	</div>
	
</body>

</html>
