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
    <script  type="text/javascript" src="funciones.js"></script>
<link rel="stylesheet" TYPE="text/css" href="style/style.css">

	    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<title>Premiun</title>
</head>
	<header></header>
	<ul> 	<li><a href="inicio.php">Inicio</a></li>
	<li><a href="perfil.php">Perfil</a> </li>
	<li><a href="logout.php">Cerrar Session</a> </li>
		<li><a class="active" href="premiun.php">Premium</a></li>
</ul>
			<div class="texto" >
			<h2>hola, <span><?php echo $_SESSION['session_username'];?>, usted esta por ser premium, si desea continuar, debera ingresar los siguientes datos, ya que se le cobrara un monto de <?php echo $monto;?> por los beneficios adquiridos. </span></h2>
			</div>
			<form name= "premium" class="form" action="" id="formulario" method="post" > 
			<fieldset>
			<legend>Ingresar Datos</legend>
			<div><label> Propietario de tarjeta de credito:</label>
			<input type="text" id="ptarjeta" name="ptarjeta" required></div>
			<div><label> Empresa de la tarjeta de credito:</label>
			<input type="text" id="etarjeta" name="etarjeta" required></div>
			<div><label> codigo de tarjeta de credito:</label>
			<input type="text" id="ctarjeta" name="ctarjeta" required></div>
			<div><input type="submit" id="enviar" name="enviar" value=" ser premium"> <input type="reset" value="Borrar"><input type="button" onclick="window.location.replace('inicio.php')" value="volver"/></div> 
			</fieldset>
			</form> 
			
<?php
	$sql = 'SELECT email_usuario FROM pagos WHERE email_usuario="'.$_SESSION["session_username"].'"'; 
        $mdb->set_charset('utf8');
		$result=$mdb->query($sql);
       
				
      if(mysqli_num_rows($result)==0 )
		  {
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
		else{echo " Usted ya es premium";
		}
?>


</html>
