<html>

<?php

include('conexion.php'); 

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];

?>

   <head>
      <title>linea_trabajo</title>
      <meta charset="utf-8">         
      <link rel="stylesheet" href="estilos.css">
      <script src="js/modernizr-2.6.2.min.js"></script>
    <script language="javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
	<script type="text/javascript">
	function graba()
	{
		//alert("Hola");
		var user = '<?php echo $usu; ?>';
		var lider = document.getElementById('txtnombre').value;
		var codigo_lider = document.getElementById('txtpassword').value;
		
		if (usuario != "" && clave != "" && nombre != "")
		{
			//alert('hola');
		var data = new FormData(); 
				data.append('usu', user);
				data.append('nombre', lider);				
				data.append('clave', codigo_lider);

				var url = "insert1.php";
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
						setTimeout( function sig() { window.location.href = "linea_trabajo.php?nombre="+lider+"clave=" +codigo_lider; }, 10 );

						
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
<h2>Lider de Linea</h2> 
<div class="ub1">&#128273; Ingrese lider</div>
<input type="text" name="txtnombre" id="txtlider" placeholder="Lider"required>
<div class="ub1">&#128274; Ingrese clave</div>
<input type="password" name="txtpassword" id="txtpassword" placeholder="Clave"required>


<div id="guardar"></div>
<input type="submit" value="Guardar" onClick="graba()">

</body>
</html>

