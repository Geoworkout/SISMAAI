<?php
 include "db.php";
 ?>
<!DOCTYPE html>
<html lang="en">
    <head>
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with Ollie landing page.">
    <meta name="author" content="Devcrud">
    <title>Monitoreo FLADE</title>

   <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <!-- font icons -->

    <link rel="stylesheet" href="assets/vendors/themify-icons/css/themify-icons.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.carousel.css">
    <link rel="stylesheet" href="assets/vendors/owl-carousel/css/owl.theme.default.css">
    <!-- Bootstrap + Ollie main styles -->
  <link rel="stylesheet" href="assets/css/estilo.css">
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <style>
        /* Estilos para h4 en modo claro */
    body h4 {
        color: negro; /* Asegúrate de usar el valor de color correcto, como "black" o "#000000" */
         font-family: "Raleway", sans-serif;
        }
        /* Agrega más estilos personalizados según sea necesario */
        /* Estilos para el modo oscuro */
          body.dark-mode {
         background-color: #151E21 !important;
         color: white !important;
         font-family: "Raleway", sans-serif;

        }
        body.dark-mode #scrollspy {
         background-color: #151E21 !important;
         color: white !important;
         font-family: "Raleway", sans-serif;

        }
        body.dark-mode .navbar-brand {
            color: white;
        }
    </style>
         <script>
        function verificarNivelRio(nivel) {
            if (nivel > 18) {
                // Si el nivel supera los 18 metros, muestra una alerta
                alert("¡Alerta de riesgo! El nivel del río ha superado los 18 metros.");
            }
        }
    </script>
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="40" id="home">
     <nav id="scrollspy" class="navbar navbar-light bg-light navbar-expand-lg fixed-top" data-spy="affix" data-offset-top="5">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/imgs/brand.svg" alt="" class="brand-img"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#home">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">Estadisticas</a>
                    </li>
                     <li class="nav-item">
                        <a class="nav-link" href="#pie">Información</a>
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
                            <h1 class="carousel-title">Flood Alert Device</h1>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="carousel-caption d-none d-md-block">
                        <center><img class="carousel-title" src="assets/imgs/flade_blanco.png" width="20%" height="20%"><br></center>
                        <h1 class="carousel-title">Dispositivo de Alerta de Inundaciones</h1>
                            <button class="btn btn-primary btn-rounded">navegar</button>
                          </div>
                    </div>
                </div>
            </div>        
        </div>
        <div class="infos container mb-4 mb-md-2">
            <div class="title">
                <h5>Flade</h5>
                <p class="font-small">Vigilando los ríos, protegiendo los municipios.<br>Tu fuente confiable para prevenir inundaciones </p>
            </div>
            <div class="socials text-right">
                <div class="row justify-content-between">
                    <div class="col">
                        <a class="d-block subtitle"><i class="ti-microphone pr-2"></i> (765) 112-2643</a>
                        <a class="d-block subtitle"><i class="ti-email pr-2"></i> flade@gmail.com</a>
                    </div>
                    <div class="col">
                        <h6 class="subtitle font-weight-normal mb-2">redes sociales</h6>
                        <div class="social-links">
                            <a href="https://www.facebook.com/profile.php?id=100022431608604" class="link pr-1"><i class="ti-facebook"></i></a>
                            <a href="javascript:void(0)" class="link pr-1"><i class="ti-google"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <a href="index.php" class="boton">Cambiar Tema</a>
    <h1 style="color:red;">UTILICE EL OTRO TEMA PARA UNA MEJOR VISUALIZACIÓN DE LOS DATOS</h1>
    <h4 style = "text-align:center; color: #ed3e3e; ">VISUALIZACIÓN DEL NIVEL DEL CAUCE EN TIEMPO REAL</h4>
    <!-- Nuevo contenedor para la gráfica de columnas -->
<script type="text/javascript">
    google.charts.load('current', {'packages':['bar']});
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var jsonData = <?php
            $query = "SELECT fecha_lec_rio, nivel_ul FROM lectura_rio ORDER BY fecha_lec_rio DESC LIMIT 1";
            $result = mysqli_query($conn, $query);
            $data = array();
            $data[] = ['Fecha', 'Nivel (m)'];

            while ($row = mysqli_fetch_assoc($result)) {
                $data[] = [$row['fecha_lec_rio'], (float)$row['nivel_ul']];
            }

            echo json_encode($data);
        ?>;

        var data = google.visualization.arrayToDataTable(jsonData);

        var options = {
            chart: {
                title: '        MEDIDA TEMPORAL A NIVEL ESPEJO',
                subtitle: 'Últimos 5 registros',
            },
            colors: ['##86CC81', '#64E0FA', '#DAF7A6'] // Cambia los colores aquí

        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
    }
