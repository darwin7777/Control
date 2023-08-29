<?php
date_default_timezone_set('America/Guayaquil');
$return = Array('ok'=>TRUE);
$usu = $_POST['usu'];
$prod = $_POST['prod'];
$cantR = $_POST['cantR'];
$cantE = $_POST['cantE'];
$horas = $_POST['horas'];
$empresa = $_POST['empresa'];

include('conexion.php'); 
$consult = "Select nombre_producto from producto where id = ".$prod;
	$result = $conn->query($consult);
	 if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$nprod = $row['nombre_producto'];
		}
	 }
$hoy = date("Y-m-d H:i:s");

				$insert = "insert into linea_trabajo(id_usuario,producto,cantidad_final, cantidad_estimada, estado,fecha, empresa, horas)";
				$insert .= " values('".$usu."','".$nprod."',".$cantR.",".$cantE.",'A',now(),'".$empresa."',".$horas.")";
				if ($conn->query($insert) === TRUE) {
					// ingresamos el valor del de olbogacion con el pago 
					$contador = 1;
	 }
if ($contador == 1) {
	$consult = "Select max(id) id from linea_trabajo";
	$result = $conn->query($consult);
	 if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$idL = $row['id'];
		}
	 }
	   $insert = "insert into liquidacion(id_linea_trabajo,cantidad,hora)";
				$insert .= " values(".$idL.",".$cantE.",now())";
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