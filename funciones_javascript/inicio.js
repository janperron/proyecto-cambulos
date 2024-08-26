// Espera a que el contenido del DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', function() {
    // Selecciona todas las imágenes dentro del carrusel
    const slides = document.querySelectorAll('.slide');
    let currentIndex = 0; // Índice actual de la imagen mostrada

    // Función para mostrar la siguiente imagen en el carrusel
    function showNextSlide() {
        slides[currentIndex].classList.remove('active'); // Quita la clase 'active' de la imagen actual
        currentIndex = (currentIndex + 1) % slides.length; // Incrementa el índice y lo reinicia si llega al final
        slides[currentIndex].classList.add('active'); // Agrega la clase 'active' a la nueva imagen
    }

    // Cambia de imagen cada 3 segundos llamando a showNextSlide
    setInterval(showNextSlide, 3000); 
});

// Añade un event listener a todos los enlaces del menú de navegación
document.querySelectorAll('header ul li a').forEach(link => {
    link.addEventListener('click', function(event) {
        // Previene la recarga de la página si el enlace apunta a la página actual
        if (link.href === window.location.href) {
            event.preventDefault();
        }
    });
});