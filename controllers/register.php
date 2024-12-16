<?php
session_start();
require_once '../db/conexion.php';

try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recibe los datos del formulario
        $nombre = $_POST['nombre'];
        $apellidos = $_POST['apellidos'];
        $email = $_POST['email'];
        $rol = $_POST['rol'];
        $nomuser = $_POST['nomuser'];

        // Consulta SQL para insertar el nuevo usuario
        $sql = "INSERT INTO usuario (nombre, apellido, correo, rol, nombreUsuario) 
                VALUES (:nombre, :apellidos, :email, :rol, :nomuser)";
        $stmt = $pdo->prepare($sql);

        // Vincula los valores a los parámetros
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellidos', $apellidos);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':rol', $rol);
        $stmt->bindParam(':nomuser', $nomuser);

        // Ejecuta la consulta y verifica si la inserción fue exitosa
        if ($stmt->execute()) {
            $_SESSION['mensaje'] = "Registro exitoso. Ahora puedes iniciar sesión.";
            header("Location: ../Administrador/IndexAdmin.php");
            exit();
        } else {
            echo "Error al registrar. Inténtalo de nuevo.";
        }
    }
} catch (PDOException $e) {
    echo "Error en el registro: " . $e->getMessage();
}
?>
