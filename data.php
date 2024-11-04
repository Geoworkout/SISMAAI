
<?php
include "db.php";

// Recibe los datos de la solicitud GET
$datos = $_GET;

// Establece la zona horaria a 'America/Mexico_City'
date_default_timezone_set("America/Mexico_City");

// Obtiene la fecha y hora actual
$fecha = date('Y-m-d');
$horaActual = date("H:i:s");

// Variables para los valores
$metrosSwitch = isset($datos['metrosSwitch']) ? intval($datos['metrosSwitch']) : null;
$metrosUltra = isset($datos['metrosUltra']) ? intval($datos['metrosUltra']) : null;
$humedad = isset($datos['humedad']) ? floatval($datos['humedad']) : null;
$temperatura = isset($datos['temperatura']) ? floatval($datos['temperatura']) : null;
$lluvia = isset($datos['lluvia']) ? floatval($datos['lluvia']) : null;

// Inserta en la tabla 'lectura_rio' (niveles del río) solo si hay valores válidos
if (!is_null($metrosUltra) && !is_null($metrosSwitch)) {
    $query_rio = "INSERT INTO lectura_rio (nivel_ul, nivel_lec_rio, fecha_lec_rio, hora_lec_rio, Id_Dispositivo) VALUES ($metrosUltra, $metrosSwitch, '$fecha', '$horaActual', 1)";
    $res_rio = mysqli_query($conn, $query_rio);
}

// Inserta en la tabla 'lectura_ambiental' solo si hay valores válidos de humedad y temperatura
if (!is_null($humedad) && !is_null($temperatura)) {
    $query_ambiental = "INSERT INTO lectura_ambiental (humedad, temperatura, presion_atmosferica, fecha_lec_ambi, hora_lec_ambi, Id_Dispositivo) VALUES ($humedad, $temperatura, 0, '$fecha', '$horaActual', 1)";
    $res_ambiental = mysqli_query($conn, $query_ambiental);
}

// Inserta en la tabla 'pluviometro' solo si hay valores válidos de lluvia
if (!is_null($lluvia)) {
    $query_pluviometro = "INSERT INTO pluviometro (lluvia, fecha, hora, id_dispositivo) VALUES ($lluvia, '$fecha', '$horaActual', 1)";
    $res_pluviometro = mysqli_query($conn, $query_pluviometro);
}

// Verifica si las inserciones fueron exitosas
if ((isset($res_rio) && $res_rio) || (isset($res_ambiental) && $res_ambiental) || (isset($res_pluviometro) && $res_pluviometro)) {
    echo "Registros en base de datos OK!";
} else {
    echo "Falla en el registro en la base de datos: " . mysqli_error($conn);
}
?>