document.addEventListener("DOMContentLoaded", function() {
    // Verificar si hay un mensaje de sesión en PHP y mostrarlo
    const mensaje = document.getElementById("mensaje-sesion")?.value;
    if (mensaje) {
        mostrarNotificacion(mensaje);
    }

    // Función para mostrar la notificación
    function mostrarNotificacion(mensaje) {
        // Crear contenedor de notificación
        const notificacion = document.createElement("div");
        notificacion.classList.add("notificacion");
        notificacion.innerHTML = `
            <span class="close-btn" onclick="this.parentElement.style.display='none'">&times;</span>
            ${mensaje}
        `;
        
        // Añadir notificación al inicio del body
        document.body.prepend(notificacion);

        // Cerrar automáticamente la notificación después de unos segundos
        setTimeout(() => notificacion.style.display = "none", 5000);
    }
});
