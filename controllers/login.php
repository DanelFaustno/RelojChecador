<?php
session_start();
require_once '../db/conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    // Preparar la consulta con PDO
    $sql = "SELECT * FROM admin WHERE correo = :email LIMIT 1";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() == 1) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($pass == $row['contraseña']) {
            // Guardar información del usuario en la sesión
            $_SESSION['user_id'] = $row['id_admin'];
            $_SESSION['nombre'] = $row['nombre'];

            // Redirigir a la página de administración
            header("Location: ../Administrador/IndexAdmin.php");
            exit();
        } else {
            echo "Contraseña incorrecta";
        }
    } else {
        echo "Correo no registrado";
    }
}
?>
