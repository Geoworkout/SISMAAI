<?php
// Incluir el archivo de conexión a la base de datos
include 'db.php';

// Verificar si la conexión es válida antes de ejecutar la consulta
if ($conn) {
    // Consulta para obtener el nivel de lluvia más reciente
    $query = "SELECT fecha, lluvia FROM pluviometro ORDER BY id_pluv DESC LIMIT 1";

    $result = mysqli_query($conn, $query);

    // Verificar si la consulta fue exitosa
    if ($result) {
        // Verificar si se encontraron filas
        if (mysqli_num_rows($result) > 0) {
            // Obtener la fila de resultado como un array asociativo
            $row = mysqli_fetch_assoc($result);
            
            // Devolver el resultado como JSON
            header('Content-Type: application/json');
            echo json_encode(['lluvia' => $row['lluvia']]);
        } else {
            // Si no se encontraron filas, devolver un mensaje de error
            echo json_encode(['error' => 'No se encontraron datos de lluvia en la base de datos']);
        }
    } else {
        // Si hay un error en la consulta, devolver un mensaje de error
        echo json_encode(['error' => 'Error en la consulta: ' . mysqli_error($conn)]);
    }
} else {
    // Si la conexión a la base de datos no es válida, devolver un mensaje de error
    echo json_encode(['error' => 'Error: La conexión a la base de datos no es válida.']);
}
?>
