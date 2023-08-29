<html>
<?php

 include('conexion.php');

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];

?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Control</title>
     <link rel="stylesheet" href="css/estilos.css">	
</head>
<body>
<table>
<th colspan="2">Bienvenido <?php echo $nombre . " ". $apellido ?></th><th><a href="login.html">Regresar</a></th>
<tr><th colspan="3"><h1>Listado de usuarios</h1></th></tr>
<tr>
<th>Usuario</th>
<th>Contraseña</th>
<th>Rol</th>

</tr>

<?php

 include('conexion.php');

$sql="select * from login";
$resultado=mysqli_query($conn,$sql);

while($mostrar=mysqli_fetch_array($resultado))

{
?>

<tr>
	<td><?php echo $mostrar['usuario'] ?></td>
	<td><?php echo $mostrar['pass'] ?></td>
	<td><?php echo $mostrar['rol'] ?></td>
</tr>

<?php
}
?>

</table>

</body>
</html>




