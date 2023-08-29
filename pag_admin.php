<html>
<?php

 include('conexion.php');

$usu 		= $_GET["user"];
$nombre 	= $_GET["nombre"];
$apellido 	= $_GET["apellido"];
$rol 	= $_GET["rol"];
//echo "Rol: ".$rol;
?>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
     <title>Control</title>
     <link rel="stylesheet" href="css/estilos.css">	
</head>
<body>

<tr>
<th colspan="1"><h1>Bienvenido</h1> <?php echo $nombre . " ". $apellido ?></th>
<th><a href="index.html"><P>Regresar</P></a></th>

</tr>
	  <table width="200" border="0">
      <tr>
      	<?php if ($rol == "Administrador") {  ?>
	      <td><strong>Usuarios</strong></td>
          <?php }  ?>
	      <td><strong>Linea de Trabajo</strong></td>
	      <td><strong>Productos</strong></td>
          <?php if ($rol == "Administrador") {  ?>
	      <td><strong>Consultas</strong></td>
          <?php } ?>
        </tr>
	    <tr>
        <?php if ($rol == "Administrador") {  ?>
	      <td> <img src="imagenes/man.jpg" width="100" height="100" alt="man"></td>
          <?php }  ?>
	      <td><img src="imagenes/linea_trabajo.jpeg" width="100" height="100" alt="linea_trabajo"></td>
	      <td><img src="imagenes/producto.jpeg" width="100" height="100" alt="producto"></td>
          <?php if ($rol == "Administrador") {  ?>
	      <td><img src="imagenes/grafico.png" width="100" height="100" alt="grafico"></td>
          <?php }  ?>
	      </tr>
	    <tr>
        <?php if ($rol == "Administrador") {  ?>
	      <td><a href="mantenimiento_usuario.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Ingreso</a></td>
          <?php }  ?>
	      <td><a href="linea.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Linea</a></td>
	      <td><a href="producto.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Producto</a></td>
          <?php if ($rol == "Administrador") {  ?>
	      <td><a href="consultaLO.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">&Oacute;rdenes</a></td>
          <?php }  ?>
	      </tr>
	    <tr>
        <?php if ($rol == "Administrador") {  ?>
	      <td><a href="consultaU.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Consulta</a></td>
          <?php }  ?>
	      <td><a href="consultaL.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Consulta</a></td>
	      <td><a href="consultaP.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Consulta</a></td>
          <?php if ($rol == "Administrador") {  ?>
	      <td><a href="consultaLOH.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Historial</a></td>
          <?php }  ?>
	      </tr>
	    <tr>
        <?php if ($rol == "Administrador") {  ?>
	      <td><a href="consultaU.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Modificar</a></td>
          <?php }  ?>
	      <td><a href="consultaL.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Check List</a></td>
	      <td><a href="consultaP.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Modificar</a></td>
	      <td><!-- Linea --></td>
	      </tr>
	    <tr>
        <?php if ($rol == "Administrador") {  ?>
	      <td><a href="consultaU.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Eliminar</a></td>
          <?php } ?>
	      <td><a href="consultaL.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Eliminar</a></td>
	      <td><a href="consultaP.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">Eliminar</a></td>
	      <td><!--Patel--></td>
	      </tr>
  </table>
</div>
</header>    


</body>
</html>

