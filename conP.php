<?php
date_default_timezone_set('America/Guayaquil');
$return = Array('ok'=>TRUE);
$usu = $_POST['usu'];
$id = $_POST['id'];

include('conexion.php'); 
$hoy = date("Y-m-d H:i:s");

	$consult = "Select id, nombre_producto nombre, cantidad, valor from producto where estado = 'A' and id = ".$id;
	//$consult.= " WHERE estadi = '".$afiliado."' AND st_ctacob = 'P'";
//	echo $consult;
	$result = $conn->query($consult);
	 if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
		 $cantidad = $row['cantidad'];	
		}
	 }
if ($cantidad != "") {
  $return = Array('ok'=>TRUE, 'cantidad'=>$cantidad );
} else {
  //echo "Error: " . $sql . "<br>" . $conn->error;
  $return = Array('ok' => FALSE, 'msg' => "No existe cantidad para este producto ".$conn->error, 'status' => 'error');
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($return);
?>