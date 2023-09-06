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
$paginaActual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
$offset = ($paginaActual - 1) * $registrosPorPagina;

// Consulta SQL con paginación
$consulta = "SELECT t.id, t.producto, t.cantidad_final, l.cantidad, TIME(l.hora) hora FROM liquidacion l INNER JOIN linea_trabajo t ON l.id_linea_trabajo = t.id WHERE t.id = $id LIMIT $offset, $registrosPorPagina";
$resultado = $conn->query($consulta);

// Total de registros para la paginación
$totalRegistros = $conn->query("SELECT COUNT(*) as total FROM liquidacion l INNER JOIN linea_trabajo t ON l.id_linea_trabajo = t.id WHERE t.id = $id")->fetch_assoc()['total'];
$totalPaginas = ceil($totalRegistros / $registrosPorPagina);

$sql = "SELECT l.cantidad, CAST(CONCAT(SUBSTRING(TIME(l.hora), 1, 2), SUBSTRING('10:0', 1, 0)) AS INT) AS hora FROM liquidacion l INNER JOIN linea_trabajo t ON l.id_linea_trabajo = t.id WHERE t.id = $id";
$query = $conn->query($sql);
$data = array();
while ($r = $query->fetch_object()) {
    $data[] = $r;
}
?>
<head>
    <title>Consulta de Usuario</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estilos.css">
    <script src="assets/script/chart.min.js"></script>
    <script type="text/javascript" src="assets/script/modernizr-2.6.2.min.js"></script>
    <script language="javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script type="text/javascript">
        /* Gráfica de producción 
        window.onload = function () {
            var dataLength = 0;
            var data = [];
            $.getJSON("data.php?id=<?php echo $id; ?>", function (result) {
                dataLength = result.length;
                for (var i = 0; i < dataLength; i++) {
                    data.push({
                        x: parseInt(result[i].valorx),
                        y: parseInt(result[i].valory)
                    });
                }
                var chart = new CanvasJS.Chart("chart", {
                    title: {
                        text: "Cantidad x horas trabajadas"
                    },
                    axisX: {
                        title: "Cantidad",
                    },
                    axisY: {
                        title: "Horas",
                    },
                    data: [{
                        type: "line",
                        dataPoints: data
                    }],
                });
                chart.render();
            });
        }*/
    </script>
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
            background-color: #12192a;
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
        <tr bgcolor="#29DFB9 ">
            <td width="28%">
                <div align="center" id="white">
                    <h5 align="justify"><strong>Producto</strong></h5>
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
            <td width="25%">
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
                    <td>
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
        if ($paginaActual > 1) {
            echo "<a href='consultaO.php?user=$usu&nombre=$nombre&apellido=$apellido&rol=$rol&id=$id&pagina=" . ($paginaActual - 1) . "'>Anterior</a>";
        }

        for ($i = 1; $i <= $totalPaginas; $i++) {
            if ($i == $paginaActual) {
                echo "<span class='pagina-actual'>$i</span>";
            } else {
            echo "<a href='consultaO.php?user=$usu&nombre=$nombre&apellido=$apellido&rol=$rol&id=$id&pagina=$i'>$i</a>";
            }
        }

        if ($paginaActual < $totalPaginas) {
            echo "<a href='consultaO.php?user=$usu&nombre=$nombre&apellido=$apellido&rol=$rol&id=$id&pagina=" . ($paginaActual + 1) . "'>Siguiente</a>";
        }
        ?>
    </div>



    <p><strong>Gr&aacute;fica de Producci&oacute;n de: <?php echo $producto ?> </strong></p>
    <div style="background:#FFF">
        <canvas id="chart1" style="width:100%;" height="100"></canvas>
    </div>
    <script>
        var ctx = document.getElementById("chart1");
        var data = {
            labels: [
                <?php foreach ($data as $d) : ?>
                    "<?php echo $d->cantidad; ?>",
                <?php endforeach; ?>
            ],
            datasets: [{
                label: '<?php echo $producto ?>',
                data: [
                    <?php foreach ($data as $d) : ?>
                        <?php echo  $d->hora; ?>,
                    <?php endforeach; ?>
                ],
                // backgroundColor: "#3898db",
                borderColor: "#29DFB9 ",
                borderWidth: 2
            }]
        };
        var options = {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        };
        var chart1 = new Chart(ctx, {
            type: 'bar', /* valores: line, bar*/
            data: data,
            options: options
        });
    </script>

</body>
</html>
