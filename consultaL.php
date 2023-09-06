<html>
<?php
include('conexion.php');

$usu = $_GET["user"];
$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$rol = $_GET["rol"];

// Paginación
$registrosPorPagina = 10; // Cambia el número de registros por página a 5
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($paginaActual - 1) * $registrosPorPagina;

// Consulta SQL con paginación
$consulta = "SELECT id, producto, cantidad_final, cantidad_estimada, empresa FROM linea_trabajo WHERE estado = 'A' LIMIT $offset, $registrosPorPagina";
$resultado = $conn->query($consulta);

// Total de registros para la paginación
$totalRegistros = $conn->query("SELECT COUNT(*) as total FROM linea_trabajo WHERE estado = 'A'")->fetch_assoc()['total'];
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);
?>
<head>
    <title>Consulta de Usuario</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css">
    <style type="text/css">
        #white {
            color: #FFF;
        }

        .tcentrado {
            height: 90PX;
            width: 90PX;
            text-align: center;
            border: 1px solid silver;
            display: table-cell;
            vertical-align: middle;
        }

        #contenedor {
            width: 900px;
            margin: 0 auto;
        }
        /* Estilo para la paginación */
        .paginacion {
            margin-top: 20px;
            text-align: center;
        }

        .paginacion a,
        .paginacion span {
            display: inline-block;
            padding: 5px 10px;
            margin: 0 5px;
            border: 1px solid #12192a;
            background-color: #29DFB9;
            color: #fff;
            text-decoration: none;
        }

        .paginacion .pagina-actual {
            background-color: #fff;
            color: #12192a;
        }
    </style>
</head>

<body>

    <h3><strong>Consulta de Lineas de Trabajo</strong></h3>
    <p align="right"><a href="pag_admin.php?user=<?php echo $usu ?>&nombre=<?php echo $nombre ?>&apellido=<?php echo $apellido ?>&rol=<?php echo $rol ?>">
            <button style="background:#29DFB9; color:#FFF">Men&uacute;</button>
        </a></p>
    <table width="100%" border="0">
        <tr bgcolor="#29DFB9">
            <td width="13%">
                <div align="center" id="white">
                    <h5><strong>Código</strong></h5>
                </div>
            </td>
            <td width="34%">
                <div align="center" id="white">
                    <h5><strong>Producto</strong></h5>
                </div>
            </td>
            <td width="15%">
                <div align="center" id="white">
                    <h5><strong>Cantidad</strong></h5>
                </div>
            </td>
            <td width="13%">
                <div align="center" id="white">
                    <h5><strong>Estimado x hora</strong></h5>
                </div>
            </td>
            <td width="14%">
                <div align="center" id="white">
                    <h5><strong>Empresa</strong></h5>
                </div>
            </td>
            <td width="11%">
                <div align="center"></div>
            </td>
        </tr>
        <?php
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
        ?>
                <tr>
                    <td height="43">
                        <div align="center">
                            <h5><?php echo $row['id']; ?></h5>
                        </div>
                    </td>
                    <td height="43">
                        <div align="center">
                            <h5><?php echo $row['producto']; ?></h5>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            <h5><?php echo $row['cantidad_final']; ?></h5>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            <h5><?php echo $row['cantidad_estimada']; ?></h5>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            <h5><?php echo $row['empresa']; ?></h5>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            <input type="button" name="edit" id="edit" value="Editar" style='width:120px; height:30px; background-color:#29DFB9; color:#FFF; font-size:16px; font-family:Arial, Helvetica, sans-serif; font-weight:bold; text-align:center' onClick="location.href='modificaL.php?nombre=<?php echo $nombre?>&user=<?php echo $usu; ?>&apellido=<?php echo $apellido; ?>&id=<?php echo $row['id'] ?>&rol=<?php echo $rol ?>'">
                        </div>
                    </td>
                </tr>
        <?php
            }
        }
        ?>
    </table>

    <!-- Paginación -->
    <div class="paginacion">
        <?php
        if ($paginaActual > 1) {
            echo "<a href='consultaL.php?user=$usu&nombre=$nombre&apellido=$apellido&rol=$rol&pagina=" . ($paginaActual - 1) . "'>Anterior</a>";
        }

        for ($i = 1; $i <= $totalPaginas; $i++) {
            if ($i == $paginaActual) {
                echo "<span class='pagina-actual'>$i</span>";
            } else {
                echo "<a href='consultaL.php?user=$usu&nombre=$nombre&apellido=$apellido&rol=$rol&pagina=$i'>$i</a>";
            }
        }

        if ($paginaActual < $totalPaginas) {
            echo "<a href='consultaL.php?user=$usu&nombre=$nombre&apellido=$apellido&rol=$rol&pagina=" . ($paginaActual + 1) . "'>Siguiente</a>";
        }
        ?>
    </div>

    <h2>&nbsp;</h2>
</body>

</html>
