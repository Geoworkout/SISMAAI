<?php
        include "db.php";
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
              <!-- ALERTA LIBRERIA -->
           <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="Start your development with Ollie landing page.">
            <meta name="author" content="Devcrud">
            <title>SISMAAI</title>
            <!-- font icons -->
            <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
            <!-- owl carousel -->
            <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
            <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">
            <!-- AQUI................................................................ -->
            <!-- Bootstrap + Ollie main styles -->
                <link rel="stylesheet" href="assets/css/estilo.css">
                <link rel="stylesheet" href="estilo2.css">
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   		integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   		crossorigin=""/>
       
        </head>
        <body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
            <nav id="scrollspy" class="navbar navbar-light bg-light navbar-expand-lg fixed-top" data-spy="affix" data-offset-top="5">
                <div class="container">
                    <a class="navbar-brand" href="#"><img src="assets/imgs/flade_blanco.png" alt="" class="brand-img"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span> </button>
                    <div class="drop"></div>
         <div class="wave"></div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                        <li class="nav-item ml-0 ml-lg-4">
                        <a class="nav-link btn btn-primary" href="#home">Inicio</a>
                            </li>
                            <li class="nav-item ml-0 ml-lg-4">
                                <a class="nav-link btn btn-primary" href="#chart">Estadisticas</a>
                            </li>
                           
                            <li class="nav-item ml-0 ml-lg-4">
                                <a class="nav-link btn btn-primary" href="register.php">Registrarse</a>
                            </li>
                            <li class="nav-item ml-0 ml-lg-4">
                                <a class="nav-link btn btn-primary" href="login.php">iniciar sesión</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <header id="home" class="header">   
                <div class="overlay"></div>
                <div id="header-carousel" class="carousel slide carousel-fade" data-ride="carousel">  
                    <div class="container">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="carousel-caption d-none d-md-block">
                                    <center><img class="carousel-title" src="assets/imgs/flade_blanco.png" width="20%" height="20%"><br></center>
                                    <h1 class="carousel-title">Sistema de Monitoreo de Afluentes</br>y Alertas de Inundaciones</h1>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="carousel-caption d-none d-md-block">
                                <center><img class="carousel-title" src="assets/imgs/flade_blanco.png" width="20%" height="20%"><br></center>
                                <h1 class="carousel-title">Sistema de Monitoreo de Afluentes<br>y Alertas de Inundaciones</h1>
                                </div>
                            </div>
                        </div>
                    </div>          
                </div>  
                <canvas data-zr-dom-id="zr_0" width="100%" height="100%" style="position: absolute; left: 0px; top: 0px; user-select: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); padding: 0px; margin: 0px; border-width: 0px;"></canvas>
                <div class="infos container mb-4 mb-md-2">
                    <div class="title">
                        <h5>SISMAAI</h5>
                        <p class="font-small">Vigilando los ríos, protegiendo los municipios.<br>Tu fuente confiable para prevenir inundaciones </p>
                    </div>
                    <div class="socials text-right">
                        <div class="row justify-content-between">
                            <div class="col">
                                <a class="d-block subtitle"><i class="ti-microphone pr-2"></i> (783)150-7338</a>
                                <a href="mailto:alertasismaai@gmail.com" class="d-block subtitle"><i class="ti-email pr-2"></i> alertasismaai@gmail.com</a>
                            </div>
                            <div class="col">
                                <h6 class="subtitle font-weight-normal mb-2">redes sociales</h6>
                                <div class="social-links">
                                    <a href="https://www.facebook.com/profile.php?id=61561314343060" class="link pr-1"><i class="ti-facebook"></i></a>
                                    <a href="https://www.youtube.com/channel/UC3jlUvFGsJIbw4ohR8lRRiA" class="link pr-1"><i class="ti-youtube"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <br>
        <div id="containerPrincipal">
        <h4 style="text-align: center; font-family: 'Bahnschrift', sans-serif;">VISUALIZACIÓN DATOS EN TIEMPO REAL</h4>
        <a href="albergues.html" class="boton">buscar albergues</a>
            <input type="checkbox" id="darkModeSwitch" class="slider">
            <label for="darkModeSwitch">Modo Oscuro</label>
            <label for="darkModeSwitch" id="darkModeLabel"></label>

            <!-- css de la grafica de lineas -->
            <div id="chart" style="!important; height: 400px !important; margin: 0 auto !important;"></div>
    <div class="grafica" >
    <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.3/echarts.min.js"></script>
            <script>
        var chart = echarts.init(document.getElementById('chart'));

        var option = {
            tooltip: {
                trigger: 'axis',
                formatter: function(params) {
                    return params[0].name + '<br />' +
                        'Nivel (EM): ' + params[0].value + '<br />' +
                        'Temperatura: ' + params[1].value + '<br />' +
                        'Nivel (US): ' + params[2].value;
                }
            },
            legend: {
                data: ['Nivel (EM)', 'Temperatura', 'Nivel (US)'],
                textStyle: {
                    fontSize: 17,
                    color: '#8BADA8',
                },
                itemGap: 10,
            },
            grid: {
                left: '10%',
                right: '10%',
                bottom: '3%',
                containLabel: true
            },
            toolbox: {
                feature: {
                    saveAsImage: {
                        title: 'Guardar imagen',
                        pixelRatio: 4
                    }
                }
            },
            xAxis: {
                type: 'category',
                boundaryGap: false,
                data: <?php
                    $query = "SELECT CONCAT(fecha_lec_rio, ' ', hora_lec_rio) AS fecha_hora FROM lectura_rio 
                    ORDER BY Id_Lec_Rio DESC, hora_lec_rio ASC LIMIT 8";
                    $res = mysqli_query($conn, $query);
                    $data = array();
                    while ($row = mysqli_fetch_array($res)) {
                        $fechaHora = $row['fecha_hora'];
                        $data[] = "'$fechaHora'";
                    }
                    echo '[' . implode(', ', $data) . ']';
                ?>,
                axisLabel: {
                    fontSize: 15,
                    color: '#8BADA8',
                },
            },
            yAxis: {
                type: 'value',
                axisLabel: {
                    fontSize: 15,
                    color: '#8BADA8',
                },
                lineWidth: 2,
                axisLine: {
                    show: true,
                }
            },
            series: [
                {
                    name: 'Nivel (EM)',
                    type: 'line',
                    smooth: true, //forma circular a agua
                    stack: 'Total',
                    color:'#0770FF',
                    areaStyle: {
                color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{offset: 0, color: 'rgba(58,77,233,0.8)' },{offset: 1, color: 'rgba(58,77,233,0.3)'} ])
                    },
                    data: <?php
                        // Obtener los datos de nivel del río desde tu base de datos
                        $query = "SELECT nivel_lec_rio FROM lectura_rio ORDER BY Id_Lec_Rio DESC, hora_lec_rio DESC LIMIT 8";
                        $res = mysqli_query($conn, $query);
                        $data = array();
                        while ($row = mysqli_fetch_array($res)) {
                            $nivel = isset($row['nivel_lec_rio']) ? $row['nivel_lec_rio'] : 0;
                            $data[] = $nivel;
                        }
                        echo '[' . implode(', ', $data) . ']';
                    ?>,
                    axisLine: {
                    show: true,
                },
                lineStyle: {
                    width: 3,
                }
                },
                {
                    name: 'Temperatura',
                    type: 'line',
                    color: '#FC4747',
                    data: <?php
                        // Obtener los datos de temperatura desde tu base de datos
                        $query = "SELECT temperatura FROM lectura_ambiental ORDER BY fecha_lec_ambi DESC, hora_lec_ambi DESC LIMIT 8";
                        $res = mysqli_query($conn, $query);
                        $data = array();
                        while ($row = mysqli_fetch_array($res)) {
                            $temperatura = isset($row['temperatura']) ? $row['temperatura'] : 0;
                            $data[] = $temperatura;
                        }
                        echo '[' . implode(', ', $data) . ']';
                    ?>,
                    axisLine: {
                    show: true,
                },
                lineStyle: {
                    width: 3,
                }
                },
                {
                    name: 'Nivel (US)',
                    type: 'line',
                    color: '#46CB5E',
                    data: <?php
                        // Obtener los datos de ultrasonico desde tu base de datos
                        $query = "SELECT fecha_lec_rio, nivel_ul FROM lectura_rio ORDER BY fecha_lec_rio DESC, hora_lec_rio DESC LIMIT 8";
                        $res = mysqli_query($conn, $query);
                        $data = array();
                        while ($row = mysqli_fetch_array($res)) {
                            $nivel_ul = $row['nivel_ul'];
                            $data[] = $nivel_ul;
                        }
                        echo '[' . implode(', ', $data) . ']';
                    ?>,
                    axisLine: {
                        show: true,
                    },
                    lineStyle: {
                        width: 3,
                    }
                }] };
        chart.setOption(option);
        </script>
    </div>
    <div class="container2">
                 <!-- EMPIZA LA TABLA VINCULADA -->
    <div class="tabla"style=" height: 120px;   max-width: 50%;">
        <table id="table" style=" height 200px; width:50%; border: 2px solid black;">
            <thead>
                <tr>
                    <th>Fecha/Hora</th>
                    <th>Nivel (EM)</th>
                    <th>Temperatura</th>
                    <th>Nivel (US)</th>
                    <th>Lluvia</th>

                </tr>
            </thead>
            <tbody id="table-data">
            </tbody>
        </table>
        <button id="exportButton"  style=" ">Descargar historico</button>
    </div>
    <br><br><br>
    <div class="humedad" style="width: 50%;">
    <div id="myChart" style="width: 70%; height:350px !important;"></div>
    <script>
        var myChart = echarts.init(document.getElementById('myChart'));
        var option = {
            title: {
            text: 'Humedad relativa (%)',
            left: 'center',
            top: '5%',
            },
            tooltip: {
                trigger: 'axis',
            },
            toolbox: {
                feature: {
                    saveAsImage: {
                        title: 'Guardar imagen',
                        pixelRatio: 4
                    }
                }
            },
            xAxis: {
                type: 'category',
                data: <?php
                        $query = "SELECT CONCAT(fecha_lec_rio, ' ', hora_lec_rio) AS fecha_hora FROM lectura_rio ORDER BY Id_Lec_Rio DESC, hora_lec_rio ASC LIMIT 8";
                        $res = mysqli_query($conn, $query);
                        $data = array();
                        while ($row = mysqli_fetch_array($res)) {
                            $fechaHora = $row['fecha_hora'];
                            $data[] = "'$fechaHora'";
                        }
                        echo '[' . implode(', ', $data) . ']';
                    ?>,
            },
            yAxis: {
                type: 'value',
                lineWidth: 1,
                axisLine: {
                    show: true
                }
            },
            series: [
                {
                    color: '#5DDAF7',
                    areaStyle: {
                        color: new echarts.graphic.LinearGradient(0, 0, 0, 1, [{
                            offset: 0,
                            color: '#78CADD'
                        }, {
                            offset: 1,
                            color: '#33A6C1'
                        }])
                    },
                    data: <?php
                        // Obtener los datos de humedad desde tu base de datos
                        $query = "SELECT fecha_lec_ambi, humedad FROM lectura_ambiental ORDER BY fecha_lec_ambi DESC, hora_lec_ambi DESC LIMIT 8";
                        $res = mysqli_query($conn, $query);
                        $data = array();
                        while ($row = mysqli_fetch_array($res)) {
                            $humedad = $row['humedad'];
                            $data[] = $humedad;
                        }
                        echo '[' . implode(', ', $data) . ']';
                    ?>,
                    type: 'line',
                    smooth: true
                }
            ]
        };
        option && myChart.setOption(option);
    </script>
