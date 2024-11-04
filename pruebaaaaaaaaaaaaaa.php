<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';  // Asegúrate de que 'db.php' tenga la conexión usando mysqli

// Inicializar respuesta
$response = [
    'success' => false,
    'message' => '',
];

// Manejar las acciones de los botones solo si hay una solicitud POST válida
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action'])) {
    $action = $_POST['action'];
    $table = isset($_POST['table']) ? $_POST['table'] : '';

    if ($action == 'delete' && !empty($table)) {
        // Eliminar registros según la tabla especificada
        $sql = "";
        if ($table == 'lectura_rio') {
            $sql = "DELETE FROM lectura_rio ORDER BY Id_Lec_Rio ASC LIMIT 400";
        } elseif ($table == 'lectura_ambiental') {
            $sql = "DELETE FROM lectura_ambiental ORDER BY Id_Lec_Ambi ASC LIMIT 400";
        }

        if (!empty($sql)) {
            $stmt = $conn->prepare($sql);

            if ($stmt) {
                $stmt->execute();
                $affected_rows = $stmt->affected_rows;
                $stmt->close();

                $response['success'] = true;
                $response['message'] = "Se han eliminado $affected_rows registros antiguos de '$table'.";
            } else {
                $response['message'] = "Error al eliminar registros de '$table': " . $conn->error;
            }
        } else {
            $response['message'] = "Tabla no válida.";
        }
    } elseif ($action == 'add') {
        // Agregar un solo registro a las tablas correspondientes
        $registro_info = '';
        $message = '';
        $alertType = '';

        // Agregar un registro con datos aleatorios en la tabla 'lectura_rio'
        $nivel_ul = rand(8, 19);
        $nivel_lec_rio = rand(8, 19);

        $sql = "INSERT INTO lectura_rio (nivel_ul, nivel_lec_rio, fecha_lec_rio, hora_lec_rio) VALUES (?, ?, CURDATE(), CURTIME())";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("ii", $nivel_ul, $nivel_lec_rio);
            $stmt->execute();
            $stmt->close();

            $registro_info .= "Tabla 'lectura_rio': Nivel UL = $nivel_ul, Nivel Lec Río = $nivel_lec_rio\n";
        } else {
            $response['message'] = "Error al agregar registro en 'lectura_rio': " . $conn->error;
        }

        // Agregar un registro con datos aleatorios en la tabla 'lectura_ambiental'
        $humedad = rand(30, 90);
        $temperatura = rand(15, 35);
        $lluvia = rand(0, 100);
        $presion_atmosferica = rand(950, 1050);

        $sql = "INSERT INTO lectura_ambiental (humedad, temperatura, lluvia, presion_atmosferica, fecha_lec_ambi, hora_lec_ambi, Id_Dispositivo) VALUES (?, ?, ?, ?, CURDATE(), CURTIME(), 1)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("iiii", $humedad, $temperatura, $lluvia, $presion_atmosferica);
            $stmt->execute();
            $stmt->close();

            $registro_info .= "Tabla 'lectura_ambiental': Humedad = $humedad, Temperatura = $temperatura, Lluvia = $lluvia, Presión Atmosférica = $presion_atmosferica\n";
        } else {
            $response['message'] = "Error al agregar registro en 'lectura_ambiental': " . $conn->error;
        }

        // Agregar un registro con datos aleatorios en la tabla 'pluviometro'
        $lluvia = rand(0, 100);
        
        $sql = "INSERT INTO pluviometro (lluvia, fecha, hora, id_dispositivo) VALUES (?, CURDATE(), CURTIME(), 1)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("i", $lluvia);
            $stmt->execute();
            $stmt->close();

            $registro_info .= "Tabla 'pluviometro': Lluvia = $lluvia\n";
        } else {
            $response['message'] = "Error al agregar registro en 'pluviometro': " . $conn->error;
        }

        if (empty($response['message'])) {
            $response['success'] = true;
            $response['message'] = "Se han agregado registros con éxito:\n" . $registro_info;
        }
    }

    // Enviar la respuesta en formato JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
}
?>
<script>
    
</script>