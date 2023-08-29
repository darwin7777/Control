 <!DOCTYPE html>
<html>

<?php

include('conexion.php'); 

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];
$id			= $_GET["id"];
//echo "Sin entro";
?>
<head>
    <title>Consulta de &Oacute;rdenes</title>
      <meta charset="utf-8">       
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    <link rel="stylesheet" href="css/estilos.css">
      <script src="js/modernizr-2.6.2.min.js"></script>
    <script language="javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
    <style>
	.content {
  	max-width: auto;
  	margin: auto; }

	</style>
           
	</head>   
		<body style = "margin-top:0; background-color:powderblue">
        <h3><strong>Cosulta de Lineas de Trabajo</strong></h3>
        <p align="right"><a href="pag_admin.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>">
    <button style="background:#12192a; color:#FFF">Men&uacute;</button>
  </a></p>
        <div class="content"> 
		<div class="container">
        <div class='wrap-table100'>  
        <div class='table100 ver1 m-b-110'>    
        <table data-vertable='ver1'>
                        	<thead>
							<tr class='row100 head'>
							<th align="center" style='width:50px'>Producto</th> 
							<th class='column100 column2' data-column='column2'><center>Cantidad Final</center></th>
							<th class='column100 column3' data-column='column3'><center>Cantidad Estimada</center></th>
							<th class='column100 column4' data-column='column4'><center>Hora</center></th>
           					</tr>
							</thead>   
              <tbody>
				

<?php
//require('conectar.php');
?>
						                      

<?php

$sql = "select t.id, t.producto, t.cantidad_final, l.cantidad, TIME(l.hora) hora from liquidacion l inner join linea_trabajo t ON l.id_linea_trabajo = t.id where t.id = ".$id;
//echo $sql;
//$result = mysqli_query($conn, $sql);
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) 
            			{	
?>
<tr class='row100'>
<td style='width:10px'><center> <?php echo $row['producto'];?> </center></td>
<td> <center><?php echo $row['cantidad_final']; ?>  </center> </td>
<td> <center><?php echo $row['cantidad']; ?></center></td>
<td> <center><?php echo $row['hora']; ?></center></td>
</tr>
<?php
  	    	}		
}
?>

          	</tbody>
    	  </table>             
        	    
	</div>
	</div>
	<div>
	</div>
	</div>
	</div>
 
  </body>
	</html>

