<!DOCTYPE html>
<html lang=es>
<head>
    <?php
        $titulo = "UNLu PAW";
        require __DIR__ . '/parts/head.view.php';
    ?>
    <script>
        // TODO: cambiar el archivo .js que se agrega, para que sea la app,
        // y para que se cargue el componente Carousel.
        <?php require __DIR__ . '/../js/components/Carousel.js' ?>
        <?php require __DIR__ . '/../js/index.js' ?>
    </script>
    <style>

        /**
         * Aplica a:
         *  + Desktop.
         *
         * No aplica a:
         *  + Desktop en modo Responsive Design (Galaxy S20 Linux): orientación portrait y landscape.
         *  + Desktop con Mobile Simulator (sólo tiene orientación portrait): Galaxy S21.
         */
        @media screen and (width >= 1130px) {

            .carousel-margin {
                margin: 4rem auto 0 auto;
            }

        }

        /**
         * Aplica a:
         *  + Desktop en modo Responsive Design (Galaxy S20 Linux): orientación portrait y landscape.
         *  + Desktop con Mobile Simulator (sólo tiene orientación portrait): Galaxy S21.
         *
         * No aplica a:
         *  + Desktop.
         */
        @media screen and (width < 1130px) {
            
            .carousel-margin {
                margin: 2rem auto 0 auto;
            }

        }

        main {
            display: grid;
            grid-template-areas:    "carrousel"
                                    "buttons";
            grid-template-rows: auto 1fr;
        }
        
        .section-carousel {
            border: solid 1px black;
        }

        .buttons nav ul {
            grid-area: buttons;
            display: grid;
            width: 100%;
            margin-top: 5rem;
            grid-template-rows: repeat(6, 1fr);
            gap: 2rem;
            place-items: center;
        }

        .buttons nav ul li{
            width: 100%;
            place-items: center;
            display: grid;

            border: 5px solid var(--ulh-green);
            border-radius: 10px;
        }

    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <section class="section-carousel carousel-margin">
        </section>
        <section class="buttons">
            <nav>
                <ul>
                    <li class="button"><p><a href=servicios>Servicios</a></p></li>
                    <li class="button"><p><a href=pedir-turno>Solicitar turno</a></p></li>
                    <li class="button"><p><a href=mis-turnos>Mis turnos</a></p></li>
                    <li class="button"><p><a href=quienes-somos>¿Quiénes somos?</a></p></li>
                    <li class="button"><p><a href=contacto>Contacto</a></p></li>
                    <li class="button"><p><a href=noticias>Noticias</a></p></li>
                </ul>
            </nav>
        </section>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
