
document.addEventListener('DOMContentLoaded', function () {
    const darkModeSwitch = document.getElementById('darkModeSwitch');
    const darkModeLabel = document.getElementById('darkModeLabel');

    // Verifica el estado del botón switch almacenado en localStorage
    const isDarkMode = localStorage.getItem('darkMode') === 'true';
    darkModeSwitch.checked = isDarkMode;
    setDarkMode(isDarkMode);

    // Escucha el cambio en el botón switch
    darkModeSwitch.addEventListener('change', function () {
        setDarkMode(this.checked);
    });
    function setDarkMode(isDark) {
        if (isDark) {
            document.body.classList.add('dark-mode');
            darkModeLabel.textContent = 'Modo Claro';
            // Almacena el estado en localStorage
            localStorage.setItem('darkMode', 'true');
        } else {
            document.body.classList.remove('dark-mode');
            darkModeLabel.textContent = 'Modo Oscuro';
            // Almacena el estado en localStorage
            localStorage.setItem('darkMode', 'false');
        }
        }
            });
 