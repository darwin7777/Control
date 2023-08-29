<?php
date_default_timezone_set('America/Guayaquil');
$return = Array('ok'=>TRUE);
$usu = $_POST['usu'];
$usuario = $_POST['usuario'];
$clave = $_POST['clave'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$rol = $_POST['rol'];

$servername = "localhost";
/*$username = "root";
$password = "";
$dbname = "elecciones";*/
$username = "adminCob";
$password = "JdVg+1985*$";
$dbname = "zonapa5_ccgcobranz";
$hoy = date("Y-m-d H:i:s");

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
include('conexion.php'); 
$hoy = date("Y-m-d H:i:s");

				$insert = "update usuario set pass = '".$clave."',rol = '".$rol."',nombre = '".$nombre."',";
				$insert .= "apellido = '".$apellido."', user = '".$usu."',fecha = now(),email = '".$email."' where usuario = '".$usuario."'";
				if ($conn->query($insert) === TRUE) {
					// ingresamos el valor del de olbogacion con el pago 
					$contador = 1;
	 }
if ($contador == 1) {
  $return = Array('ok'=>TRUE);
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
  $return = Array('ok' => FALSE, 'msg' => "El registro no se pudo ingresar ".$conn->error, 'status' => 'error');
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($return);
?>