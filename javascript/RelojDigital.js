// Función para iniciar el reloj y actualizar cada segundo
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;

    // Agregar un cero a los números menores de 10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);

    // Actualizar el reloj con el formato adecuado (hora: minuto: segundo AM/PM)
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;

    // Actualizar la fecha en formato completo
    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear;
    document.getElementById("date").innerHTML = date;

    // Llamar nuevamente a la función cada 500ms (medio segundo)
    var time = setTimeout(function() { startTime() }, 500);
}

// Función para agregar un cero a los números menores que 10
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}

// Función para obtener la hora en formato YYYY-MM-DD HH:MM:SS
function obtenerHoraActual() {
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    const seconds = String(now.getSeconds()).padStart(2, '0');

    // Formato final: YYYY-MM-DD HH:MM:SS
    return `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
}

// Función para registrar la hora de entrada
function registrarEntrada() {
    const horaEntrada = obtenerHoraActual();
    const nombreUsuario = document.getElementById('nombreUsuario').value;

    if (nombreUsuario) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "controllers/registroEntradaSalida.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText);  // Muestra la respuesta del servidor
            }
        };

        xhr.send("nombreUsuario=" + nombreUsuario + "&hora=" + horaEntrada + "&accion=entrada");
    } else {
        alert("Por favor, ingrese un nombre de usuario válido.");
    }
}

// Función para registrar la hora de salida
function registrarSalida() {
    const horaSalida = obtenerHoraActual();
    const nombreUsuario = document.getElementById('nombreUsuario').value;

    if (nombreUsuario) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "controllers/registroEntradaSalida.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                alert(xhr.responseText);  // Muestra la respuesta del servidor
            }
        };

        xhr.send("nombreUsuario=" + nombreUsuario + "&hora=" + horaSalida + "&accion=salida");
    } else {
        alert("Por favor, ingrese un nombre de usuario válido.");
    }
}


// Iniciar el reloj
startTime();
