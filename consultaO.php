<html>

<?php

include('conexion.php'); 

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];
$id			= $_GET["id"];
$rol		= $_GET["rol"];

$consulta = "select t.id, t.producto, t.cantidad_final, l.cantidad, TIME(l.hora) hora from liquidacion l inner join linea_trabajo t ON l.id_linea_trabajo = t.id where t.id = ".$id;
	//$consult.= " WHERE estadi = '".$afiliado."' AND st_ctacob = 'P'";
//	echo $consult;
	$resulta = $conn->query($consulta);
	
$sql = "select l.cantidad, cast(concat( SUBSTRING(TIME(l.hora), 1, 2), SUBSTRING('10:0', 1, 0)) as int) as hora from liquidacion l inner join linea_trabajo t ON l.id_linea_trabajo = t.id where t.id = ".$id;
$query = $conn->query($sql); // Ejecutar la consulta SQL
$data = array(); // Array donde vamos a guardar los datos
while($r = $query->fetch_object()){ // Recorrer los resultados de Ejecutar la consulta SQL
    $data[]=$r; // Guardar los resultados en la variable $data
}
?>

   <head>
      <title>Consulta de Usuario</title>
      <meta charset="utf-8">         
      <link rel="stylesheet" href="css/estilos.css">
 
     <script src="chart.min.js"></script>
     <script type="text/javascript" src="assets/script/modernizr-2.6.2.min.js"></script>  
    <script language="javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    <script type="text/javascript">
        /* window.onload = function () {
                var dataLength = 0;
                var data = [];
                $.getJSON("data.php?id=<?php echo $id; ?>", function (result) {
                    dataLength = result.length;
                    for (var i = 0; i < dataLength; i++) {
                        data.push({
                            x: parseInt(result[i].valorx),
                            y: parseInt(result[i].valory)
                        });
                    }
                    ;
                    chart.render();
                });
                var chart = new CanvasJS.Chart("chart", {
                    title: {
                        text: "Cantidad x horas trabajadas"
                    },
                    axisX: {
                        title: "Cantidad",
                    },
                    axisY: {
                        title: "Horas",
                    },
                    data: [{type: "line", dataPoints: data}],
                });
            }*/
        </script>
        <script type="text/javascript" src="assets/script/canvasjs.min.js"></script>
        <script type="text/javascript" src="assets/script/jquery-2.2.3.min.js"></script>
   <style type="text/css">
   #white {
	color: #FFF;
}
.tcentrado{
    height:90PX;
    width:90PX;
    text-align:center;
    border:1px solid silver;
    display: table-cell;
    vertical-align:middle;
}

#contenedor {
width: 900px;
margin: 0 auto;
}
 
   </style>
   </head>
   
<body>

<h3><strong>Consulta de Lineas de Trabajo</strong></h3>
<p align="right"><a href="pag_admin.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">
    <button style="background:#12192a; color:#FFF">Men&uacute;</button>
  </a></p>
<table width="100%" border="0">
  <tr bgcolor="#12192a">
  <td width="34%"><div align="center" id="white">
      <h5><strong>Producto</strong></h5>
    </div></td>
    <td width="26%"><div align="center" id="white">
      <h5><strong>Cantidad Final</strong></h5>
    </div></td>
    <td width="21%"><div align="center" id="white">
      <h5><strong>Cantidad Estimada</strong></h5>
    </div></td>
    <td width="19%"><div align="center" id="white">
      <h5><strong>Hora</strong></h5>
    </div></td>
  </tr>
  <?php
  	$consult = "select t.id, t.producto, t.cantidad_final, l.cantidad, TIME(l.hora) hora from liquidacion l inner join linea_trabajo t ON l.id_linea_trabajo = t.id where t.id = ".$id;
	//$consult.= " WHERE estadi = '".$afiliado."' AND st_ctacob = 'P'";
//	echo $consult;
	$result = $conn->query($consult);
	 if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
			$producto = $row['producto'];
			$etiquetas = $row['cantidad'];
			$datosVentas = $row['hora'];
  ?>
  <tr>
    <td height="43"><div align="center">
      <h5><?php echo $row['producto']; ?></h5>
    </div></td>
    <td><div align="center">
      <h5><?php echo $row['cantidad_final']; ?></h5>
    </div></td>
    <td><div align="center">
      <h5><?php echo $row['cantidad']; ?></h5>
    </div></td>
    <td><div align="center">
      <h5><?php echo $row['hora']; ?></h5>
    </div></td>
  </tr>
  <?php
		}
	 }
  ?>
</table>
<p><strong>Gr&aacute;fica de Producci&oacute;n de: <?php echo $producto ?> </strong></p>
<div style="background:#FFF">
<canvas id="chart1" style="width:100%;" height="100"></canvas></div>
<script>
var ctx = document.getElementById("chart1");
var data = {
        labels: [ 
        <?php foreach($data as $d):?>
        "<?php echo $d->cantidad; ?>", 
        <?php endforeach; ?>
        ],
        datasets: [{
            label: '<?php echo $producto ?>',
            data: [
        <?php foreach($data as $d):?>
        <?php echo  $d->hora; ?>, 
        <?php endforeach; ?>
            ],
            backgroundColor: "#3898db",
            borderColor: "#9b59b6",
            borderWidth: 2
        }]
    };
var options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    };
var chart1 = new Chart(ctx, {
    type: 'bar', /* valores: line, bar*/
    data: data,
    options: options
});
</script>

</body>
</html>

