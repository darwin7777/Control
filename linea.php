<html>

<?php

include('conexion.php'); 

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];
$rol 	= $_GET["rol"];

?>

   <head>
      <title>Ingreso de Linea de Trabajo</title>
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
		var prod = document.getElementById('prod').value;
		var cantR = document.getElementById('txtcantidadR').value;
		var cantE = document.getElementById('txtcantidad').value;
		var horas = document.getElementById('txthoras').value;
		var empresa = document.getElementById('empresa').value;
		
		if (prod != "" && cantR != "" && cantE != "" && horas != "" && empresa != "")
		{
			//alert('hola');
		var data = new FormData(); 
				data.append('usu', user);
				data.append('prod', prod);
				data.append('cantR', cantR);
				data.append('cantE', cantE);
				data.append('horas', horas);
				data.append('empresa', empresa);
				var url = "ingresaL.php";
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
	
	function cantidad()
	{
		//alert("Hola");
		var user = '<?php echo $usu; ?>';
		var id = document.getElementById('prod').value;
			//alert(id);
		var data = new FormData(); 
				data.append('id', id);
				var url = "conP.php";
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
						//setTimeout( function sig() { window.location.href = "pag_admin.php?nombre="+nombre+"&user=" +user+"&apellido="+apellido; }, 10 );
						
						document.getElementById('txtcantidadR').value = data.cantidad;
						
					}else {
						alert("No hay cantidad para este producto");
						alert(data.error);
					}
				});	
	} 
	</script>
	
   </head>
   
<body>
<h2>Ingreso de L&iacute;nea de Trabajo</h2>
<p align="right"><a href="pag_admin.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">
    <button style="background:#12192a; color:#FFF">Men&uacute;</button>
  </a></p>
<div class="ub1">&#128273; Ingrese Producto</div>
<select name="prod" id="prod" style='width:320px; height:40px; background:#CCE5FF; font-size:14px; font-style:inherit' onChange="cantidad()" placeholder="Producto"required>
         <?php
          $query = "Select id, nombre_producto nombre, cantidad, valor from producto where estado = 'A'";
		  $result = $conn->query($query);
          while ($row = $result->fetch_assoc()) {
            echo '<option value="'.$row['id'].'">'.$row['nombre'].'</option>';
          }
        ?>
      </select>
<div class="ub1">&#128274; Ingrese Cantidad Real</div>
<input type="text" name="txtcantidadR" id="txtcantidadR" placeholder="Cantidad Real"required>
<div class="ub1">&#128273; Ingrese Cantidad Producida</div>
<input type="text" name="txtcantidad" id="txtcantidad" placeholder="Cantidad Producida"required value="0">
<div class="ub1">&#128273; Tempo Estimado (horas)</div>
<input type="text" name="txthoras" id="txthoras" placeholder="Horas Estimadas"required>
<div class="ub1">&#128250; Empresa</div>
  <label for="empresa"></label>
  <select name="empresa" id="empresa">
    <option value="Agripac">Agripac</option>
    <option value="Agrofarm">Agrofarm</option>
    <option value="Yara">Yara</option>
    <option value="Laquinsa">Laquinsa</option>
    <option value="Adama">Adama</option>
    <option value="FMC">FMC</option>
  </select>
<div id="guardar"></div>
<input type="submit" value="Guardar" onClick="graba()">

</body>
</html>

