document.addEventListener("DOMContentLoaded", () => {
    const images = [
        'https://picsum.photos/1100/300',
        'https://picsum.photos/1101/300',
        'https://picsum.photos/1102/300',
        'https://picsum.photos/1103/300'
    ];

    console.debug("Se cargará el carrusel...");
    new Carousel(document.querySelector(".section-carousel"), images);
    console.debug("Se cargó y habilitó el carrusel.");
});