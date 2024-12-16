<?php
session_start();
require_once '../db/conexion.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Redirigir al formulario de inicio de sesión si no hay sesión activa
    header("Location: ../Administrador/InicioSesion.php");
    exit();
}

// Consulta para obtener la información de los usuarios
$query = "
    SELECT nombre, apellido, correo, rol
    FROM usuario
    ORDER BY nombre ASC
";
$stmt = $pdo->prepare($query);
$stmt->execute();
$usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (isset($_SESSION['mensaje'])) {
    echo "<div class='notificacion'>" . $_SESSION['mensaje'] . "</div>";
    unset($_SESSION['mensaje']); // Elimina el mensaje de sesión después de mostrarlo
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Usuarios</title>
    <link rel="stylesheet" href="../Administrador/css/IndexAdmin.css"> <!-- Asegúrate de tener este archivo para estilos -->
</head>
<body>
<script src="../javascript/RelojCerrarSesion.js"></script>

<header class="main-header">
    <h1>Panel de Administración</h1>
    
    <div class="dropdown">
        <button class="dropbtn">
            <i class="fas fa-user-circle"></i> <!-- Icono de usuario -->
        </button>
        <div class="dropdown-content">
            <a href="../Administrador/registro.php">Registrar Nuevo Usuario</a>
            <a href="../controllers/CerrarSesion.php">Cerrar sesión</a>
            <div id="clock" class="clock"></div>
        </div>
    </div>
</header>

<h1>Panel de Administración</h1>
<h2>Lista de Usuarios</h2>

<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Rol</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($usuarios as $usuario): ?>
            <tr>
                <td><?php echo htmlspecialchars($usuario['nombre']); ?></td>
                <td><?php echo htmlspecialchars($usuario['apellido']); ?></td>
                <td><?php echo htmlspecialchars($usuario['correo']); ?></td>
                <td><?php echo htmlspecialchars($usuario['rol']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