</div>

        <script>
            // Accede a los datos de la gráfica
            var chart = echarts.init(document.getElementById('chart'));
            var seriesData = chart.getOption().series;
            // Obtén los datos de la serie de "Nivel del Río"
            var riverData = seriesData[0].data;
            // Obtén los datos de la serie de "Temperatura"
            var temperatureData = seriesData[1].data;
            // Obtén los datos de la serie de "Humedad"
            var ultrasonicoData = seriesData[2].data;
            // Accede a los datos del eje X (fecha y hora)
            var xAxisData = chart.getOption().xAxis[0].data;
            // Accede al cuerpo de la tabla donde insertaremos los datos
            var tableBody = document.getElementById('table-data');
            // Accede a los datos del eje X (fecha y hora)
           var xAxisData = chart.getOption().xAxis[0].data;
          // Accede al cuerpo de la tabla donde insertaremos los datos
           var tableBody = document.getElementById('table-data');
          // Recorre los datos y crea las filas de la tabla
        for (var i = 0; i < xAxisData.length; i++) {
            var row = document.createElement('tr');
            var dateCell = document.createElement('td');
            dateCell.textContent = xAxisData[i];
            var riverCell = document.createElement('td');
            riverCell.textContent = riverData[i];
            var temperatureCell = document.createElement('td');
            temperatureCell.textContent = temperatureData[i];
            var ultrasonicoCell = document.createElement('td');
            ultrasonicoCell.textContent = ultrasonicoData[i];
            row.appendChild(dateCell);
            row.appendChild(riverCell);
            row.appendChild(temperatureCell);
            row.appendChild(ultrasonicoCell);
            tableBody.appendChild(row);
                }
            // Función para formatear la fecha como "dd/mm/yyyy hh:mm" (puedes ajustar el formato según tus necesidades)
            function formatDate() {
                var date = new Date();
                var day = date.getDate();
                var month = date.getMonth()+1;
                var year = date.getFullYear();
                var hours = date.getHours();
                var minutes = date.getMinutes();
        return day + '/' + month + '/' + year + ' ' + hours + ':' + minutes;
        }
            </script>
                </span>
        <script>       //--------------LOGICA PARA DESCARGAR HISTORICO---------------
        document.getElementById('exportButton').addEventListener('click', function() {
            var table = document.getElementById('table');
            var rows = table.getElementsByTagName('tr');
            var data = [];
            for (var i = 1; i < rows.length; i++) {
                var row = rows[i].getElementsByTagName('td');
                var rowData = [];
                for (var j = 0; j < row.length; j++) {
                    rowData.push(row[j].textContent);
                }   
                data.push(rowData.join(', '));
            }
            var csvContent = 'Fecha/Hora, Nivel del Rio, Temperatura, Nivel (US)\n' + data.join('\n');
            var blob = new Blob([csvContent], { type: 'text/csv' });
            var csvUrl = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = csvUrl;
            a.download = 'datos_historicos.csv';
            a.style.display = 'none';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(csvUrl);  
        });
    </script>
    <br>
    <br> <br> 
    <br>
    <br>
    <section id="container3">
        <h1 id="titulo2" style="max-height:190px;">Ubicación del Dispositivo y registro de lluvia</h1>
