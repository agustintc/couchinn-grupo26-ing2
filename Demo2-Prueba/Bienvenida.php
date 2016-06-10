<html>
<?php
require_once('conexion.php');
$mdb = connectDB();
?>
<head>
<link rel="stylesheet" TYPE="text/css" href="style/style.css">

	    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <title> Iniciar Session</title>

</head>
<body>
<header></header>
<ul>
	<li><a  href="inicio.php">Inicio</a></li>
	<li><a class="active" href="bienvenida.php">Iniciar Sesion</a> </li>
	<li><a href="registrar.php">Registrarse</a> </li>
</ul>	


<form name= "iniciarsesion"  class="form" action="validar.php" method="post" >
 <fieldset>
			<legend>Iniciar Sesion</legend>
<div><label>E-Mail:</label>
<input type="text" id="mail" name="mail" placeholder="UnMail@domain.com" required> </div> 
<div><label>Clave:</label> 
<input type="password" id="password" name="password" required></div> 
<div><input type="submit" id="enviar" name="enviar" value="Iniciar Sesion">
 <input type="reset" value="Cancelar"></div> 
 <a href="olvide-contrasenia.php"> Olvide Contrase&ntilde;a</a>
</fieldset>
</form> 

</body>
</html>
