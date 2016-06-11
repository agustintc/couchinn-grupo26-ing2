															
															
															
	<!-- Bootstrap core CSS -->
    <link href="boots/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" TYPE="text/css" href="style/style.css">
 <header></header>   

<?php

	require_once('conexion.php');
	$mdb = connectDB();
	session_start();
?>	

															<form name= "" class="form" id = "resp" action="" method="post" > 
															<fieldset>
															<div><label>Respuesta:</label>
															<input type="text" id="respuesta" name="respuesta"> </div>
															<div><input type="submit" id="resp" name="resp" value="Responder"></div>
															</fieldset>	
															</form> 
															<?php
															$fecha_actual=date("Y-m-d");
															if(isset($_POST['resp']) ){
																	if($_POST['respuesta']!=null){
																		$sql = "UPDATE pregunta_respuesta SET comentarior='".$_POST['respuesta']."' WHERE id ='".$_GET['id']."'";
																		$mdb->set_charset('utf8');
																		mysqli_query($mdb,$sql); ?>
																		<script type="text/javascript">
																		window.location="inicio.php";
																		</script>
																		<?php
																	}
																	else{
																		?><th><?php echo "Responda algo ";?></th><?php
																	}
															}
															
												
												?>
												
												
												