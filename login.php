<?php

include('conexion.php');

$usu 	= $_POST["txtusuario"];
$pass 	= $_POST["txtpassword"];



$sql = "SELECT nombre, apellido, rol FROM usuario where usuario ='$usu' and pass = '$pass' and estado = 'A'";
$result = $conn->query($sql);


if($result->num_rows > 0) {
  while($row = $result->fetch_assoc())
  { 
  $nombre = $row['nombre'];
  $apellido = $row['apellido'];
  $rol =$row['rol'];
  } 
  //echo "Hola: ".$rol;
  if($rol=="Usuario")
			{	
				header("Location: pag_admin.php?user=".$usu."&nombre=".$nombre."&apellido=".$apellido."&rol=".$rol."");
			}
		else if ($rol=="Administrador")
			{
				header("Location: pag_admin.php?user=".$usu."&nombre=".$nombre."&apellido=".$apellido."&rol=".$rol."");
			}
  } else
	{
	echo "<script> alert('Usuario, contraseña o rol incorrecto.');window.location= 'index.html' </script>";
    
	}	
?>