<br>
    <!-- EMPIEZA EL CODIGO DEL MAPA DE UBICACION DEL DISPOSITIVO -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>   	

    <select name="select-location" id="select-location" style=" margin-left: 100px; border:3px solid black; border-radius: 10px;  position: relative; top: -90px;">
        <option value="-1" >Seleccione un lugar:</option>
        <option value="20.928514, -97.681013">Alamo Temapache Rio pantepec</option>
        <option value="20.949392, -97.399477">Tuxpan de rodriguez cano Rio pantepec</option>
        <option value="20.543628, -97.474877">Poza rica cano Rio Cazones</option>
    </select>
    <br> <br>
    <div id="map" style="margin-left: 40px; height: 90vh; width:70vw; border: 2px solid black; border-radius: 10px; display: inline-block; max-width:400px; max-height:500px;  position: relative; top: -90px;"></div>
    <script>
        let map = L.map('map').setView([20.913806, -97.676117], 18);
        // Agregar tileLayer mapa base desde openstreetmap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
        document.getElementById('select-location').addEventListener('change', function (e) {
            let coords = e.target.value.split(",");
            map.flyTo(coords, 18);
        });
    </script>
    <div class="containerLLuvia" style="margin-left: 80px; height:500px; display: inline-block; width:50%; position: relative; top: -280px;">
          <!-- EMPIEZA LA GRAFICA DE REGISTRO DE LLUVIAS -->
         <div id="lluv" style="width: 90%; height: 300px;"></div>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        var chartDom = document.getElementById('lluv');
        var lluv = echarts.init(chartDom);
        var option;

        // Obtener los datos desde PHP
        let data = <?php
            $query = "SELECT UNIX_TIMESTAMP(fecha_lec_ambi) * 1000 AS fecha_ms, lluvia FROM lectura_ambiental ORDER BY Id_Lec_Ambi DESC LIMIT 8";
            $res = mysqli_query($conn, $query);
            $data = array();
            while ($row = mysqli_fetch_array($res)) {
                $fecha_ms = $row['fecha_ms']; // Fecha en milisegundos para el eje de tiempo
                $lluvia = (float)$row['lluvia']; // Datos de lluvia
                $data[] = "[$fecha_ms, $lluvia]";
            }
            echo '[' . implode(', ', $data) . '];';
        ?>;

        // Configuración de la gráfica
        option = {
            tooltip: {
                trigger: 'axis',
                position: function (pt) {
                    return [pt[0], '10%'];
                }
            },
            title: {
                left: 'center',
                text: 'Precipitación (Lluvia mm)'
            },
            toolbox: {
                feature: {
                    
                    saveAsImage: {}
                }
            },
            xAxis: {
                type: 'time',
                boundaryGap: false
            },
            yAxis: {
                type: 'value',
                boundaryGap: [0, '100%']
            },
            
            series: [
                {
                    name: 'Lluvia (mm)',
                    type: 'line',
                    smooth: true,
                    symbol: 'none',
                    areaStyle: {},
                    data: data // Los datos se pasan directamente
                }
            ]
        };

        // Renderizar la gráfica
        option && lluv.setOption(option);
    });
