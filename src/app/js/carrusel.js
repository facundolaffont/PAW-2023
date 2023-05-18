// Establece la dirección de las imágenes que se van a cargar.
const images = [
    'https://picsum.photos/1100/300',
    'https://picsum.photos/1101/300',
    'https://picsum.photos/1102/300',
    'https://picsum.photos/1103/300'
];

let currentIndex = 0; // Índice de la imagen mostrada actualmente.
let totalImages = images.length;

// Guarda en variables los divs del carrusel.
let slider = document.getElementById('slider');
let loadingBar = document.getElementById('loading-bar');
let thumbs = document.getElementById('thumbs');
let prevBtn = document.getElementById('prev-btn');
let nextBtn = document.getElementById('next-btn');

// Establece una función callback que se ejecuta cuando se presione una tecla.
document.addEventListener("keydown", handleKeyPress);

function loadImages() {
    let loadedImages = 0; // Almacena la cantidad de imágenes que ya se cargaron.

    images.forEach((image, index) => {
        let img = new Image();

        // Establece un evento que se ejecutará cuando se cargue la imagen,
        // que calcula el progreso de la carga, lo muestra, e inicia el
        // carrusel si se terminaron de cargar todas las imágenes.
        img.onload = function() {
            loadedImages++;
            let progress = (loadedImages / totalImages) * 100;
            loadingBar.style.width = progress + '%';
            if (loadedImages === totalImages) {
                startSlider();
            }
        };

        // Inhabilita el drag de las imágenes, y permite que funcione
        // correctamente el swipe.
        img.ondragstart = () => { return false; };

        // Agrega las imágenes al DOM.
        img.src = image;
        img.classList.add('slide');
        slider.appendChild(img);

        // Crea los thumbs, les añade los respectivos callbacks,
        // y los agrega al DOM.
        let thumb = document.createElement('div');
        thumb.classList.add('thumb');
        thumb.addEventListener('click', (event) => {
            currentIndex = index;
            event.target.classList.remove('thumb-mouseover');
            updateSlider();
        });
        thumb.addEventListener('mouseover', (event) => {
            if (currentIndex != index) {
                event.target.classList.add('thumb-mouseover');
                updateSlider();
            }
        });
        thumb.addEventListener('mouseout', (event) => {
            event.target.classList.remove('thumb-mouseover');
            updateSlider();
        });
        thumbs.appendChild(thumb);

        // Actualiza el carrusel y establece cuál es el thumb activo.
        updateSlider();
    });
}

// Se ejecuta cada vez que se presiona una tecla, y permite
// cambiar las imáganes del slide con las flechas derecha e
// izquierda.
function handleKeyPress(event) {
    if (event.keyCode === 37) { // Flecha izquierda.
        currentIndex = (currentIndex === 0) ? totalImages - 1 : currentIndex - 1;
        updateSlider();
    } else if (event.keyCode === 39) { // Flecha derecha.
        currentIndex = (currentIndex === totalImages - 1) ? 0 : currentIndex + 1;
        updateSlider();
    }
}

