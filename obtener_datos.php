<?php
include "db.php";

// Consultas para obtener datos de las tablas lectura_rio y lectura_ambiental
$sql_lectura_rio = "SELECT fecha_lec_rio, hora_lec_rio, nivel_lec_rio, nivel_ul FROM lectura_rio ORDER BY fecha_lec_rio DESC, hora_lec_rio DESC LIMIT 10";
$sql_lectura_ambiental = "SELECT fecha_lec_ambi, hora_lec_ambi, humedad, temperatura FROM lectura_ambiental ORDER BY fecha_lec_ambi DESC, hora_lec_ambi DESC LIMIT 10";
$sql_pluviometro = "SELECT fecha, hora, lluvia FROM pluviometro ORDER BY fecha DESC, hora DESC LIMIT 10";

$result_lectura_rio = $conn->query($sql_lectura_rio);
$result_lectura_ambiental = $conn->query($sql_lectura_ambiental);
$result_pluviometro = $conn->query($sql_pluviometro);

$datos = [];

if ($result_lectura_rio->num_rows > 0 && $result_lectura_ambiental->num_rows > 0 && $result_pluviometro->num_rows > 0) {
    while($row_rio = $result_lectura_rio->fetch_assoc() and $row_ambiental = $result_lectura_ambiental->fetch_assoc() and $row_pluvio = $result_pluviometro->fetch_assoc()) {
        $fecha_hora_rio = $row_rio['fecha_lec_rio'] . ' ' . $row_rio['hora_lec_rio'];
        $fecha_hora_ambi = $row_ambiental['fecha_lec_ambi'] . ' ' . $row_ambiental['hora_lec_ambi'];
        $fecha_hora_pluvio = $row_pluvio['fecha'] . ' ' . $row_pluvio['hora'];

        // Asumiendo que las fechas/hora son las mismas o muy similares, puedes ignorar fecha_hora_ambi y fecha_hora_pluvio si es necesario
        $datos[] = [
            'fecha_hora' => $fecha_hora_rio, // Fecha y hora del río (puedes cambiar a otra si es necesario)
            'nivel_lec_rio' => (float) $row_rio['nivel_lec_rio'],
            'nivel_ul' => (int) $row_rio['nivel_ul'],
            'temperatura' => (float) $row_ambiental['temperatura'],
            'humedad' => (float) $row_ambiental['humedad'],
            'lluvia' => (float) $row_pluvio['lluvia']
        ];
    }
}

$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($datos);
?>