</script>


        <div class="lluvtab" style="position: relative; top:-65px;">
        <br>
        <h5 id="texto3" style="margin-bottom:30px; margin-top:30px; margin-left:60px;">Interpretación de las Mediciones de un Sensor de Lluvia</h5>
    <table id="tablaAgua" style="width:90%; height:200px; text-align:center; font-size:12px;">
        <tr>
            <th style="font-size: 20px;">Lluvia (en mm)</th>
            <th style="font-size: 20px;">Descripción</th>
        </tr>
        <tr>
            <td>0 mm</td>
            <td>Sin lluvia</td>
        </tr>
        <tr>
            <td>1-4 mm</td>
            <td>Lluvia ligera: Precipitación mínima, apenas perceptible.</td>
        </tr>
        <tr>
            <td>5-14 mm</td>
            <td>Lluvia moderada: Precipitación notable, pero no intensa.</td>
        </tr>
        <tr>
            <td>15-59 mm</td>
            <td>Lluvia intensa: Precipitación significativa, posiblemente causando inundaciones locales.</td>
        </tr>
        <tr>
            <td>60 mm o más</td>
            <td>Lluvia torrencial: Precipitación extrema, con alto riesgo de inundaciones, deslizamientos de tierra y daños significativos.</td>
        </tr>
    </table>
        </div>
    </div>
    </section>
  <!-- biblioteca SweetAlert2 en tu página -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
