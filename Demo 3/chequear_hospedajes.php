<html>
<head>
</head>
<body>
<?php
	function chequear_hospedajes(){
		
		$mdb = connectDB();
		$sql= "SELECT * FROM hospedajes WHERE estado_hospedaje = 1";
		$result= $mdb->query($sql);
	
		while ($hospedajes = mysqli_fetch_assoc($result)){
			$sql= "SELECT * FROM reservas WHERE estado = 2";
			$result_reservas= $mdb->query($sql);
			$total = mysqli_num_rows($result_reservas);
			if ($total == 0){
				$sql="UPDATE hospedajes SET estado_hospedaje = '2' WHERE id_hospedaje= " . $hospedajes['id_hospedaje'];
				$mdb->query($sql);
				$sql="DELETE FROM favoritos WHERE id_hospedaje = " . $hospedajes['id_hospedaje'];
				$result=$mdb->query($sql);
			}
		}
	}
?>
</body>
</html>