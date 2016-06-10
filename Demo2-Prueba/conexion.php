<?php
function connectDB(){
	
        $usuario = "root";
        $password = ""; 
		$dns = "localhost";
		$db_name="couchinn";
   try 
	{
		$mbd = new mysqli($dns, $usuario, $password,$db_name);
		return $mbd;
    }
    catch (Exception $e) {
    $rawdata = array(); //creamos un array
    $rawdata["success"] = 2;
	 $rawdata["message"] = "Error de Conexion en Servidor";
     echo json_encode($rawdata);
    die();
} 	
    
}

function disconectDB($mbd)
{
       try {
           mysqli_close($mdb);
        } catch (Exception $exc) {
        $rawdata["success"] = 2;
		$rawdata["message"] = "Error de Conexion en Servidor";
		echo json_encode($rawdata);
        die();
        }
    
}

?>