// Variable para controlar si se debe mostrar la alerta
var mostrarAlerta = true; //inicializada en true

function verificarNivelRio(nivelDelRio) {
    // Emitir alerta preventiva (verde) si el nivel está entre 15 y 16 metros
    if (nivelDelRio >= 15 && nivelDelRio < 17) {
        return {
            title: 'Alerta Preventiva',
            text: 'El nivel del río está entre 15 y 16 metros,Presione el botón "Buscar Albergues" para encontrar lugares seguros',
            icon: 'success', // Verde
            confirmButtonText: 'Entendido',
            showCancelButton: true,
            cancelButtonText: 'No volver a mostrar' //esta seccion esta en la pagina oficial de sweetalert...
        };
    }
    // Emitir alerta moderada (amarilla) si el nivel está entre 17 y 18 metros
    else if (nivelDelRio >= 17 && nivelDelRio < 19) {
        return {
            title: 'Alerta Moderada',
            text: 'Estar preparado: El nivel del río está entre 17 y 18 metros. Si es necesario, revise su plan de evacuación. Presione el botón "Buscar Albergues" para encontrar lugares seguros',
            icon: 'warning', // Amarillo
            confirmButtonText: 'Entendido',
            showCancelButton: true,
            cancelButtonText: 'No volver a mostrar'
        };
    }
    // Emitir alerta de alto riesgo (roja) si el nivel está entre 19 y 20 metros
    else if (nivelDelRio >= 19 && nivelDelRio <= 20) {
        return {
            title: 'Alerta de Alto Riesgo',
            text: 'Estar listo: El nivel del río está entre 19 y 20 metros. Considere tomar medidas de evacuación. Presione el botón "Buscar Albergues" para encontrar lugares seguros.',
            icon: 'error', // Rojo
            confirmButtonText: 'Entendido',
            showCancelButton: true,
            cancelButtonText: 'No volver a mostrar'
        };
    }
    // No hay alerta
    return null;
}