</script>

    <section class="section" id="about">
      <!-- .......................................................................... -->
         <!-- <a class="btn btn-primary btn-rounded" href="datos2.php" >Mas datos</a> -->
         <article class = "graficas1">
         <div id=grafica1>
        <script type="text/javascript">
    google.charts.load('current', {'packages':['corechart', 'gauge']});
    google.charts.setOnLoadCallback(drawChart);
  
   function drawChart() {
    // Datos de la gráfica de líneas (limitado a n datos)
    var lineData = google.visualization.arrayToDataTable([
      ['Fecha y Hora', 'Nivel (m)'],
      <?php 
        $query = "SELECT CONCAT(fecha_lec_rio, ' ', hora_lec_rio) AS fecha_hora, nivel_lec_rio FROM lectura_rio ORDER BY Id_Lec_Rio DESC, hora_lec_rio ASC LIMIT 5";
        $res = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_array($res)){
          $nivel = $data['nivel_lec_rio'];
          $fechaHora = $data['fecha_hora'];
          echo "['$fechaHora', $nivel],";
        }
      ?>
    ]);
    // Opciones de la gráfica de líneas
    var lineOptions = {
      title: 'NIVEL DEL AGUA EN TIEMPO REAL',
      curveType: 'LineChart',
      legend: { position: 'bottom' },
      vAxis: { title: 'Nivel (m)' },
      hAxis: { title: 'Fecha y Hora' }
    };
   var firstRowIndex = 0; // Índice de la primera fila en la gráfica de líneas
var defaultValue = lineData.getValue(firstRowIndex, 1); // Obtener el valor del primer dato de la gráfica de líneas
var gaugeData = google.visualization.arrayToDataTable([
  ['Label', 'Value'],
  ['Nivel Riesgo', defaultValue]
]);

    var gaugeOptions = {
      width: 800,
      height: 150,
      greenFrom: 5,
      greenTo: 16,
      yellowFrom: 17,
      yellowTo: 18,
      redFrom: 19, //rojo desde 19
      redTo: 100,//hasta el 100...
      
      
      minorTicks: 1

    };

    gaugeOptions.redFrom = defaultValue;

    // Crear instancias de la gráfica de líneas y el termómetro
    var lineChart = new google.visualization.LineChart(document.getElementById('line_chart'));
    var gaugeChart = new google.visualization.Gauge(document.getElementById('gauge_chart'));
   
    // Función para actualizar el termómetro cuando se hace clic en la gráfica de líneas
    function updateGaugeValue(selection) {
      if (selection.length > 0) {
        var rowIndex = selection[0].row;
        var value = lineData.getValue(rowIndex, 1);
        gaugeData.setValue(0, 1, value);
        gaugeChart.draw(gaugeData, gaugeOptions);

        // Verificar si el valor supera los 18 metros para mostrar "peligro" en rojo
        if (value > 18) {
          gaugeOptions.redFrom = value;
          gaugeOptions.redTo = value + 10;
          gaugeOptions.yellowTo = value;
        } else {
          gaugeOptions.redFrom = 18;
          gaugeOptions.redTo = 100;
          gaugeOptions.yellowTo = 18;
        }
      }
    }

    // Manejador de eventos para el clic en la gráfica de líneas
    google.visualization.events.addListener(lineChart, 'select', function() {
      updateGaugeValue(lineChart.getSelection());
    });
     
    // Dibujar la gráfica de líneas y el termómetro
    lineChart.draw(lineData, lineOptions);
    gaugeChart.draw(gaugeData, gaugeOptions);
  }
  //  contenedores
