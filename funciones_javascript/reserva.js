
 // Establecer el valor mínimo en el campo de fecha y hora de llegada con la fecha y hora actual
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0'); // Meses empiezan desde 0
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');

    // Formato para min: "YYYY-MM-DDTHH:MM"
    const currentDateTime = `${year}-${month}-${day}T${hours}:${minutes}`;

    // Establecer el valor mínimo en el campo de fecha y hora de llegada
    document.getElementById('llegada').setAttribute('min', currentDateTime);
    // Evitar recarga de la página al hacer clic en el enlace actual del menú de navegación
    document.querySelectorAll('header ul li a').forEach(link => {
        link.addEventListener('click', function(event) {
        if (link.href === window.location.href) {
                event.preventDefault(); // Previene la recarga si estás en la misma página
         }
    });
});

       // Función para mostrar la alerta si el parámetro "alerta" está presente en la URL
       function mostrarAlerta() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('alerta') === 'exito') {
            alert('mamahuevo glu glu');
        }
    }
    // Ejecutar la función cuando la página se carga
    window.onload = mostrarAlerta;