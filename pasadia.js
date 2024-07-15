document.addEventListener('DOMContentLoaded', () => {
    let carouselIndex = 0;
    const images = document.querySelectorAll('.carousel-image');

    function showImage(index) {
        images.forEach((img, i) => {
            img.classList.remove('active');
            if (i === index) {
                img.classList.add('active');
            }
        });
    }

    function nextImage() {
        carouselIndex = (carouselIndex + 1) % images.length;
        showImage(carouselIndex);
    }

    setInterval(nextImage, 3000);

    document.querySelector('#cantidad').addEventListener('input', updateTotal);
    document.querySelector('#precio-unitario').addEventListener('input', updateTotal);

    function updateTotal() {
        const cantidad = parseFloat(document.querySelector('#cantidad').value) || 0;
        const precioUnitario = parseFloat(document.querySelector('#precio-unitario').value) || 0;
        document.querySelector('#precio-total').value = (cantidad * precioUnitario).toFixed(2);
    }
});

function cancelarReserva() {
    if (confirm('¿Estás seguro de que deseas cancelar la reserva?')) {
        document.querySelector('form').reset();
        document.querySelector('#precio-total').value = '';
    }
}
