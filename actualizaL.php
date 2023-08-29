<?php
date_default_timezone_set('America/Guayaquil');
$return = Array('ok'=>TRUE);
$usu = $_POST['usu'];
$id = $_POST['id'];
$cantidad = $_POST['cantidad'];

include('conexion.php'); 
				$insert = "update linea_trabajo set id_usuario = '".$usu."',cantidad_estimada = ".$cantidad.",fecha = now() where id = ".$id;
				if ($conn->query($insert) === TRUE) {
					// ingresamos el valor del de olbogacion con el pago 
					$contador = 1;
	 }
if ($contador == 1) {
	   $insert = "insert into liquidacion(id_linea_trabajo,cantidad,hora)";
				$insert .= " values(".$id.",".$cantidad.",now())";
				if ($conn->query($insert) === TRUE) {
					// ingresamos el valor del de olbogacion con el pago 
					$contador = 1;
	 }
	 if ($contador == 1) {
  		$return = Array('ok'=>TRUE);
	 }
	 else
	{
		$return = Array('ok' => FALSE, 'msg' => "El registro no se pudo ingresar ".$conn->error, 'status' => 'error');
	}
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
  $return = Array('ok' => FALSE, 'msg' => "El registro no se pudo ingresar ".$conn->error, 'status' => 'error');
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($return);
?>