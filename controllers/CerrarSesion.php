<?php
session_start();  // Iniciar la sesión

// Verificar si la sesión está activa
if (isset($_SESSION['id_usuario'])) {
    // Destruir todas las variables de sesión
    session_unset();

    // Destruir la sesión
    session_destroy();

    // Redirigir a la página de inicio de sesión
    header("Location: ../index.php");
    exit();
} else {
    // Si no hay sesión activa, redirigir al inicio de sesión
    header("Location: ../index.php");
    exit();
}
?>
