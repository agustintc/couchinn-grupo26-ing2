<?php
require_once('conexion.php');
$mdb= connectDB();
$mdb->set_charset('utf8');
session_start();
if((isset($_SESSION['session_username']))){
	$id= $_GET['id'];
	$sql = "SELECT * FROM hospedajes WHERE id_hospedaje = " .$_GET['id'] ;
	$result=$mdb->query($sql);
	$total= mysqli_num_rows($result);
	if ($total== 0)
		{
			header("location: ruta-invalida.php");
		}
	else
		{
			echo "Faltan las reservas";
		}
}
else {header("location: acceso-indebido.php");}
?>