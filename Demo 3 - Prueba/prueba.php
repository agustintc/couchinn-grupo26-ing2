<html>
<?php
session_start();
require_once('conexion.php');
$mdb = connectDB();
?>



hola <h2>hola, <span><?php echo $_SESSION['session_username'];?>! </span></h2>

</html>