<html>

<?php

include('conexion.php'); 

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];
$id			= $_GET["id"];
$rol			= $_GET["rol"];
?>

   <head>
      <title>Consulta de Usuario</title>
      <meta charset="utf-8">         
      <link rel="stylesheet" href="css/estilos.css">
      <script src="js/modernizr-2.6.2.min.js"></script>
    <script language="javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
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

<h3><strong>Cosulta de Lineas de Trabajo</strong></h3>
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
</body>
</html>

