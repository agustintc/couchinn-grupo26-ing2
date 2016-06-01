<?php
require_once('conexion.php');
$mdb = connectDB();
if(!empty($_POST['mail']) && !empty($_POST['password'])) 
	{
		$sql = 'SELECT email_usuario, pass_usuario FROM usuarios WHERE email_usuario="'.$_POST['mail'].'"'; 
        $mdb->set_charset('utf8');
		$result=$mdb->query($sql);
		$numrows=mysqli_num_rows($result);
		if($numrows!=0)
			{
				while($row=mysqli_fetch_assoc($result))
					{
						$dbmail=$row['email_usuario'];
						$dbpassword=$row['pass_usuario'];
					}
 
				if(($_POST['mail']) == $dbmail && ($_POST['password']) == $dbpassword)
					{
						session_start();
						$_SESSION['session_username']=($_POST['mail']);
?>
		
						<script type="text/javascript">
						window.location="inicio.php";
						</script>		
						
						
						<?php
					}
					else{
						echo "La cuenta no existe o se ingreso mal la contraseña";
						}
			}
			echo "La cuenta no existe o se ingreso mal la contraseña";
			?>
			<a href="bienvenida.php">Volver a Intentar</a>
 
			<?php
	}		
						?>
		