<?php

	require_once('conexion.php');
	session_start();
	$mdb = connectDB();
	$id_hospedaje = $_GET['id'];
	$sql = "SELECT id_usuario FROM hospedajes WHERE id_hospedaje = '" . $id_hospedaje . "'";
	$hospedaje = mysqli_fetch_assoc($mdb->query($sql));
	$sql = "SELECT * FROM favoritos WHERE id_hospedaje = '" . $id_hospedaje . "'";
	$result = $mdb->query($sql);
	
	$total = mysqli_num_rows($result);
	
	if ($total == 0){
		$sql = "INSERT INTO FAVORITOS (id, id_hospedaje, id_usuario, id_duenio) VALUES (NULL, '" . $_GET['id'] . "', '" . $_SESSION['session_username'] . "',
				'" . $hospedaje['id_usuario'] . "')";
		$result = $mdb->query ($sql);
		echo $sql;
		if ($result){
			echo "entre";
		}
		else{
			echo "no";
		}
	}
	else{
		$sql = "DELETE FROM FAVORITOS where id_hospedaje = '" . $_GET['id'] . "' and id_usuario = '" . $_SESSION['session_username'] . "'";
		$result = $mdb->query($sql);
	}
	
	$ruta="location: ver_detalle.php?id=" . $_GET['id'];
	header($ruta);

?>
