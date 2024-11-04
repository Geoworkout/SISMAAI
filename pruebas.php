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
        } elseif ($table == 'pluviometro') {
            $sql = "DELETE FROM pluviometro ORDER BY id_pluv ASC LIMIT 400";
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
        // Agregar un registro aleatorio a cada tabla
        $registro_info = '';
        $message = '';

        // Agregar un registro aleatorio en la tabla 'lectura_rio'
        $nivel_ul = rand(8, 19);
        $nivel_lec_rio = rand(8, 19);
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');

        $sql = "INSERT INTO lectura_rio (nivel_ul, nivel_lec_rio, fecha_lec_rio, hora_lec_rio) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("iiss", $nivel_ul, $nivel_lec_rio, $fecha, $hora);
            $stmt->execute();
            $stmt->close();

            $registro_info .= "Tabla 'lectura_rio': Nivel UL = $nivel_ul, Nivel Lec Río = $nivel_lec_rio, Fecha = $fecha, Hora = $hora\n";
        } else {
            $response['message'] = "Error al agregar registro en 'lectura_rio': " . $conn->error;
        }

        // Agregar un registro aleatorio en la tabla 'lectura_ambiental'
        $humedad = rand(30, 90);
        $temperatura = rand(15, 35);
        $lluvia = rand(0, 25);
        $presion_atmosferica = rand(950, 1050);
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $id_dispositivo = 1;

        $sql = "INSERT INTO lectura_ambiental (humedad, temperatura, lluvia, presion_atmosferica, fecha_lec_ambi, hora_lec_ambi, Id_Dispositivo) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("iiiissi", $humedad, $temperatura, $lluvia, $presion_atmosferica, $fecha, $hora, $id_dispositivo);
            $stmt->execute();
            $stmt->close();

            $registro_info .= "Tabla 'lectura_ambiental': Humedad = $humedad, Temperatura = $temperatura, Lluvia = $lluvia, Presión Atmosférica = $presion_atmosferica, Fecha = $fecha, Hora = $hora\n";
        } else {
            $response['message'] = "Error al agregar registro en 'lectura_ambiental': " . $conn->error;
        }

        // Agregar un registro aleatorio en la tabla 'pluviometro'
        $lluvia = rand(0, 15);
        $fecha = date('Y-m-d');
        $hora = date('H:i:s');
        $id_dispositivo = 1;

        $sql = "INSERT INTO pluviometro (lluvia, fecha, hora, id_dispositivo) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            $stmt->bind_param("issi", $lluvia, $fecha, $hora, $id_dispositivo);
            $stmt->execute();
            $stmt->close();

            $registro_info .= "Tabla 'pluviometro': Lluvia = $lluvia, Fecha = $fecha, Hora = $hora\n";
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


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración - Lectura Río</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1d1f27;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #e0e0e0;
        }
        .container {
            background-color: #2c303a;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.5);
            width: 400px;
            text-align: center;
        }
        .container h1 {
            color: #ffffff;
            margin-bottom: 25px;
            font-size: 24px;
        }
        .container button {
            padding: 15px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            color: #ffffff;
            margin: 10px;
            transition: background-color 0.3s ease;
            width: 100%;
        }
        .delete-btn {
            background-color: #dc3545;
        }
        .delete-btn:hover {
            background-color: #c82333;
        }
        .delete-ambiental-btn {
            background-color: #dc3545;
        }
        .delete-ambiental-btn:hover {
            background-color: #c82333;
        }
        .delete-pluviometro-btn {
            background-color: #dc3545;
        }
        .delete-pluviometro-btn:hover {
            background-color: #c82333;
        }
        .add-btn {
            background-color: #28a745;
        }
        .add-btn:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Administración - datos SISMAAI</h1>

        <!-- Botón para eliminar 400 registros antiguos de 'lectura_rio' -->
        <button class="delete-btn" data-action="delete" data-table="lectura_rio">Eliminar 400 registros más antiguos de 'lectura_rio'</button>

        <!-- Botón para eliminar 400 registros antiguos de 'lectura_ambiental' -->
        <button class="delete-ambiental-btn" data-action="delete" data-table="lectura_ambiental">Eliminar 400 registros más antiguos de 'lectura_ambiental'</button>

        <!-- Botón para eliminar 400 registros antiguos de 'pluviometro' -->
        <button class="delete-pluviometro-btn" data-action="delete" data-table="pluviometro">Eliminar 400 registros más antiguos de 'pluviometro'</button>

        <!-- Botón para agregar registros aleatorios -->
        <button class="add-btn" data-action="add">Agregar registros aleatorios</button>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Script para manejar los botones y realizar solicitudes AJAX -->
    <script>
        document.querySelectorAll('button').forEach(function(button) {
            button.addEventListener('click', function() {
                const action = this.getAttribute('data-action');
                const table = this.getAttribute('data-table') || '';

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: action === 'delete' ? 'Esta acción eliminará 400 registros antiguos.' : 'Se agregarán registros aleatorios.',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Sí, continuar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const formData = new FormData();
                        formData.append('action', action);
                        formData.append('table', table);

                        fetch('', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire('Éxito', data.message, 'success');
                            } else {
                                Swal.fire('Error', data.message, 'error');
                            }
                        })
                        .catch(error => {
                            Swal.fire('Error', 'Hubo un problema en la solicitud.', 'error');
                        });
                    }
                });
            });
        });
    </script>
</body>
</html>
