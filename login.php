<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style_inicio_sesion.css">
    <title>Página de Inicio de Sesión | AsmrProg</title>
</head>

<body>
    <div class="container" id="container">
        <div class="form-container sign-in active" id="signInUser">
            <div class="logo">
                <img src="assets/imgs/sismaai.png" alt="">
            </div>
            <form method="post" action="usuario.html">
                <h3>Iniciar Sesión</h3>
        
                <span>o usa tu contraseña de correo electrónico</span>
                <input type="email" name="username" placeholder="Correo Electrónico">
                <input type="password" name="password" placeholder="Contraseña">
                <button type="submit" name="login">Iniciar Sesión</button>
            </form>
        </div>
        <div class="form-container sign-in-admin" id="signInAdmin">
            <div class="logo">
                <img src="assets/imgs/sismaai.png" alt="">
            </div>
            <form method="post" action="index.php">
                <h3>Iniciar Sesión</h3>
        
                <span>o usa tu contraseña de correo electrónico</span>
                <input type="email" name="username" placeholder="Correo Electrónico">
                <input type="password" name="password" placeholder="Contraseña">
                <button type="submit" name="login_admin">Iniciar Sesión</button>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h3>¡Bienvenido, Administrador!</h3>
                    <p>Si no eres administrador, presiona el botón de abajo para iniciar sesión como usuario.</p>
                    <button class="hidden" id="loginUser" onclick="toggleForms('user')">Iniciar Sesión usuario</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h3>¡Bienvenido, Usuario!</h3>
                    <p>Si no eres usuario, presiona el botón de abajo para iniciar sesión como administrador.</p>
                    <button class="hidden" id="loginAdmin" onclick="toggleForms('admin')">Iniciar sesión administrador</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleForms(type) {
            const container = document.getElementById('container');
            const signInUser = document.getElementById('signInUser');
            const signInAdmin = document.getElementById('signInAdmin');

            if (type === 'admin') {
                container.classList.add('active');
                signInUser.classList.remove('active');
                signInAdmin.classList.add('active');
            } else {
                container.classList.remove('active');
                signInAdmin.classList.remove('active');
                signInUser.classList.add('active');
            }
        }
    </script>
</body>

</html>
