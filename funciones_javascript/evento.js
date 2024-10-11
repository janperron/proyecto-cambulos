function mostrarCamposMenores() {
    var selectElement = document.getElementById("viaja-con-menores");
    var camposMenores = document.getElementById("campos-menores");
    
    if (selectElement.value === "si") {
        camposMenores.style.display = "block";
    } else {
        camposMenores.style.display = "none";
    }
}
     // Función para mostrar la alerta si el parámetro "alerta" está presente en la URL
     function mostrarAlerta() {
        const urlParams = new URLSearchParams(window.location.search);
        if (urlParams.get('alerta') === 'exito') {
            alert('evento regiarado °_°');
        }
    }

// Función para hacer que la página parpadee
function titilarPagina() {
    // Añadir clase para parpadeo
    document.body.classList.add('parpadeo');

    // Quitar clase después de 500ms
    setTimeout(function() {
        document.body.classList.remove('parpadeo');
    }, 500);
}