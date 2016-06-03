<html>
<?php
session_start();
require_once('conexion.php');
$mdb = connectDB();
$monto=60;
$fecha_actual=date("Y-m-d");
?>

<head>
<!-- JavaScript --> 
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="funcionespre.js"></script>
<link rel="stylesheet" TYPE="text/css" href="style/style.css">

	    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">

</head>
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
$sql = 'SELECT email_usuario FROM pagos WHERE email_usuario="'.$_SESSION["session_username"].'"'; 
        $mdb->set_charset('utf8');
		$result=$mdb->query($sql);
       
				
      if(mysqli_num_rows($result)==0 )
	{	
?>




			<div class="texto" >
			<h2>hola, <span><?php echo $_SESSION['nombre'];?>, usted esta por ser premium, si desea continuar, debera ingresar los siguientes datos, ya que se le cobrara un monto de <?php echo $monto;?> por los beneficios adquiridos. </span></h2>
			</div>
			<form name= "premium" class="form" action="" id="premium" method="post" > 
			<fieldset>
			<legend>Ingresar Datos</legend>
			<div><label> Propietario de tarjeta de credito:</label>
			<input type="text" id="ptarjeta" name="ptarjeta" required></div>
			<div id="ErrorName"></div>
			<div><label> Empresa de la tarjeta de credito:</label>
			<input type="text" id="etarjeta" name="etarjeta" required></div>
			<div id="ErrorLastName"></div>
			<div><label> codigo de tarjeta de credito:</label>
			<input type="password" id="ctarjeta" name="ctarjeta" required></div>
			<div id="ErrorPassword"></div>
			<div><input type="submit" id="enviar" name="enviar" value=" ser premium"> <input type="reset" value="Borrar"><input type="button" onclick="window.location.replace('inicio.php')" value="volver"/></div> 
			</fieldset>
			</form> 
			
<?php
	
			if(isset($_POST['enviar']))//para saber si el botón registrar fue presionado. 
			{	 
     
		
				$sql = "INSERT INTO pagos (id_pago, email_usuario, saldo_pago, fecha_pago) VALUES ('NULL', '".$_SESSION['session_username']."', '".$monto."', '".$fecha_actual."')"; 
				$mdb->set_charset('utf8');
				mysqli_query($mdb,$sql);
				$sql ="UPDATE usuarios SET tipo_usuario = '2' WHERE usuarios.email_usuario ='".$_SESSION['session_username']."'";
				mysqli_query($mdb,$sql);
				?>
				<div class="texto" >
				<h2> <span> Usted es premium </span></h2>
				</div>
							
				<?php
			}    
		}
		else{?>
				<div class="texto" >
				<h2> <span> Usted ya es premium, no puede volver a realizar la operacion </span></h2>
				</div>
				<?php
		}
?>


</html>