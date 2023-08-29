<?php
include('conexion.php'); 
$id			= $_GET["id"];
header('Content-Type: application/json');
    $data_points = array();
	$consult = "select t.id, t.producto, t.cantidad_final, l.cantidad, TIME(l.hora) hora from liquidacion l inner join linea_trabajo t ON l.id_linea_trabajo = t.id where t.id = ".$id;
    //$result = mysqli_query($con, "SELECT * FROM plot_values"); 
	$result = $conn->query($consult);
	while($row = $result->fetch_assoc()) {
    //while ($row = mysqli_fetch_array($result)) {
        $point = array("valorx" => $row['cantidad'], "valory" => $row['hora']);
        array_push($data_points, $point);
    }
echo json_encode($data_points);
mysqli_close($con);
?>