</script>
  
     <div>
     <div id="columnchart_material" style="width: 100%; height:300px; "></div>
     <div id="line_chart" style="width: 100%; height: 450px;"></div>
     <div style="width: 100%; color: #ed3e3e; text-align:center;"> <h4>GRAFICAS DE ALERTA!</h></div>
     <span id = "img1" ><img src="assets/imgs/FLADE_COLORES.png" width="150px" height="100px"></span>  
    </div class="">
    <span id="gauge_chart" ></span>
    <span id="chart_temp"></span> 
    </div>
    <div id="chart_div_humedad" style="width: 90%; height: 400px;"></div>
    <div  style="margin-bottom: 15px;" ></div>

<span id = "chart_temp">
        <script type="text/javascript" src="https://www.gstatic.com/charts/laoader.js"></script>
   <script type="text/javascript">
      google.charts.load('current', {'packages':['gauge']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var jsonData = <?php
          $query = "SELECT temperatura FROM lectura_ambiental ORDER BY fecha_lec_ambi DESC, hora_lec_ambi DESC LIMIT 1";
          $result = mysqli_query($conn, $query);
          $row = mysqli_fetch_assoc($result);
          $temperatura = $row['temperatura'];
          echo $temperatura;  
        ?>;
        
        var data = google.visualization.arrayToDataTable([
          ['Label', 'Value'],
          ['Temperatura', jsonData]
        ]);

        var options = {
      width: 800,
      height: 150,
      greenFrom: 1,
      greenTo: 31,
      yellowFrom: 25,
      yellowTo: 32,
      redFrom: 33,
      redTo: 100,
      minorTicks: 5
      
        };

        var chart = new google.visualization.Gauge(document.getElementById('chart_temp'));

        chart.draw(data, options);
      }
    </script>
</span>

     <script type="text/javascript">
          google.charts.load('current', {'packages':['corechart']});
          google.charts.setOnLoadCallback(drawChart);
// empieza la grafica de humedad
function drawChart() {
        var jsonData = <?php
        $query = "SELECT fecha_lec_ambi, humedad FROM lectura_ambiental ORDER BY fecha_lec_ambi DESC LIMIT 1";
        $result = mysqli_query($conn, $query);
        $data = array();
        $data[] = ['Fecha', 'Humedad'];
        if ($row = mysqli_fetch_assoc($result)) {
            $data[] = [$row['fecha_lec_ambi'], (float) $row['humedad']];
        }
        echo json_encode($data);
         ?>;

        var data = google.visualization.arrayToDataTable(jsonData);

          var options = {
        title: 'Humedad ambiental FLADE',
        vAxis: {title: 'Porcentaje de humedad'},
        isStacked: true
    };

       var chart = new google.visualization.SteppedAreaChart(document.getElementById('chart_div_humedad'));

        chart.draw(data, options);
       }
      </script>
    </article>
    </section>

<div id="bar_rain_chart" style="width: 100%; height: 300px;"></div>
<script type="text/javascript">
    google.charts.load('current', {'packages': ['corechart']});
    google.charts.setOnLoadCallback(drawBarRain);

    function drawBarRain() {
        var jsonData = <?php
            $query = "SELECT DATE_FORMAT(fecha_lec_ambi, '%Y-%m') AS anio_mes, SUM(lluvia) AS lluvia_total FROM lectura_ambiental GROUP BY anio_mes";
            $result = mysqli_query($conn, $query);
            $data = array();
            $data[] = ['Mes', 'Lluvia (mm)'];

            while ($row = mysqli_fetch_assoc($result)) {
                $anioMes = $row['anio_mes'];
                $lluviaTotal = (float)$row['lluvia_total'];
                $data[] = [$anioMes, $lluviaTotal];
            }

            echo json_encode($data);
        ?>;

        var barRainData = google.visualization.arrayToDataTable(jsonData);

        var barRainOptions = {
            title: 'Lluvia',
            legend: { position: 'none' },
            colors: ['#76A7FA'],
            hAxis: { title: 'Mes' },
            vAxis: { title: 'Lluvia (mm)' }
        };

        var barRainChart = new google.visualization.ColumnChart(document.getElementById('bar_rain_chart'));

        barRainChart.draw(barRainData, barRainOptions);
    }
</script> 
    </div>
    
    <footer class="pieP" id="pie" style="width: 100%; height: 600px;">
    <div class="container">
    <div class="row">
      <br>
             <b><p>Gráfica de Nivel Espejo</p></b>
            <p>
                La gráfica de nivel espejo muestra cómo cambia el nivel del agua en un río a lo largo del tiempo, utilizando barras para representar mediciones específicas de nivel en diferentes fechas. Estas visualizaciones son fundamentales para el monitoreo de recursos hídricos y la gestión de inundaciones, proporcionando información sobre las fluctuaciones y tendencias en los niveles de agua, lo que permite tomar decisiones informadas en la planificación ambiental y la seguridad pública.
            </p>
            <b><p>Gráfica de Líneas</p></b>
            <p>La gráfica de líneas muestra la visualización temporal del nivel del agua en el río. Cada punto en la gráfica representa un registro de medición del nivel del agua en una fecha y hora específica. Puedes hacer clic en un punto para actualizar el termómetro de riesgo con el valor correspondiente. La línea curva muestra la tendencia general del nivel del agua a lo largo del tiempo.</p>
            <b><p>Termómetro de Riesgo<p></b>
            <p>El termómetro de riesgo representa el nivel actual del agua en el río y su nivel de riesgo. El valor del termómetro se actualiza cuando haces clic en un punto en la gráfica de líneas. Si el valor supera los 18 metros, se muestra en color rojo para indicar un nivel de peligro. Si el valor está entre 17 y 18 metros, se muestra en color amarillo como nivel de precaución. Si el valor es menor a 15 metros, se considera seguro y se muestra en color verde.</p>
            <b><p>Gráfica de Temperatura<p></b>
            <p>La gráfica de temperatura muestra la temperatura ambiental registrada en tiempo real. El valor se actualiza automáticamente y se representa en un termómetro. Puedes verificar la temperatura actual y observar cualquier cambio o tendencia. El termómetro utiliza colores para indicar diferentes rangos de temperatura, como rojo para altas temperaturas, amarillo para temperaturas medias y verde para temperaturas bajas.</p>
            <b><p>Gráfica de Humedad<p></b>
            <p>La gráfica de humedad muestra el nivel de humedad ambiental registrado en tiempo real. El valor se actualiza automáticamente y se representa en una gráfica de área escalonada. Puedes observar la humedad actual y analizar cualquier cambio o tendencia. La escala vertical indica el porcentaje de humedad, y la línea curva muestra la variación de la humedad a lo largo del tiempo.</p>
            <b><p>Gráfica de lluvia<p></b>
          <p>proporciona una representación visual de los datos de precipitación acumulada en función de los meses. Cada barra en la gráfica representa un mes específico y muestra la cantidad total de lluvia registrada en milímetros (mm). Esta representación permite observar patrones estacionales en la lluvia, identificar meses con mayores o menores precipitaciones y analizar tendencias climáticas a lo largo del tiempo. La gráfica de barras de lluvia es una herramienta útil para comprender y monitorear los cambios en los patrones de precipitación, lo que puede ser valioso para la toma de decisiones relacionadas con la gestión de recursos hídricos y la planificación ambiental.</p>
        </div><p>
    </div>
</div>
</footer >
  <!-- core  -->
    <script src="assets/vendors/jquery/jquery-3.4.1.js"></script>
    <script src="assets/vendors/bootstrap/bootstrap.bundle.js"></script>
    <!-- bootstrap 3 affix -->
  <script src="assets/vendors/bootstrap/bootstrap.affix.js"></script>
    <!-- Owl carousel  -->
    <script src="assets/vendors/owl-carousel/js/owl.carousel.js"></script>
    <!-- Ollie js -->
    <script src="assets/js/Ollie.js"></script>
    <script>
    // Función para verificar el nivel del río
    function verificarNivelRio() {
        $.ajax({
            url: 'verificar_nivel.php', // URL del archivo PHP
            method: 'GET',
            success: function (response) {
                // Maneja la respuesta del servidor
                if (response.nivel > 18) {
                    // Muestra un alert si el nivel supera los 18 metros
                    alert('ALERTA: El nivel del río supera los 18 metros.');
                }
            },
            error: function (error) {
                console.error(error);
            }
        });
    }

    // Llama a la función para verificar el nivel del río
    verificarNivelRio();

    // Establece un intervalo para verificar el nivel del río cada cierto tiempo (por ejemplo, cada 5 minutos)
    setInterval(verificarNivelRio, 5000); // 300000 milisegundos = 5 minutos
</script>

</body>
</html>
