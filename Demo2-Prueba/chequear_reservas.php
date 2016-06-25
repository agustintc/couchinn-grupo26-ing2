<html>
<head>
</head>
<body>
<?php
	function chequear_reservas(){
		
		$mdb = connectDB();
		$sql= "SELECT * FROM RESERVAS WHERE estado = 2";
		$result= $mdb->query($sql);
	
		while ($reservas = mysqli_fetch_assoc($result)){
			if ($reservas['finalizacion'] <= date("Y-m-d")){
				$sql = "UPDATE reservas SET estado = 3 WHERE id_reserva = '" . $reservas['id_reserva'] . "'";
				$mdb->query($sql);
			}
		}
	}
?>
</body>
</html>