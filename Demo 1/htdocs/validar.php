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
						
						$sql= "SELECT * FROM USUARIOS WHERE email_usuario = '" . $_SESSION['session_username']. "'";
						$result= $mdb->query($sql);
						$usuario = mysqli_fetch_assoc($result);
						$_SESSION['nombre']=$usuario['nombre_usuario'];
						$_SESSION['apellido']=$usuario['apellido_usuario'];
						$_SESSION['tipo']=$usuario['tipo_usuario'];
						$_SESSION['clave']=$usuario['pass_usuario'];

?>
		
						<script type="text/javascript">
						window.location="inicio.php";
						</script>		
						
						
						<?php
					}
					else{
							?>
							<div class="texto" >
							<h2> <span> La cuenta no existe o se ingreso mal la contraseña</span></h2>
							</div>
							<?php
						}
			}
		else{
			?>
							<div class="texto" >
							<h2> <span> La cuenta no existe o se ingreso mal la contraseña</span></h2>
							</div>
							<?php
			
			
		}
			?>
			<a href="bienvenida.php">Volver a Intentar</a>
 
			<?php
	}		
						?>
		