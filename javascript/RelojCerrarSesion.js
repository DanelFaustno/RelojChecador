// Función para mostrar la hora actual
function updateClock() {
    var now = new Date();
    var hours = now.getHours().toString().padStart(2, '0');
    var minutes = now.getMinutes().toString().padStart(2, '0');
    var seconds = now.getSeconds().toString().padStart(2, '0');
    var timeString = hours + ':' + minutes + ':' + seconds;
    document.getElementById('clock').innerHTML = timeString;
}

// Actualizamos el reloj cada segundo
setInterval(updateClock, 1000);

// Llamamos a la función una vez al cargar la página para que el reloj no tarde en mostrarse
updateClock();