function startSlider() {
    loadingBar.style.display = 'none';
    
    // Cambia la propiedad display de las imágenes del carrusel a block.
    let slides = document.querySelectorAll('.slide');
    slides[currentIndex].style.display = 'block';

    // let firstSlideClone = slides[0].cloneNode(true);
    // let lastSlideClone = slides[totalSlides - 1].cloneNode(true);

    // slider.appendChild(firstSlideClone);
    // slider.insertBefore(lastSlideClone, slides[0]);

    // slider.style.transform = `translateX(-${(currentIndex + 1) * 100}%)`;

    // Agrega una función callback que se ejecutará cuando se haga clic en
    // el botón de la flecha izquierda del carrusel.
    prevBtn.addEventListener('click', () => {
        currentIndex = (currentIndex === 0) ? totalImages - 1 : currentIndex - 1;
        // currentIndex--;
        updateSlider();
    });

    // Agrega una función callback que se ejecutará cuando se haga clic en
    // el botón de la flecha derecha del carrusel.
    nextBtn.addEventListener('click', () => {
        currentIndex = (currentIndex === totalImages - 1) ? 0 : currentIndex + 1;
        // currentIndex++;
        updateSlider();
    });

    // Establece las funciones callback para cuando se cliquee
    // o se presione en el smartphone.
    slider.addEventListener('mousedown', handleSwipeStart);
    slider.addEventListener('touchstart', handleSwipeStart);

    // Establece las funciones callback para cuando se mueva
    // el mouse o se mueva el dedo.
    slider.addEventListener('mousemove', handleSwipeMove);
    slider.addEventListener('touchmove', handleSwipeMove);

    // Establece las funciones callback para cuando se libere
    // el clic o se quite el dedo de la pantalla del smartphone.
    slider.addEventListener('mouseup', handleSwipeEnd);
    slider.addEventListener('touchend', handleSwipeEnd);

    let startX;    
    let currentX;
    // let initialTranslateX;
    // let currentTranslateX;
    let swipeStarted = false;

    function handleSwipeStart(event) {
        console.debug(`handleSwipeStart(${event})`);
        console.debug(`e.type = ${event.type}`);

        // Indica que comenzó el swipe.
        swipeStarted = true;

        // Almacena la posición actual del eje horizontal del mouse,
        // o, en caso de un smartphone, la posición en donde se toca
        // la pantalla con el dedo.
        startX =
            event.type === 'touchstart'
            ? event.touches[0].clientX
            : event.clientX;
        
        // initialTranslateX = -currentIndex * 100;
        // currentTranslateX = initialTranslateX;

        // slider.style.transition = 'none';
        // slider.style.transform = `translateX(${currentTranslateX}%)`;

        console.debug(`startX = ${startX}`);
    }

    function handleSwipeMove(event) {
        if (swipeStarted) {
            console.debug(`handleSwipeMove(${event})`);
            console.debug(`event.type = ${event.type}`);
            
            currentX =
                event.type === 'touchmove'
                ? event.touches[0].clientX
                : event.clientX;
            console.debug(`currentX = ${currentX}`);

            let diffX = startX - currentX;
            console.debug(`diffX = ${diffX}`);

            // currentTranslateX = initialTranslateX - (diffX / slider.offsetWidth) * 100;
            // slider.style.transform = `translateX(${currentTranslateX}%)`;

            // Determina si, según el movimiento del swipe, se debe cambiar la imagen, y a cuál.
            if (diffX > 50) {
                currentIndex = (currentIndex === slides.length - 1) ? 0 : currentIndex + 1;
                updateSlider();
                startX = currentX;
            } else if (diffX < -50) {
                currentIndex = (currentIndex === 0) ? slides.length - 1 : currentIndex - 1;
                updateSlider();
                startX = currentX;
            }

        }
    }

    function handleSwipeEnd(event) {
        console.debug(`handleSwipeEnd(${event})`);
        console.debug(`event.type = ${event.type}`);

        // let newIndex = Math.round(-currentTranslateX / 100);
        // currentIndex = newIndex;
        // updateSlider();

        swipeStarted = false;
    }
}

function updateSlider() {

    // Deja de mostrar todas las imágenes del carrusel, excepto la
    // que corresponde.
    let slides = document.querySelectorAll('.slide'); // Obtiene todas las imágenes del carrusel.
    slides.forEach(slide => slide.style.display = 'none');
    slides[currentIndex].style.display = 'block';

    // Deja activado el thumb que corresponde.
    let thumbs = document.querySelectorAll('.thumb'); 
    thumbs.forEach((thumb, index) => {
        if (index === currentIndex)
            thumb.classList.add('thumb-active');
        else
            thumb.classList.remove('thumb-active');
    });

}

loadImages();