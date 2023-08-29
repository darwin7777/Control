<html>

<?php

include('conexion.php'); 

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];
$id			= $_GET["id"];
$rol			= $_GET["rol"];

$sql = "SELECT id, nombre_producto nombre, cantidad, valor   FROM producto WHERE id = '".$id."'";
//echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$ids = $row["id"];
	$name = $row["nombre"];
	$cantidad = $row["cantidad"];
	$valor = $row["valor"];
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
		var rola = '<?php echo $rol; ?>';
		var id = document.getElementById('txtid').value;
		var producto = document.getElementById('txtnombre').value;
		var cantidad = document.getElementById('txtcantidad').value;
		var valor = document.getElementById('txtprecio').value;
		
		if (producto != "" && cantidad != "" && valor != "")
		{
			//alert('hola');
		var data = new FormData(); 
				data.append('usu', user);
				data.append('id', id);
				data.append('producto', producto);
				data.append('cantidad', cantidad);
				data.append('valor', valor);
				var url = "actualizaP.php";
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
						alert("Datos ingresados con exito");
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
		var rola = '<?php echo $rol; ?>';
		var id = document.getElementById('txtid').value;
		var producto = document.getElementById('txtnombre').value;
		var cantidad = document.getElementById('txtcantidad').value;
		var valor = document.getElementById('txtprecio').value;
		
		if (producto != "" && cantidad != "" && valor != "")
		{
			//alert('hola');
		var data = new FormData(); 
				data.append('usu', user);
				data.append('id', id);
				data.append('producto', producto);
				data.append('cantidad', cantidad);
				data.append('valor', valor);
				var url = "eliminaP.php";
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
						alert("Datos eliminado con exito");
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
<h2>Modificaci&oacute;n de Producto</h2>
<p align="right"><a href="pag_admin.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">
    <button style="background:#12192a; color:#FFF">Men&uacute;</button>
  </a></p>
  <div class="ub1">&#128273; C&oacute;digo</div>
<input type="text" name="txtid" id="txtid" placeholder="Codigo"required value="<?php echo $ids ?>" readonly>
<div class="ub1">&#128273; Modificar Nombre</div>
<input type="text" name="txtnombre" id="txtnombre" placeholder="Nombre"required value="<?php echo $name ?>" readonly>
<div class="ub1">&#128274; Modificar Cantidad</div>
<input type="text" name="txtcantidad" id="txtcantidad" placeholder="Cantidad"required value="<?php echo $cantidad ?>">
<div class="ub1">&#128273; Modificar Precio</div>
<input type="text" name="txtprecio" id="txtprecio" placeholder="Precio"required value="<?php echo $valor ?>">


<div id="guardar"></div>
<input type="submit" value="Eliminar" onClick="elimina()">
<input type="submit" value="Modificar" onClick="graba()">
</body>
</html>

