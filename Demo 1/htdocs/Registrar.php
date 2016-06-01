<html>
<head>
<!-- JavaScript --> 
    <script type="text/javascript" src="jquery-1.11.3.min.js"></script>
    <script  type="text/javascript" src="funciones.js"></script>
<link rel="stylesheet" TYPE="text/css" href="style/style.css">

	    <!-- Bootstrap core CSS -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>


<?php
require_once('conexion.php');
$mdb = connectDB();
?>
<body>
<form name= "formulario" class="form" id = "formulario" action="" method="post" > 
<fieldset>
			<legend>Registrarse</legend>
<div><label>E-Mail:</label>
<input type="text" id="mail" name="mail" placeholder="UnMail@domain.com"> </div>
<div id="ErrorEmail"></div>
<div><label>Nombre:</label> 
<input type="text" id="nombre" name="nombre"></div> 
<div id="ErrorName"></div>
<div><label>Apellido:</label> 
<input type="text" id="apellido" name="apellido"></div>
<div id="ErrorLastName"></div>
<div><label>Clave:</label> 
<input type="password" id="password" name="password"></div> 
<div id="ErrorPassword"></div>
<div><label>Repetir Clave:</label> 
<input type="password" id="repassword" name="repassword"></div>
 <div id="ErrorPassword2"></div>
<div><label> Direccion:</label>
<input type="text" id="direccion" name="direccion"></div>
<div><input type="submit" id="enviar" name="enviar" value="Registrar"> <input type="reset" value="Cancelar"></div>
 </fieldset>	
</form> 
<a href="bienvenida.php">Volver</a>






</body>
<?php
if(isset($_POST['enviar']))//para saber si el botón registrar fue presionado. 
{ 
    if(($_POST['mail'])=='' or ($_POST['nombre']) == '' or ($_POST['apellido'])== '' or ($_POST['password']) == '' or ($_POST['repassword']) == ''  or ($_POST['direccion'])== '' ) 
    { 
        echo 'Por favor llene todos los campos.';//Si los campos están vacíos muestra el siguiente mensaje, caso contrario sigue el siguiente codigo.
    } 
	

	
    else 
    { 
		$var =($_POST['mail']);
        $sql = 'SELECT email_usuario FROM usuarios WHERE email_usuario="'.$_POST['mail'].'"'; 
        $mdb->set_charset('utf8');
		$result=$mdb->query($sql);
       
				
        if(mysqli_num_rows($result)==0 ) 
        { 
            if($_POST['password'] == $_POST['repassword'])//Si los campos son iguales, continua el registro y caso contrario saldrá un mensaje de error.
            { 
                $mail = $_POST['mail']; 
				$nombre = $_POST['nombre'];
				$apellido = $_POST['apellido'];
				$direccion = $_POST['direccion'];
                $password = $_POST['password']; 
                $sql = "INSERT INTO usuarios (email_usuario,nombre_usuario,apellido_usuario,pass_usuario,direccion_usuario,tipo_usuario) VALUES ('$mail','$nombre','$apellido','$password','$direccion','1')";//Se insertan los datos a la base de datos y el usuario ya fue registrado con exito.
                mysqli_query($mdb,$sql); 
  
                echo 'Usted se ha registrado correctamente.'; 
            } 
            else 
            { 
                echo 'Las claves no son iguales, intente nuevamente.'; 
            } 
        } 
        else 
        { 
            echo 'Este usuario ya ha sido registrado anteriormente.'; 
        } 
    } 
}
	?>
	
</html>	