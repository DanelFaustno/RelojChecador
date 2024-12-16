<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Entrada y Salida</title>
    <link rel="stylesheet" href="css/estilos.css">
</head>
<body>
    <header class="main-header">
        <h1>Reloj Checador</h1>
        <nav>
            <a href="Administrador/InicioSesion.php" class="login-link">Iniciar Sesión</a>
        </nav>  
    </header>
    <br>
   
    <div class="main-container">
        <div class="container">
            <div id="clockdate">
                <div class="clockdate-wrapper">
                    <div id="clock"></div>
                    <div id="date"></div>
                </div>
            </div>
        
            
            <div class="register-textbox">
    <input type="text" id="nombreUsuario" name="nombreUsuario" placeholder=" ">
    <label for="nombreUsuario">Nombre de Usuario</label>
</div>


        <div class="buttons">
            <button class="entry-btn" onclick="registrarEntrada()">Entrada</button>
            <button class="exit-btn" onclick="registrarSalida()">Salida</button>
        </div>
    </div>
    
    <script src="javascript/RelojDigital.js"></script>
</body>
</html>
