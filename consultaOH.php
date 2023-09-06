<html>
<?php
include('conexion.php'); 

$usu = $_GET["user"];
$nombre = $_GET["nombre"];
$apellido = $_GET["apellido"];
$id = $_GET["id"];
$rol = $_GET["rol"];

// Paginación
$registrosPorPagina = 10;
$paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
$offset = ($paginaActual - 1) * $registrosPorPagina;

// Consulta SQL con paginación
$consulta = "SELECT t.id, t.producto, t.cantidad_final, l.cantidad, TIME(l.hora) hora FROM liquidacion l INNER JOIN linea_trabajo t ON l.id_linea_trabajo = t.id WHERE t.id = $id LIMIT $offset, $registrosPorPagina";
$resultado = $conn->query($consulta);

// Total de registros para la paginación
$totalRegistros = $conn->query("SELECT COUNT(*) as total FROM liquidacion WHERE id_linea_trabajo = $id")->fetch_assoc()['total'];
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);
?>
<head>
    <title>Consulta de Lineas de Trabajo</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="js/modernizr-2.6.2.min.js"></script>
    <script language="javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="assets/script/canvasjs.min.js"></script>
    <script type="text/javascript" src="assets/script/jquery-2.2.3.min.js"></script>
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
        <button style="background:#29DFB9; color:#FFF">Menú</button>
    </a></p>
    <table width="100%" border="0">
        <tr bgcolor="#29DFB9 ">
            <td width="34%">
                <div align="center" id="white">
                    <h5><strong>Producto</strong></h5>
                </div>
            </td>
            <td width="26%">
                <div align="center" id="white">
                    <h5><strong>Cantidad Final</strong></h5>
                </div>
            </td>
            <td width="21%">
                <div align="center" id="white">
                    <h5><strong>Cantidad Estimada</strong></h5>
                </div>
            </td>
            <td width="19%">
                <div align="center" id="white">
                    <h5><strong>Hora</strong></h5>
                </div>
            </td>
        </tr>
        <?php
        if ($resultado->num_rows > 0) {
            while ($row = $resultado->fetch_assoc()) {
                $producto = $row['producto'];
        ?>
                <tr>
                    <td height="43">
                        <div align="center">
                            <h5><?php echo $row['producto']; ?></h5>
                        </div>
                    </td>
                    <td height="43">
                        <div align="center">
                            <h5><?php echo $row['cantidad_final']; ?></h5>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            <h5><?php echo $row['cantidad']; ?></h5>
                        </div>
                    </td>
                    <td>
                        <div align="center">
                            <h5><?php echo $row['hora']; ?></h5>
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
        for ($i = 1; $i <= $totalPaginas; $i++) {
            if ($i == $paginaActual) {
                echo "<span class='pagina-actual'>$i</span>";
            } else {
                echo "<a href='tu_pagina.php?user=$usu&nombre=$nombre&apellido=$apellido&id=$id&rol=$rol&pagina=$i'>$i</a>";
            }
        }
        ?>
    </div>
    <h2>&nbsp;</h2>
</body>
</html>
