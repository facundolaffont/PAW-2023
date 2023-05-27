class Carousel {

    /**
     * Constructor de la clase Carousel.
     * 
     * @param {HTMLElement} container - Contenedor en el cual se agregarán los nuevos elementos que mostrarán el carrusel.
     * @param {Array.<String>} imageSources - Imágenes que serán mostradas en el carrusel.
     */
    constructor(container, imageSources) {
        
        console.debug("Se ejecuta el constructor de Carousel.");

        // Inicializaciones.
        this.#imageSources = imageSources;
        this.#currentIndex = 0;

        /**
         * Genera la siguiente estructura para el carrusel:
         * 
         *  <div id="slider-container" class="carousel">
         *      <div id="slider"></div>
         *      <div id="loading-bar"></div>
         *      <div id="thumbs"></div>
         *      <div id="prev-btn"><img src="images/carousel-arrow.png" width="40" height="40"/></div>
         *      <div id="next-btn"><img src="images/carousel-arrow.png" width="40" height="40"/></div>
         *  </div>
         */
        this.#slider = document.createElement("div");
        this.#slider.setAttribute("id","slider");

        this.#loadingBar = document.createElement("div");
        this.#loadingBar.setAttribute("id","loading-bar");

        this.#thumbs = document.createElement("div");
        this.#thumbs.setAttribute("id","thumbs");

        let prevBtnImg = document.createElement("img");
        prevBtnImg.setAttribute("src","images/carousel-arrow.png");
        prevBtnImg.setAttribute("width","40");
        prevBtnImg.setAttribute("height","40");

        this.#prevBtn = document.createElement("div");
        this.#prevBtn.setAttribute("id","prev-btn");
        this.#prevBtn.appendChild(prevBtnImg);

        let nextBtnImg = document.createElement("img");
        nextBtnImg.setAttribute("src","images/carousel-arrow.png");
        nextBtnImg.setAttribute("width","40");
        nextBtnImg.setAttribute("height","40");

        this.#nextBtn = document.createElement("div");
        this.#nextBtn.setAttribute("id","next-btn");
        this.#nextBtn.appendChild(nextBtnImg);

        this.#carousel = document.createElement("div");
        this.#carousel.setAttribute("id","slider-container");
        this.#carousel.setAttribute("class","carousel");
        this.#carousel.appendChild(this.#slider);
        this.#carousel.appendChild(this.#loadingBar);
        this.#carousel.appendChild(this.#thumbs);
        this.#carousel.appendChild(this.#prevBtn);
        this.#carousel.appendChild(this.#nextBtn);

        container.appendChild(this.#carousel);

        // TODO: cargar el .css para el carrusel.

        // Establece una función callback que se ejecuta cuando se presione una tecla.
        this.#handleKeyPress.bind(this);
        document.addEventListener("keydown", this.#handleKeyPress);

        this.#loadImages(this.#imageSources, this.#imageSources.length);
    }


    /* Private */
    #carousel;
    #slider;
    #loadingBar;
    #thumbs;
    #prevBtn;
    #nextBtn;
    #imageSources;
    #currentIndex; // Índice de la imagen mostrada actualmente.

    // Se ejecuta cada vez que se presiona una tecla, y permite
    // cambiar las imáganes del slide con las flechas derecha e
    // izquierda.
    #handleKeyPress(event) {

        console.debug("Se ejecuta el método Carousel.handleKeyPress.");

        // Flecha izquierda.
        if (event.keyCode === 37) {
            this.#currentIndex =
                (this.#currentIndex === 0)
                ? this.#imageSources.length - 1
                : this.#currentIndex - 1;
            this.#updateSlider();
        
        // Flecha derecha.
        } else if (event.keyCode === 39) {
            this.#currentIndex =
                (this.#currentIndex === this.#imageSources.length - 1)
                ? 0
                : this.#currentIndex + 1;
            this.#updateSlider();
        }

    }

    #loadImages(images, totalImages) {

        console.debug("Se ejecuta el método Carousel.loadImages.");

        let loadedImages = 0; // Almacena la cantidad de imágenes que ya se cargaron.
    
        images.forEach.call(this, (image, index) => {
            let img = new Image();
    
            // Establece un evento que se ejecutará cuando se cargue la imagen,
            // que calcula el progreso de la carga, lo muestra, e inicia el
            // carrusel si se terminaron de cargar todas las imágenes.
            img.onload = function() {
                loadedImages++;
                let progress = (loadedImages / totalImages) * 100;
                this.#loadingBar.style.width = progress + '%';
                if (loadedImages === totalImages) {
                    this.#startSlider(totalImages);
                }
            };
    
            // Inhabilita el drag de las imágenes, y permite que funcione
            // correctamente el swipe.
            img.ondragstart = () => { return false; };
    
            // Agrega las imágenes al DOM.
            img.src = image;
            img.classList.add('slide');
            this.#slider.appendChild(img);
    
            // Crea los thumbs, les añade los respectivos callbacks,
            // y los agrega al DOM.
            let thumb = document.createElement('div');
            thumb.classList.add('thumb');
            thumb.addEventListener('click', (event) => {
                this.#currentIndex = index;
                event.target.classList.remove('thumb-mouseover');
                updateSlider();
            });
            thumb.addEventListener('mouseover', (event) => {
                if (this.#currentIndex != index) {
                    event.target.classList.add('thumb-mouseover');
                    updateSlider();
                }
            });
            thumb.addEventListener('mouseout', (event) => {
                event.target.classList.remove('thumb-mouseover');
                updateSlider();
            });
            this.#thumbs.appendChild(thumb);
    
            // Actualiza el carrusel y establece cuál es el thumb activo.
            this.#updateSlider();
        });
    }

    #startSlider(totalImages) {
    
        console.debug("Se ejecuta el método Carousel.startSlider.");

        this.#loadingBar.style.display = 'none';
        
        // Cambia la propiedad display de las imágenes del carrusel a block.
        let slides = document.querySelectorAll('.slide');
        slides[this.#currentIndex].style.display = 'block';
    
        // let firstSlideClone = slides[0].cloneNode(true);
        // let lastSlideClone = slides[totalSlides - 1].cloneNode(true);
    
        // slider.appendChild(firstSlideClone);
        // slider.insertBefore(lastSlideClone, slides[0]);
    
        // slider.style.transform = `translateX(-${(currentIndex + 1) * 100}%)`;
    
        // Agrega una función callback que se ejecutará cuando se haga clic en
        // el botón de la flecha izquierda del carrusel.
        this.#prevBtn.addEventListener('click', () => {
            this.#currentIndex =
                (this.#currentIndex === 0)
                ? totalImages - 1
                : this.#currentIndex - 1;
            // currentIndex--;
            this.#updateSlider();
        });
    
        // Agrega una función callback que se ejecutará cuando se haga clic en
        // el botón de la flecha derecha del carrusel.
        this.#nextBtn.addEventListener('click', () => {
            this.#currentIndex =
                (this.#currentIndex === totalImages - 1)
                ? 0
                : this.#currentIndex + 1;
            // currentIndex++;
            this.#updateSlider();
        });
    
        // Establece las funciones callback para cuando se cliquee
        // o se presione en el smartphone.
        this.#slider.addEventListener('mousedown', handleSwipeStart);
        this.#slider.addEventListener('touchstart', handleSwipeStart);
    
        // Establece las funciones callback para cuando se mueva
        // el mouse o se mueva el dedo.
        this.#slider.addEventListener('mousemove', handleSwipeMove);
        this.#slider.addEventListener('touchmove', handleSwipeMove);
    
        // Establece las funciones callback para cuando se libere
        // el clic o se quite el dedo de la pantalla del smartphone.
        this.#slider.addEventListener('mouseup', handleSwipeEnd);
        this.#slider.addEventListener('touchend', handleSwipeEnd);
    
        let startX;
        let currentX;
        // let initialTranslateX;
        // let currentTranslateX;
        let swipeStarted = false;
    
        function handleSwipeStart(event) {

            console.debug("Se ejecuta el método Carousel.startSlider.handleSwipeStart.");
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
            
            console.debug("Se ejecuta el método Carousel.startSlider.handleSwipeMove.");

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
                    this.#currentIndex =
                        (this.#currentIndex === slides.length - 1)
                        ? 0
                        : this.#currentIndex + 1;
                    this.#updateSlider();
                    startX = currentX;
                } else if (diffX < -50) {
                    this.#currentIndex =
                        (this.#currentIndex === 0)
                        ? slides.length - 1
                        : this.#currentIndex - 1;
                    this.#updateSlider();
                    startX = currentX;
                }
    
            }
        }
    
        function handleSwipeEnd(event) {

            console.debug("Se ejecuta el método Carousel.startSlider.handleSwipeMove.");
            console.debug(`handleSwipeEnd(${event})`);
            console.debug(`event.type = ${event.type}`);
    
            // let newIndex = Math.round(-currentTranslateX / 100);
            // currentIndex = newIndex;
            // updateSlider();
    
            swipeStarted = false;

        }
    }

    #updateSlider() {

        console.debug("Se ejecuta el método Carousel.updateSlider.");

        // Deja de mostrar todas las imágenes del carrusel, excepto la
        // que corresponde.
        let slides = document.querySelectorAll('.slide'); // Obtiene todas las imágenes del carrusel.
        slides.forEach(slide => slide.style.display = 'none');
        slides[this.#currentIndex].style.display = 'block';
    
        // Deja activado el thumb que corresponde.
        let thumbs = document.querySelectorAll('.thumb'); 
        thumbs.forEach((thumb, index) => {
            if (index === this.#currentIndex)
                thumb.classList.add('thumb-active');
            else
                thumb.classList.remove('thumb-active');
        });
    
    }
}