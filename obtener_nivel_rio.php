<?php
// Incluye el archivo de conexión a la base de datos
include 'db.php';

// Verifica si la conexión es válida antes de ejecutar la consulta
if ($conn) {
    $query = "SELECT nivel_lec_rio FROM lectura_rio ORDER BY Id_Lec_Rio DESC LIMIT 1";
    $res = mysqli_query($conn, $query);

    // Verifica si la consulta fue exitosa
    if ($res) {
        // Obtén el resultado de la consulta
        $row = mysqli_fetch_assoc($res);

        // Devuelve el resultado como JSON
        header('Content-Type: application/json');
        echo json_encode(['nivelDelRio' => $row['nivel_lec_rio']]);
    } else {
        // Si hay un error en la consulta, devuelve un mensaje de error
        echo json_encode(['error' => 'Error en la consulta: ' . mysqli_error($conn)]);
    }
} else {
    // Si la conexión a la base de datos no es válida, devuelve un mensaje de error
    echo json_encode(['error' => 'Error: La conexión a la base de datos no es válida.']);
}
?>
