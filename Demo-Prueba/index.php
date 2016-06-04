<?php
require_once('conexion.php');
$mdb = connectDB();
$sql = "SELECT * FROM tipos_hospedajes";

    $mdb->set_charset('utf8');
	$result=$mdb->query($sql);
	//$total= mysqli_num_rows($result);
    //echo $total;
    //var_dump ($result);
    $tipo_hospedaje=mysqli_fetch_assoc($result); 
    echo 'Tipo: '.$tipo_hospedaje['nombre_tipo_hospedaje'];
    echo'<br>'; 
    echo 'Desc: '.$tipo_hospedaje['descripcion_tipo_hospedaje'];
    echo '<br>';
    echo 'Estado: '.$tipo_hospedaje['estado_tipo_hospedaje'];
    

?>

