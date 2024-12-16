<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/inicioadmin.css">
</head>
<body>

<a href="../index.php" class="home-icon">
    <i class="fas fa-home"></i> 
</a>

<div class="container">
    <div class="form-background">
        <h1>Registro de Usuario</h1>
        <form action="../controllers/register.php" method="POST">
            <!-- Campo de nombre -->
            <input type="text" name="nombre" placeholder="Nombre" required>
            <br>
            <!-- Campo de apellidos -->
            <input type="text" name="apellidos" placeholder="Apellidos" required>
            <br>
            <!-- Campo de correo -->
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <br>
            <!-- Campo de rol -->
            <input type="text" name="rol" placeholder="Rol" required>
            <br>
            <!-- Campo de nombre de usuario -->
            <input type="text" name="nomuser" placeholder="Nombre de Usuario" required>
            <br><br>
            <!-- Botones -->
            <input type="submit" value="Registrarse">
            <br><br>
            <a href="IndexAdmin.php" class="cancel-link">Cancelar</a>
        </form>
    </div>
</div>

</body>
</html>
