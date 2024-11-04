<?php
// Incluir el archivo de conexión a la base de datos
include('db.php');

// Verificar si el formulario ha sido enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener y sanitizar los datos del formulario
    $nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
    $apellido = mysqli_real_escape_string($conn, $_POST['apellido']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $edad = mysqli_real_escape_string($conn, $_POST['edad']);
    $sexo = mysqli_real_escape_string($conn, $_POST['sexo']);
    $correo = mysqli_real_escape_string($conn, $_POST['correo']);
    $telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $id_dispositivo = mysqli_real_escape_string($conn, $_POST['id_dispositivo']);

    // Consulta para insertar datos en la tabla "administrador"
    $query = "INSERT INTO administrador (nom_admin, apellido_admin, Username_admin, edad_admin, Sexo_admin, Correo_admin, Telefono_admin, Contraseña_admin, Id_Dispositivo) 
              VALUES ('$nombre', '$apellido', '$username', '$edad', '$sexo', '$correo', '$telefono', '$password', '$id_dispositivo')";

    // Ejecutar la consulta y verificar el resultado
    if (mysqli_query($conn, $query)) {
        // Si la inserción es exitosa, mostrar SweetAlert de éxito
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'success',
                        title: '¡Registro Exitoso!',
                        text: 'Los datos han sido registrados correctamente.',
                        confirmButtonText: 'Aceptar'
                    }).then(() => {
                        window.location.href = 'register.php';
                    });
                });
              </script>";
    } else {
        // Si ocurre un error, mostrar SweetAlert de error con el mensaje correspondiente
        $error_message = mysqli_error($conn);
        echo "<script>
                document.addEventListener('DOMContentLoaded', function() {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al registrar',
                        text: 'Ocurrió un error al registrar los datos: $error_message',
                        confirmButtonText: 'Intentar de nuevo'
                    });
                });
              </script>";
    }

    // Cerrar la conexión a la base de datos
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Administrador - SISMAAI</title>
    <!-- SweetAlert2 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- Estilos personalizados -->
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #E4F2E9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            height:100vh;
            background-color: white;
            padding: 30px 40px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            width: 400px;
            text-align: center;
        }
        .container img {
        width: 80px;
    }
        .container h2 {
            color: #333;
            margin-bottom: 25px;
        }
        .container form {
            display: flex;
            flex-direction: column;
            align-items: stretch;
        }
        .container form input,
        .container form select {
            margin-bottom: 15px;
            padding: 10px 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .container form button {
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            transition: background-color 0.3s ease;
        }
        .submit-btn {
            background-color: #28a745;
        }
        .submit-btn:hover {
            background-color: #218838;
        }
        .cancel-btn {
            background-color: #dc3545;
            margin-top: 10px;
        }
        .cancel-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="sismaai.png" alt="Logo SISMAAI"">
        <h2>Registrar Administrador</h2>
        <form method="POST" action="register.php">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="apellido" placeholder="Apellido" required>
            <input type="text" name="username" placeholder="Nombre de Usuario" required>
            <input type="number" name="edad" placeholder="Edad" required min="1">
            <select name="sexo" required>
                <option value="" disabled selected>Seleccione su sexo</option>
                <option value="Masculino">Masculino</option>
                <option value="Femenino">Femenino</option>
                <option value="Prefiero no decirlo">Prefiero no decirlo</option>
            </select>
            <input type="email" name="correo" placeholder="Correo Electrónico" required>
            <input type="tel" name="telefono" placeholder="Teléfono" required pattern="[0-9]{10}" title="Ingrese un número de 10 dígitos">
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="text" name="id_dispositivo" placeholder="ID del Dispositivo" required>
            <button type="submit" class="submit-btn">Guardar</button>
            <button type="reset" class="cancel-btn">Cancelar</button>
        </form>
    </div>

    <!-- SweetAlert2 JS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
