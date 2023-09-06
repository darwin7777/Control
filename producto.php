<html>

<?php

include('conexion.php'); 

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];
$rol 	= $_GET["rol"];

?>

   <head>
      <title>Ingreso de Producto</title>
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
		var producto = document.getElementById('txtproducto').value;
		var cantidad = document.getElementById('txtcantidad').value;
		var valor = document.getElementById('txtvalor').value;
		
		if (producto != "" && cantidad != "" && valor != "")
		{
			//alert('hola');
		var data = new FormData(); 
				data.append('usu', user);
				data.append('producto', producto);
				data.append('cantidad', cantidad);
				data.append('valor', valor);
				var url = "ingresaP.php";
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
	</script>
	
   </head>
   
<body>
<h2>Ingreso de usuario</h2>
<p align="right"><a href="pag_admin.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">
    <button style="background:#29DFB9 ; color:#FFF">Men&uacute;</button>
  </a></p>
<div class="ub1">&#128273; Ingrese Producto</div>
<input type="text" name="txtproducto" id="txtproducto" placeholder="Producto"required>
<div class="ub1">&#128274; Ingrese Cantidad</div>
<input type="text" name="txtcantidad" id="txtcantidad" placeholder="Cantidad"required>
<div class="ub1">&#128273; Ingrese Valor</div>
<input type="text" name="txtvalor" id="txtvalor" placeholder="Nombre"required>

<div id="guardar"></div>
<input type="submit" value="Guardar" onClick="graba()">

</body>
</html>

