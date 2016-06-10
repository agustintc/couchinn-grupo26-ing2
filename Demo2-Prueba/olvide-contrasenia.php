<?php
require_once('conexion.php');

$mdb= connectDB();
$mdb->set_charset('utf8');


$error="";
if (isset($_POST['Enviar']))
{
		//echo '<br>'.$_POST['email'];
		$sql = "select * from usuarios where  email_usuario ='".$_POST['email']."'" ;
		$result=$mdb->query($sql);
		$total= mysqli_num_rows($result);
		if ($total== 0)
		{
			//valores a cargar noexiste Ruta incorrecta
			$error="No existe Email";
		}
		else
			{
				$user=mysqli_fetch_assoc($result);
				$email=$user['email_usuario'];
				$pass=$user['pass_usuario'];
				//echo $email .' '.$pass.' '.$TipoClave;
				$ruta="location: cambio-contrasenia.php?id=".$user['id_usuario'];
				header($ruta);
				
			}
}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Olvide Contraseña</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 1.24" />
	
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">

	    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- JavaScript --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="js/funciones-jorge.js"></script>
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
  <li><a href="bienvenida.php">Iniciar Sesion</a> </li>
	<li><a href="registrar.php">Registrarse</a> </li>
</ul>
	
		<form id="formOlvide" class="form" action="olvide-contrasenia.php" method="Post">
		<fieldset>
			<legend>Olvide Contraseña</legend>
			<label> Ingrese Su Email: </label>	
			</br>
			<input tipe="text" id="email" name="email"> 
			</br>
			<div id="ErrorEmail"> <?php echo $error ?> </div>
			</br>
			<input type="button" value="Limpiar" onClick="this.form.reset()">
			<input type="submit" name="Enviar"value="Enviar">
		</fieldset>	
	</form>
	
</body>

</html>
