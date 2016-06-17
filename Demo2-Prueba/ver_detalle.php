<?php

	error_reporting(1);
?>
<head> <title> Detalle </title></head>
<style type="text/css">

#images {
    width: 520px;
    height: 340px;
    overflow: hidden;
    position: relative;

    margin: 20px auto;
}
#images img {
    width: 520px;
    height: 340px;

    position: absolute;
    top: 0;
    left: -400px;
    z-index: 1;
    opacity: 0;

    transition: all linear 500ms;
    -o-transition: all linear 500ms;
    -moz-transition: all linear 500ms;
    -webkit-transition: all linear 500ms;
}
#images img:target {
    left: 0;
    z-index: 9;
    opacity: 1;
}
#images img:first-child {
left: 0;
opacity: 1;
}
#slider a {

    text-decoration: none;
    background: #E3F1FA;
    border: 1px solid #C6E4F2;
    padding: 4px 6px;
    color: #222;
}
#slider a:hover {
    background: #C6E4F2;
}
#slider{
	text-align:center;
}
.image:hover img {
    -webkit-backface-visibility: hidden;
    backface-visibility: hidden;
    -webkit-transform:translateZ(0) scale(1.20);
    -moz-transform:scale(1.20); 
    -ms-transform:scale(1.20); 
    -o-transform:translatZ(0) scale(1.20);
    transform:translatZ(0) scale(1.20);
}

 
</style>
<!-- Bootstrap core CSS -->
    <link href="boots/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" TYPE="text/css" href="style/style.css">
	<link rel="stylesheet" TYPE="text/css" href="style/style.css">
 <header></header>   

