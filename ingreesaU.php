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

include('conexion.php'); 
$hoy = date("Y-m-d H:i:s");

				$insert = "insert into usuario(usuario,pass,rol,nombre,apellido, estado,user,fecha,email)";
				$insert .= " values('".$usuario."','".$clave."','".$rol."','".$nombre."','".$apellido."','A','".$usu."',now(),'".$email."')";
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