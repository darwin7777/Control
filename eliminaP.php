<?php
date_default_timezone_set('America/Guayaquil');
$return = Array('ok'=>TRUE);
$usu = $_POST['usu'];
$cantidad = $_POST['cantidad'];
$producto = $_POST['producto'];
$valor = $_POST['valor'];
$id = $_POST['id'];

include('conexion.php'); 
$hoy = date("Y-m-d H:i:s");

				$insert = "update producto set estado = 'X'  where id = ".$id;
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