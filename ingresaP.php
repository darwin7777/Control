<?php
date_default_timezone_set('America/Guayaquil');
$return = Array('ok'=>TRUE);
$usu = $_POST['usu'];
$cantidad = $_POST['cantidad'];
$producto = $_POST['producto'];
$valor = $_POST['valor'];

include('conexion.php'); 
$hoy = date("Y-m-d H:i:s");

				$insert = "insert into producto(id_usuario,nombre_producto,cantidad,valor, estado,fecha)";
				$insert .= " values('".$usu."','".$producto."','".$cantidad."','".$valor."','A',now())";
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