<?php
session_start();
require_once '../db/conexion.php';

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Redirigir al formulario de inicio de sesión si no hay sesión activa
    header("Location: ../Administrador/InicioSesion.php");
    exit();
}

// Consulta para obtener la información de entrada y salida de los usuarios
$queryRegistros = "
    SELECT usuario.nombre AS nombre, usuario.apellido AS apellido, relojchecardor.horaEntrada, relojchecardor.horaSalida, relojchecardor.status
    FROM relojchecardor
    JOIN usuario ON relojchecardor.id_usuario = usuario.id_usuario
    ORDER BY relojchecardor.horaEntrada DESC
";
$stmtRegistros = $pdo->prepare($queryRegistros);
$stmtRegistros->execute();
$registros = $stmtRegistros->fetchAll(PDO::FETCH_ASSOC);

// Consulta para obtener la información de los usuarios (nombre, apellido, correo, rol)
$queryUsuarios = "
    SELECT nombre, apellido, correo, rol
    FROM usuario
    ORDER BY nombre ASC
";
$stmtUsuarios = $pdo->prepare($queryUsuarios);
$stmtUsuarios->execute();
$usuarios = $stmtUsuarios->fetchAll(PDO::FETCH_ASSOC);
?>
<script src="../javascript/NotificacionRegistro.js"></script>

<!-- Campo oculto para pasar el mensaje de PHP a JavaScript -->
<?php if (isset($_SESSION['mensaje'])): ?>
    <input type="hidden" id="mensaje-sesion" value="<?php echo htmlspecialchars($_SESSION['mensaje']); ?>">
    <?php unset($_SESSION['mensaje']); ?>
<?php endif; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Registros de Entrada y Salida</title>
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
<br>
<div style="margin-top: 100px;"> <!-- Ajusta este margen según la altura del encabezado -->
    <h2>Registros de Entrada y Salida de Usuarios</h2>
</div>
<table border="1">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Hora de Entrada</th>
            <th>Hora de Salida</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($registros as $registro): ?>
            <tr>
                <td><?php echo htmlspecialchars($registro['nombre']); ?></td>
                <td><?php echo htmlspecialchars($registro['apellido']); ?></td>
                <td><?php echo htmlspecialchars($registro['horaEntrada']); ?></td>
                <td><?php echo htmlspecialchars($registro['horaSalida'] ?? 'N/A'); ?></td>
                <td><?php echo htmlspecialchars($registro['status']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

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
