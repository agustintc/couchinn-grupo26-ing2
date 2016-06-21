</html>
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
<ul>
  <li><a href="#home">Inicio</a></li>		
  <li><a href="bienvenida.php">Iniciar Sesion</a></li>
  <li><a href="registrar.php">Registrarse</a> </li>
</ul> 

<?php
require_once('conexion.php');
$mdb = connectDB();
if(!empty($_POST['mail']) && !empty($_POST['password'])) 
	{
		$sql = 'SELECT email_usuario, pass_usuario FROM usuarios WHERE email_usuario="'.$_POST['mail'].'"'; 
        $mdb->set_charset('utf8');
		$result=$mdb->query($sql);
		$numrows=mysqli_num_rows($result);
		if($numrows!=0)
			{
				while($row=mysqli_fetch_assoc($result))
					{
						$dbmail=$row['email_usuario'];
						$dbpassword=$row['pass_usuario'];
						
						
						
					}
 
				if(($_POST['mail']) == $dbmail && ($_POST['password']) == $dbpassword)
					{
						
						session_start();
						$_SESSION['session_username']=($_POST['mail']);
						
						$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
						$result= $mdb->query($sql);
						$usuario = mysqli_fetch_assoc($result);
						$_SESSION['nombre']=$usuario['nombre_usuario'];
						$_SESSION['apellido']=$usuario['apellido_usuario'];
						$_SESSION['tipo']=$usuario['tipo_usuario'];
						$_SESSION['clave']=$usuario['pass_usuario'];
						$_SESSION['tipo_clave']=$usuario['tipo_clave'];
						if($_SESSION['tipo_clave']== '1')
						{
							header("location: cambiar-contrasenia.php");
							}
						$sql= "SELECT * FROM calificaciones_hospedajes WHERE email_calificador = '" . $_SESSION['session_username']. "' and valoracion = 0";
						$result = $mdb ->query($sql);
						$total= mysqli_num_rows($result);
						$sql= "SELECT * FROM calificaciones_usuarios WHERE email_calificador = '". $_SESSION['session_username']."' and valoracion = 0";
						$result = $mdb ->query($sql);
						$total= $total + mysqli_num_rows($result);
						//$user=mysqli_fetch_assoc($result); 	
						if($total != 0)
						{ ?>
						<script type="text/javascript">
						alert("Tiene Calificaciones Pendientes. Por Favor Complete Sus Calificaciones asi Conocemos tu Experiencia!!!");
						</script>	
						<?php }
?>
		
						<script type="text/javascript">
						window.location="inicio.php";
						</script>		
						
						
						<?php
					}
					else{
							?>
							
							<div class="texto" >
							<h2> <span> La cuenta no existe o se ingreso mal la contraseña</span></h2>
							</div> 
							<?php
						}
			}
		else{
			?>				
							<div class="texto" >
							<h2> <span> La cuenta no existe o se ingreso mal la contraseña</span></h2>
							</div>
							<?php
			
			
		}
			?>
			<div id="noLink"><a href="bienvenida.php">Volver a Intentar</a></div>
			</body>
			</html>
 
			<?php
	}		
						?>
		
