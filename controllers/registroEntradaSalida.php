<?php
session_start();
require_once '../db/conexion.php';

try {
    if (isset($_POST['nombreUsuario']) && isset($_POST['accion']) && isset($_POST['hora'])) {
        $nombreUsuario = $_POST['nombreUsuario'];
        $hora = $_POST['hora'];
        $accion = $_POST['accion'];

        // Verificar si el usuario existe
        $sql = "SELECT id_usuario FROM usuario WHERE nombreUsuario = :nombreUsuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombreUsuario', $nombreUsuario);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $usuarioId = $stmt->fetchColumn();  // Obtiene el id_usuario

            if ($accion == 'entrada') {
                // Registrar la hora de entrada
                $sql = "INSERT INTO relojchecardor (id_usuario, horaEntrada) 
                        VALUES (:usuarioId, :horaEntrada)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':usuarioId', $usuarioId);
                $stmt->bindParam(':horaEntrada', $hora);

                if ($stmt->execute()) {
                    echo "Hora de entrada registrada exitosamente.";
                } else {
                    echo "Error al registrar la entrada. Inténtalo de nuevo.";
                }
            } elseif ($accion == 'salida') {
                // Verificar si hay una entrada sin salida registrada
                $sql = "SELECT id_relojchecar FROM relojchecardor 
                        WHERE id_usuario = :usuarioId AND horaSalida IS NULL";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':usuarioId', $usuarioId);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    // Registrar la hora de salida
                    $sql = "UPDATE relojchecardor SET horaSalida = :horaSalida 
                            WHERE id_usuario = :usuarioId AND horaSalida IS NULL";
                    $stmt = $pdo->prepare($sql);
                    $stmt->bindParam(':usuarioId', $usuarioId);
                    $stmt->bindParam(':horaSalida', $hora);

                    if ($stmt->execute()) {
                        echo "Hora de salida registrada exitosamente.";
                    } else {
                        echo "Error al registrar la salida. Inténtalo de nuevo.";
                    }
                } else {
                    // No se encontró una entrada sin salida registrada
                    echo "Error: No se puede registrar la salida sin haber registrado una entrada.";
                }
            }
        } else {
            echo "Error: Usuario no encontrado.";
        }
    } else {
        echo "Datos incompletos.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>
