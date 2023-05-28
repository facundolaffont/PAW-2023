document.addEventListener("DOMContentLoaded", () => {
    const images = [
        'https://fastly.picsum.photos/id/110/600/300.jpg?hmac=le4JQdpq6E8q7_4n0sm6s0u3HCHF2EBXNxNfdX5yFFE',
        'https://fastly.picsum.photos/id/123/600/300.jpg?hmac=ndRm4nk5U-MKG46TFNkafmvULEKZ1iPAtqj_uQ6T-s4',
        'https://fastly.picsum.photos/id/820/600/300.jpg?hmac=WduOsSHELvoldEAv95pW9a6HcGe-xJKqsCUdFIWcovM',
        'https://fastly.picsum.photos/id/1036/600/300.jpg?hmac=ehdcmkMujDc6endZ47O_f0czlJTlCRDDlOmWZO43_h4'
    ];

    console.debug("Se cargará el carrusel...");
    new Carousel(document.querySelector(".section-carousel"), images);
    console.debug("Se cargó y habilitó el carrusel.");
});