function emitirAlerta(nivelDelRio) {
    var configuracionAlerta = verificarNivelRio(nivelDelRio);

    if (configuracionAlerta && mostrarAlerta) {
        // Utilizar SweetAlert2 para mostrar la alerta con la configuración personalizada
        Swal.fire(configuracionAlerta).then((result) => {
            // Limpia la configuración después de mostrar la alerta
            configuracionAlerta = null;

            // Si se hace clic en "No volver a mostrar", actualiza la variable
            if (result.dismiss === Swal.DismissReason.cancel) {
                mostrarAlerta = false;
            }
        });
    }
}

function obtenerNivelRio() {
    // Realizar una petición AJAX para obtener el nivel del río
    $.ajax({
        type: 'GET',
        url: 'obtener_nivel_rio.php', // Reemplaza con la ruta correcta a tu script PHP
        dataType: 'json',
        success: function(response) {
            // Manejar la respuesta JSON y emitir la alerta
            emitirAlerta(response.nivelDelRio);
        },
        error: function(error) {
            console.error('Error al obtener el nivel del río:', error);
        }
    });
}
// Llamar a la función obtenerNivelRio cada 5 segundos (para pruebas, puedes ajustar esto)
setInterval(obtenerNivelRio, 4000);
</script>
    <!-- Script para mostrar las alertas de lluvia y del nivel del río -->
<script>
    // Variables para controlar si se debe mostrar cada alerta
    var mostrarAlertaNivelRio = true; // Inicializada en true
    var mostrarAlertaNivelLluvia = true; // Inicializada en true

    function verificarNivelLluvia(lluvia) {
    // Emitir alerta moderada (amarilla) si la lluvia está entre 5 y 15 mm
    if (lluvia >= 5 && lluvia < 15) {
        return {
            title: 'Alerta Lluvias Moderadas mayor a 5mm/h',
            text: 'Lluvias moderadas a 50 km: Se espera que el agua llegue a la zona en aproximadamente 5 horas.',
            icon: 'info', // verde
            confirmButtonText: 'Entendido',
            showCancelButton: true,
            cancelButtonText: 'No volver a mostrar'
        };
    }
    // Emitir alerta fuerte (roja) si la lluvia está entre 15 y 60 mm
    else if (lluvia >= 15 && lluvia < 60) {
        return {
            title: 'Alerta Lluvias Fuertes mayor a 15 mm/h',
            text: 'Lluvia fuerte a 50km: tiene 2 horas para tomar sus medidas de evacuación, presione el boton buscar albergues.',
            icon: 'warning', // Rojo Oscuro
            confirmButtonText: 'Entendido',
            showCancelButton: true,
            cancelButtonText: 'No volver a mostrar'
        };
    }
    // Emitir alerta torrencial (roja oscura) si la lluvia es igual o superior a 60 mm
    else if (lluvia >= 60) { 
        return {
            title: 'Alerta Lluvias Torrenciales mayor a 60 mm/h',
            text: 'Lluvia torrencial a 50km: Tiene 1 hora para tomar sus medidas de evacuación, presione el boton buscar albergues.',
            icon: 'error', // Rojo
            confirmButtonText: 'Entendido',
            showCancelButton: true,
            cancelButtonText: 'No volver a mostrar'
        };
    }
    // No hay alerta
    return null;
}


    function emitirAlertaLluvia(lluvia) {
        var configuracionAlerta = verificarNivelLluvia(lluvia);

        if (configuracionAlerta && mostrarAlertaNivelLluvia) {
            // Utilizar SweetAlert2 para mostrar la alerta con la configuración personalizada
            Swal.fire(configuracionAlerta).then((result) => {
                // Limpiar la configuración después de mostrar la alerta
                configuracionAlerta = null;

                // Si se hace clic en "No volver a mostrar", actualizar la variable
                if (result.dismiss === Swal.DismissReason.cancel) {
                    mostrarAlertaNivelLluvia = false;
                }
            });
        }
    }

    // Función para obtener el nivel de lluvia
    function obtenerNivelLluvia() {
        // Realizar una petición AJAX para obtener el nivel de lluvia
        $.ajax({
            type: 'GET',
            url: 'obtener_nivel_lluvia.php', // Reemplazar con la ruta correcta a tu script PHP
            dataType: 'json',
            success: function(response) {
                // Manejar la respuesta JSON y emitir la alerta
                emitirAlertaLluvia(response.lluvia);
            },
            error: function(error) {
                console.error('Error al obtener el nivel de lluvia:', error);
            }
        });
    }

    // Llamar a la función obtenerNivelLluvia cada 5 segundos (para pruebas, puedes ajustar esto)
    setInterval(obtenerNivelLluvia, 5000);