<?php
	require_once('conexion.php');
	$mdb = connectDB();
	session_start();
		if (isset($_SESSION['session_username'])){
			if(($_SESSION["tipo"])==2){
				?>
				<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted posee  privilegios premium</h2>
				<?php	
			}
			if(($_SESSION["tipo"])==1) {
					?>
						<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?></h2>
					<?php	
			}
			if(($_SESSION["tipo"])==3){
						?>
							<h2 style ="font-size:15px;font-weight: bold;font-family:Arial;text-align:left;">Bienvenido, <?php echo $_SESSION['nombre'];?>, usted es administrador</h2>
						<?php	
			}
			$query = "SELECT * FROM usuarios WHERE email_usuario = '" . $_SESSION['session_username']. "'";
			$result_query = $mdb->query($query);
			$tipo = (mysqli_fetch_assoc($result_query)['tipo_usuario']);
		}
		else{
			$tipo = '4';
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
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else if($_SESSION['tipo']==1)
			{?>	<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href='premium.php'>Premium</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
			else {?>
				<li><a href="alta_hospedaje.php">Alta de Hospedaje</a></li>
				<li><a href="mis_hospedajes.php">Mis Hospedajes</a></li>
				<li><a href="mis_reservas.php">Mis Reservas</a></li>
				<li><a href="logout.php">Cerrar Sesion</a> </li>
			<?php
			}
		}
		?>
	
	</ul>
	<?php
	
	$id = $_GET['id'];
	$sql="SELECT * FROM hospedajes WHERE id_hospedaje = $id";
	$result= $mdb->query($sql);
	
	$hospedaje=mysqli_fetch_assoc($result)
		
	
?>
	<h1 align="center"><?php echo $hospedaje['nombre_hospedaje'];?></h1>
	
	<?php
		 
		function isEmptyDir($dir){ 
			return (($files = @scandir($dir)) && count($files) <= 2); 
		} 

		$directory="imagenes/hospedajes/" .$hospedaje['id_hospedaje']."";
		
		if (!file_exists($directory) || (isEmptyDir($directory))){
			$directory="imagenes/logo/";
		}
		$dirint = dir($directory);
		?>
		<div id="images">
		<?php
			
		while (($archivo = $dirint->read()) !== false)
		{
			if( preg_match('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $archivo)){?>
				<div class="image">
				<img id="<?php echo $archivo;?>" src="<?php echo ''.$directory .'/' . $archivo ; ?>" ></img>
				</div>
			<?php
			}
		}
		?>
		</div>
		<div id="slider"><?php
			$dirint = dir($directory);
			$i=1;
			while (($archivo = $dirint->read()) !== false){
				if (preg_match('/\.(jpg|jpeg|png|gif)(?:[\?\#].*)?$/i', $archivo)){?>
					<a href="<?php echo '#' . $archivo;?>"><?php echo $i;?></a>
				<?php
				$i++;
				}
			}
			?>
		</div>
		<br>
	<div style="text-align:center;">
		<p>Tipo de Hospedaje: <?php echo $hospedaje["nombre_tipo_hospedaje"];?></p>
		<p>Descripcion: <?php echo $hospedaje["descripcion_hospedaje"];?></p>
		<p>Capacidad: <?php echo $hospedaje["capacidad_hospedaje"];?> Personas</p>
		<p>Lugar del Hospedaje: <?php echo $hospedaje['nombre_lugar'];?></p>
		<p>Direccion: <?php echo $hospedaje["direccion_hospedaje"];?>  </p>
		<?php
			if (isset($_SESSION['session_username'])){
				if ($hospedaje['id_usuario'] == $_SESSION['session_username']){
					?>
					<a href=modificar_hospedaje.php?id=<?php echo $hospedaje["id_hospedaje"];?>><input type="button" value="Modificar Hospedaje"></a>
					<a href=borrar_hospedaje.php?id=<?php echo $hospedaje["id_hospedaje"];?>><input type="button" value="Borrar Hospedaje"></a>
					<?php
					
					
					?>
					<?php
				}
				else{
					if ($tipo == 1 || $tipo == 2){?>
						<a href=""><input type="button" value="Reservar"></a>
						<?php
					}
				}
			}
			else{
				?>
				<a href="registrar.php"><input type="button" value="Reservar"></a>
				<?php
				
			}
			?>
	</div>
		<?php
		
		if(isset($_SESSION["session_username"])){
					if($_SESSION['session_username']!=$hospedaje["id_usuario"]){
						?>	
						<form name= "" class="form" id = "preg" action="" method="post" > 
						<fieldset>
						<div><label>Pregunta:</label>
						<input type="text" id="pregunta" name="pregunta"> </div>
						<div id="ErrorEmail"></div>
						<div><input type="submit" id="enviar" name="enviar" value="Preguntar"></div>
						</fieldset>	
						</form> 
						<?php
						$fecha_actual=date("Y-m-d");
						if(isset($_POST['enviar'])){
							if($_POST['pregunta']!=null){
								$sql = "INSERT INTO pregunta_respuesta (comentariop,fecha,id_inquilino,id_hospedaje) VALUES ('".$_POST['pregunta']."','".$fecha_actual."','".$_SESSION['session_username']."','".$hospedaje['id_hospedaje']."')";
								$mdb->set_charset('utf8');
								mysqli_query($mdb,$sql); 
							}
							else {
								?><th class=><?php echo "Pregunte algo ";?></th><?php
							}
						}
					}	

					$sql = "SELECT * FROM pregunta_respuesta   WHERE id_hospedaje = '".$hospedaje['id_hospedaje']."'";
					$result=$mdb->query($sql);
					while($pregunta=mysqli_fetch_assoc($result)){
							if($pregunta['id_inquilino']==$_SESSION['session_username']){
							?>
										<div class=texto style="border:1px solid green;">
										
										<tbody>
										<tr  >
										<th><?php echo $pregunta['comentariop'];?></th>
										<th><?php echo $pregunta['id_inquilino'];?></th>
										<br> 
										<th><?php echo $pregunta['comentarior'];?></th>
										<br> 
										</tr>
										</tbody>
										
										</div>
								<?php
							}
							else {
									if($hospedaje['id_usuario']==$_SESSION['session_username']){
										?>
										<div class=texto style="border:1px solid green;">
										<tbody >
										
										<tr>
										<th ><?php echo $pregunta['comentariop'];?></th>
										<th><?php echo $pregunta['id_inquilino'];?></th>
										<br> 
										<th><?php echo $pregunta['comentarior'];?></th>
										<br>
										
										<?php if($pregunta['comentariop']!=null && $pregunta['comentarior']==null  ){ ?>
															<th ><a align="center"  href=responder_pregunta.php?id=<?php echo  $pregunta["id"];?>>
															<button  type="button" class="btn btn-success">Responder</button></a></th>

											  </tr>
											  </tbody>
										
											  <?php
										}
										?></div><?php
									}	
								else{
									?>
									<div class=texto style="border:1px solid green;">
										
										<tbody>
										<tr  >
										<th><?php echo $pregunta['comentariop'];?></th>
										<th><?php echo $pregunta['id_inquilino'];?></th>
										<br> 
										<th><?php echo $pregunta['comentarior'];?></th>
										<br> 
										</tr>
										</tbody>
										
										</div>
									<?php
						
								}
							}
					}
		

		}
		else{
									$sql = "SELECT * FROM pregunta_respuesta WHERE id_hospedaje = '".$hospedaje['id_hospedaje']."'";
									$result=$mdb->query($sql);
		
								while($pregunta=mysqli_fetch_assoc($result)){
										?>
										<div class=texto style="border:1px solid green;">
										
										<tbody>
										<tr  >
										<th><?php echo $pregunta['comentariop'];?></th>
										<th><?php echo $pregunta['id_inquilino'];?></th>
										<br> 
										<th><?php echo $pregunta['comentarior'];?></th>
										<br> 
										</tr>
										</tbody>
										
										</div>
										<?php
							}
			
		}
	?>

