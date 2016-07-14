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
<?php
if(($_SESSION["tipo"])==2 or ($_SESSION["tipo"])==3){
?>	
						<script type="text/javascript">
						window.location="inicio.php";
						</script>
<?php	
}

?>




		
<ul>
		<?php
		if (!isset($_SESSION['session_username'])){?>
			<li><a class="active" href="inicio.php">Inicio</a></li>
			<li><a href="bienvenida.php">Iniciar Sesion</a></li>
			<li><a href="registrar.php">Registrarse</a></li>
		<?php
		}
		else{?>
		<li><a href="inicio.php">Inicio</a></li>
		<li><a href="perfil.php">Perfil</a></li>
		<?php 
			if($_SESSION['tipo'] == 3) {?>
				<li><a href='alta_tipo_hospedaje.php'>Alta Tipo de Hospedajes</a></li>
				<li><a href='listar_tipo_hospedajes.php'>Listar Tipo de Hospedajes</a></li>
				<li><a href="ganancias.php">Ganancias</a> </li>
				<li><a href="solicitudesaceptadas.php">Solicitudes Aceptadas</a> </li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else if($_SESSION['tipo']==1)
			{?>	<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href="busqueda.php">Buscar Hospedaje</a></li>
				<li><a href="mis-calificaciones.php">Mis Calificaciones</a></li>
				<li><a href="lugares-visitados.php">Lugares Visitados</a></li>
				<li><a class="active" href='premium.php'>Premium</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else {?>
				<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href="lugares-visitados.php">Lugares Visitados</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
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
			<div><input type="submit" id="enviar" name="enviar" value="Ser premium"> <input type="reset" value="Borrar"></div> 
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
				$_SESSION['tipo']=2;
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
