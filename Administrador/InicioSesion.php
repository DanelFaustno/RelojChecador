<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesión</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/inicioadmin.css">
</head>
<body>
<a href="../index.php" class="home-icon">
    <i class="fas fa-home"></i> 
</a>

<div class="container">
    <div class="form-background">
        <h1>Iniciar sesión</h1>
        <form action="../controllers/login.php" method="POST">
            <input type="email" name="email" placeholder="Correo Electrónico" required>
            <br>
            <input type="password" name="pass" placeholder="Contraseña" required>
            <br><br>
            <input type="submit" value="Ingresar">
        </form>
    </div>

</div>

</body>
</html>
