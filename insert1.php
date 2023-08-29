<?php
include('conexion.php');
date_default_timezone_set('America/Guayaquil');
$return = Array('ok'=>TRUE);

$usu = $_POST['usu'];
$usuario = $_POST['usuario'];
$pass = $_POST['clave'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$rol = $_POST['rol'];

$hoy = date("Y-m-d H:i:s");


$q = "insert into usuario (usuario, pass, rol, nombre, apellido, estado, user, fecha)";
$q .= " values ('".$usuario."','".$pass."','".$rol."','".$nombre."','".$apellido."','A','".$usu."',now())";
if ($conn->query($q) === TRUE) {
  $return = Array('ok'=>TRUE);
  
 
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
  $return = Array('ok' => FALSE, 'msg' => "El registro no se pudo ingresar ".$conn->error, 'status' => 'error');
}
$conn->close();

header('Content-Type: application/json');
echo json_encode($return);
?>
