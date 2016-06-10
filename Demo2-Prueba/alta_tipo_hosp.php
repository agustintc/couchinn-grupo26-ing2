<?php
require_once('conexion.php');

$mdb= connectDB();
echo $_POST['nombreTipo'];
echo $_POST["descTipo"];
$sql = "INSERT INTO tipos_hospedajes (id_tipo_hospedaje, nombre_tipo_hospedaje, descripcion_tipo_hospedaje, estado_tipo_hospedaje) VALUES(null,'".$_POST['nombreTipo']."','".$_POST["descTipo"]."','0')";
$mdb->set_charset('utf8');
$result=$mdb->query($sql);
 if ($result)
 {
	 echo 'insert Correcto'; // Redirigir al Inicio
	 } 
 else
	{
		echo 'erroneo'; // 
		}
 //disconectDB($mdb);	

?>

