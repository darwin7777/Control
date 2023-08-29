<html>

<?php

include('conexion.php'); 

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];
$rol 	= $_GET["rol"];

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
		var usuario = document.getElementById('txtusuario').value;
		var clave = document.getElementById('txtpassword').value;
		var nombre = document.getElementById('txtnombre').value;
		var apellido = document.getElementById('txtapellido').value;
		var email = document.getElementById('txtemail').value;
		var rol = document.getElementById('txtrol').value;
		
		if (usuario != "" && clave != "" && nombre != "" && apellido != "" && email != "" && rol != "")
		{
			//alert('hola');
		var data = new FormData(); 
				data.append('usu', user);
				data.append('usuario', usuario);
				data.append('clave', clave);
				data.append('nombre', nombre);
				data.append('apellido', apellido);
				data.append('email', email);
				data.append('rol', rol);
				var url = "ingresaU.php";
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
    <button style="background:#12192a; color:#FFF">Men&uacute;</button>
  </a></p>
<div class="ub1">&#128273; Ingrese usuario</div>
<input type="text" name="txtusuario" id="txtusuario" placeholder="Usuario"required>
<div class="ub1">&#128274; Ingrese clave</div>
<input type="password" name="txtpassword" id="txtpassword" placeholder="Clave"required>
<div class="ub1">&#128273; Ingrese nombre</div>
<input type="text" name="txtnombre" id="txtnombre" placeholder="Nombre"required>
<div class="ub1">&#128273; Ingrese apellido</div>
<input type="text" name="txtapellido" id="txtapellido" placeholder="Apellido"required>
<div class="ub1">&#128250; Ingrese email</div>
<input type="text" name="txtemail" id="txtemail" placeholder="Correo_Electronico"required>
<div class="ub1">&#128273; Ingrese rol</div>
<input type="text" name="txtrol" id="txtrol" placeholder="Rol"required>


<div id="guardar"></div>
<input type="submit" value="Guardar" onClick="graba()">

</body>
</html>