</script>
<script>
    var chartDomLluvias; // Define variable global para la gráfica de lluvias
    var myChartLluvias;

    function actualizarGrafica(datos) {
        var fechas = datos.map(d => d.fecha_hora);
        var nivelesRio = datos.map(d => d.nivel_lec_rio);
        var temperaturas = datos.map(d => d.temperatura);
        var nivelesUl = datos.map(d => d.nivel_ul);
        var humedades = datos.map(d => d.humedad);
        var lluvias = datos.map(d => d.lluvia);

        chart.setOption({
            xAxis: {
                data: fechas
            },
            series: [
                { data: nivelesRio },
                { data: temperaturas },
                { data: nivelesUl }
            ]
        });

        myChart.setOption({
            xAxis: {
                data: fechas
            },
            series: [
                { data: humedades }
            ]
        });

        if (myChartLluvias) {
            myChartLluvias.setOption({
                xAxis: {
                    data: fechas
                },
                series: [
                    { data: lluvias }
                ]
            });
        }

        // Actualizar la tabla
        var tableBody = document.getElementById('table-data');
        tableBody.innerHTML = ""; // Limpiar tabla existente
        for (var i = 0; i < datos.length; i++) {
            var row = document.createElement('tr');
            row.innerHTML = `
                <td>${datos[i].fecha_hora}</td>
                <td>${datos[i].nivel_lec_rio}</td>
                <td>${datos[i].temperatura}</td>
                <td>${datos[i].nivel_ul}</td>
                <td>${datos[i].lluvia}</td>
            `;
            tableBody.appendChild(row);
        }
    }

    function obtenerDatos() {
        fetch('obtener_datos.php')
            .then(response => response.json())
            .then(data => {
                actualizarGrafica(data);
            })
            .catch(error => console.error('Error:', error));
    }

    // Inicializar la gráfica de lluvias
    document.addEventListener("DOMContentLoaded", function() {
        var chartDomLluvias = document.getElementById('lluv');
        myChartLluvias = echarts.init(chartDomLluvias);
        var optionLluvias = {
            title: {
                text: 'Precipitación (Lluvia mm)'
            },
            tooltip: {
                trigger: 'axis',
                formatter: function (params) {
                    return 'Registros de Lluvia<br>' + params[0].name + ' : ' + params[0].value + ' mm';
                },
                axisPointer: {
                    animation: false
                }
            },
            xAxis: {
                type: 'category',
                data: [], // Inicialmente vacío
                boundaryGap: false
            },
            yAxis: {
                type: 'value',
                splitLine: {
                    show: false
                }
            },
            series: [
                {
                    name: 'Lluvia (mm)',
                    type: 'line',
                    showSymbol: false,
                    data: [] // Inicialmente vacío
                }
            ]
        };
        myChartLluvias.setOption(optionLluvias);
    });

    // Obtener datos cada 5 segundos
    setInterval(obtenerDatos, 3000);
</script>

    <!-- IMPORTACION DE ANIMACIONES DE LA PAGINA Y DEMAS  -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
            <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
            <!-- bootstrap 3 affix -->
            <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
            <!-- Owl carousel  -->
            <script src="assets/vendors/owl-carousel/js/owl.carousel.js"></script>
            <!-- Ollie js -->
            <script src="assets/js/Ollie.js"></script>
            <!-- Bootstrap importacion -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
            <!-- Ahora im-portamos Echarts la libreria de l;as graficas -->
            <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.3/echarts.min.js" integrity="sha512-EmNxF3E6bM0Xg1zvmkeYD3HDBeGxtsG92IxFt1myNZhXdCav9MzvuH/zNMBU1DmIPN6njrhX1VTbqdJxQ2wHDg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
            <script src="modo_oscuro.js"></script>
            <!-- PIE DE PAGINA PARA copyright etc -->
                    <footer class="foot" id="base" style="width: 100%; height: 90px;">
            <p>&copy; 2024 Sistema de Monitoreo de Afluentes y Alerta de Inundaciones. Todos los derechos reservados.</p>
            </footer >
              </div>
            </body>
            </html>