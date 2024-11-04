<?php
// Incluye el archivo de conexión a la base de datos
include 'db.php';

// Realiza la consulta para obtener los datos
$query = "SELECT CONCAT(lr.fecha_lec_rio, ' ', lr.hora_lec_rio) AS fecha_hora, 
    COALESCE(lr.nivel_lec_rio, 0) AS nivel_lec_rio, 
    COALESCE(la.temperatura, 0) AS temperatura, 
    COALESCE(la.humedad, 0) AS humedad
    FROM lectura_rio lr
    LEFT JOIN lectura_ambiental la ON lr.fecha_lec_rio = la.fecha_lec_ambi
    ORDER BY fecha_hora DESC
    LIMIT 8";

$result = $conn->query($query);

if (!$result) {
    die("Error al ejecutar la consulta: " . $conn->error);
}

// Obtener los datos y almacenarlos en un array
$data = array();
while ($row = $result->fetch_assoc()) {
    $data[] = array(
        $row['fecha_hora'],
        $row['nivel_lec_rio'],
        $row['temperatura'],
        $row['humedad']
    );
}

// Preparar la respuesta en formato JSON
$response = array(
    'success' => true,
    'data' => $data
);

// Cerrar la conexión a la base de datos
$conn->close();

// Establecer el encabezado de respuesta como JSON
header('Content-type: application/json');

// Enviar la respuesta JSON
echo json_encode($response);
?>
