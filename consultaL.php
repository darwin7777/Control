<html>

<?php

include('conexion.php'); 

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];
$rol 	= $_GET["rol"];

?>

   <head>
      <title>Consulta de Usuario</title>
      <meta charset="utf-8">         
      <link rel="stylesheet" href="css/estilos.css">
      <script src="js/modernizr-2.6.2.min.js"></script>
    <script language="javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script> 
	<script type="text/javascript">
	function graba()
	{
		//alert("Hola");
		var user = '<?php echo $usu; ?>';
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
						setTimeout( function sig() { window.location.href = "pag_admin.php?nombre="+nombre+"&user=" +user+"&apellido="+apellido; }, 10 );

						
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
	function volver()
	{
		window.location.href = "pag_admin.php?nombre="+nombre+"&user=" +user+"&apellido="+apellido;	
	}
	</script>
	
   <style type="text/css">
   #white {
	color: #FFF;
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
  <td width="13%"><div align="center" id="white">
      <h5><strong>Codigo</strong></h5>
    </div></td>
    <td width="34%"><div align="center" id="white">
      <h5><strong>Producto</strong></h5>
    </div></td>
    <td width="15%"><div align="center" id="white">
      <h5><strong>Cantidad</strong></h5>
    </div></td>
    <td width="13%"><div align="center" id="white">
      <h5><strong>Estimado x hora</strong></h5>
    </div></td>
    <td width="14%"><div align="center" id="white">
      <h5><strong>Empresa</strong></h5>
    </div></td>
    <td width="11%"><div align="center"></div></td>
  </tr>
  <?php
  	$consult = "Select id, producto, cantidad_final, cantidad_estimada, empresa from linea_trabajo where estado = 'A'  ";
	//$consult.= " WHERE estadi = '".$afiliado."' AND st_ctacob = 'P'";
//	echo $consult;
	$result = $conn->query($consult);
	 if ($result->num_rows > 0) {
		while($row = $result->fetch_assoc()) {
  ?>
  <tr>
  <td height="43"><div align="center">
      <h5><?php echo $row['id']; ?></h5>
    </div></td>
    <td height="43"><div align="center">
      <h5><?php echo $row['producto']; ?></h5>
    </div></td>
    <td><div align="center">
      <h5><?php echo $row['cantidad_final']; ?></h5>
    </div></td>
    <td><div align="center">
      <h5><?php echo $row['cantidad_estimada']; ?></h5>
    </div></td>
    <td><div align="center">
      <h5><?php echo $row['empresa']; ?></h5>
    </div></td>
    <td><div align="center">
      <input type="button" name="edit" id="edit" value="Editar" style='width:120px; height:30px; background-color:#12192a; color:#FFF; font-size:16px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; text-align:center' onClick="location.href='modificaL.php?nombre=<?php echo $nombre?>&user=<?php echo $usu; ?>&apellido=<?php echo $apellido; ?>&id=<?php echo $row['id'] ?>&rol=<?php echo $rol ?>'">
    </div></td>
  </tr>
  <?php
		}
	 }
  ?>
</table>
<h2>&nbsp;</h2>
</body>
</html>

