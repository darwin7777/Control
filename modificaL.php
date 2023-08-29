<html>

<?php

include('conexion.php'); 

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];
$id	= $_GET["id"];
$rol	= $_GET["rol"];

$sql = "SELECT producto, cantidad_final, cantidad_estimada, empresa, horas   FROM linea_trabajo where estado = 'A' and id = '".$id."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$producto = $row["producto"];
	$cantidad_final = $row["cantidad_final"];
	$cantidad_estimada = $row["cantidad_estimada"];
	$empresa = $row["empresa"];
	$horas = $row["horas"];
 }
}
?>

   <head>
      <title>Ingreso_de_Usuario</title>
      <meta charset="utf-8">         
      <link rel="stylesheet" href="css/estilos.css">
      <script src="js/modernizr-2.6.2.min.js"></script>
    <script language="javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
	<script type="text/javascript">
	function graba()
	{
		//alert("Hola");
		var user = '<?php echo $usu; ?>';
		var name = '<?php echo $nombre; ?>';
		var lastname = '<?php echo $apellido; ?>';
		var id  = '<?php echo $id; ?>';
		var rola = '<?php echo $rol; ?>';
		var cantidad = document.getElementById('txtcantidade').value;
		
		if (cantidad != "")
		{
			//alert('hola');
		var data = new FormData(); 
				data.append('usu', user);
				data.append('id', id);
				data.append('cantidad', cantidad);
				var url = "actualizaL.php";
				//alert(clave);
				$.ajax({
					url: url,
					type: 'POST',
					contentType: false,
					data: data,
					processData: false,
					cache: false
				}).done(function(data){
					if(data.ok){
						alert("Datos actualizados con exito");
						//setTimeout("gracias()", 2000);
						setTimeout( function sig() { window.location.href = "pag_admin.php?nombre="+name+"&user=" +user+"&apellido="+lastname+"&rol="+rola; }, 10 );

						
					}else {
						alert(data.error);
					}
				});	
		}
		else
		{
			alert("Debe ingresar nuevo usuario");	
			//document.getElementById("save").disabled = false;
		}
	} 	
	
	function elimina()
	{
		//alert("Hola");
		var user = '<?php echo $usu; ?>';
		var name = '<?php echo $nombre; ?>';
		var lastname = '<?php echo $apellido; ?>';
		var id  = '<?php echo $id; ?>';
		var rola = '<?php echo $rol; ?>';
		var cantidad = document.getElementById('txtcantidade').value;
		
		if (cantidad != "")
		{
			//alert('hola');
		var data = new FormData(); 
				data.append('usu', user);
				data.append('id', id);
				data.append('cantidad', cantidad);
				var url = "eliminaL.php";
				//alert(clave);
				$.ajax({
					url: url,
					type: 'POST',
					contentType: false,
					data: data,
					processData: false,
					cache: false
				}).done(function(data){
					if(data.ok){
						alert("Datos actualizados con exito");
						//setTimeout("gracias()", 2000);
						setTimeout( function sig() { window.location.href = "pag_admin.php?nombre="+name+"&user=" +user+"&apellido="+lastname+"&rol="+rola; }, 10 );

						
					}else {
						alert(data.error);
					}
				});	
		}
		else
		{
			alert("Debe ingresar nuevo usuario");	
			//document.getElementById("save").disabled = false;
		}
	} 	
	</script>
	
   </head>
   
<body>
<h2>Chek List Linea de Trabajo</h2>
<p align="right"><a href="pag_admin.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">
    <button style="background:#12192a; color:#FFF">Men&uacute;</button>
  </a></p>
<div class="ub1">&#128273; Producto</div>
<input type="text" name="txtusuario" id="txtusuario" placeholder="Producto"required value="<?php echo $producto ?>" readonly>
<div class="ub1">&#128274; Cantidad Final</div>
<input type="text" name="txtcantidadf" id="txtcantidadf" placeholder="Cantidad Final"required value="<?php echo $cantidad_final ?>" readonly>
<div class="ub1">&#128273; Modificar Cantidad Estimada</div>
<input type="text" name="txtcantidade" id="txtcantidade" placeholder="Cantidad Estimada"required value="<?php echo $cantidad_estimada ?>">
<div class="ub1">&#128273; Tempo Estimado (horas)</div>
<input type="text" name="txthoras" id="txthoras" placeholder="Horas Estimadas"required readonly value="<?php echo $horas ?>">
<div class="ub1">&#128273; Empresa</div>
<input type="text" name="txtempresa" id="txtempresa" placeholder="Empresa"required value="<?php echo $empresa ?>" readonly>

<div id="guardar"></div>
<input type="submit" value="Eliminar" onClick="elimina()">
<input type="submit" value="Modificar" onClick="graba()">
</body>
</html>

