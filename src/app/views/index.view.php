<!DOCTYPE html>
<html lang=es>
<head>
    <?php
        $titulo = "UNLu PAW";
        require __DIR__ . '/parts/head.view.php';
    ?>
    <link rel="stylesheet" type="text/css" href="css/carrusel.css">
    <style>

        main{
            display: grid;
            grid-template-areas:    "carrousel"
                                    "buttons";
            grid-template-rows: auto 1fr;
        }

        .carrousel{
            grid-area: carrousel;
        }
        
        .buttons nav ul{
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
        

        /* Estilos para el carrusel */

        .section-carrusel {
            margin: 4rem auto 0 auto;
        }

        #slider-container {
            position: relative;
            width: 80vw;
            height: 400px;
            overflow: hidden;
        }

        #slider {
            position: absolute;
            top: 0;
            left: 0;
            width: 80vw;
            height: 400px;
            transition: transform 0.5s ease-in-out;
        }

        .slide {
            display: none;
            width: 80vw;
            height: 400px;
        }

        #loading-bar {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 5px;
            background-color: #000;
            transition: width 0.3s ease-in-out;
        }

        #thumbs {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 10px 0;
            text-align: center;
        }

        .thumb {
            display: inline-block;
            width: 15px;
            height: 15px;
            margin: 0 5px;
            border-radius: 15px;
            border: solid 1px black;
            background-color: #FFF;
            cursor: pointer;
        }

        .thumb-active {
            background-color: var(--ulh-green);
        }

        .thumb-mouseover {
            background-color: var(--ulh-yellow);
        }

        #prev-btn,
        #next-btn {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            width: 40px;
            height: 40px;
            cursor: pointer;
        }

        #prev-btn {
            left: 10px;
        }

        #prev-btn img {
            transform: scaleX(-1);
        }

        #next-btn {
            right: 10px;
        }

    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <section class="section-carrusel">
            <div id="slider-container" class="carrusel">
                <div id="slider"></div>
                <div id="loading-bar"></div>
                <div id="thumbs"></div>
                <div id="prev-btn"><img src="images/carrusel-arrow.png" width="40" height="40"/></div>
                <div id="next-btn"><img src="images/carrusel-arrow.png" width="40" height="40"/></div>
            </div>
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
    <script>
        <?php require __DIR__ . '/../js/carrusel.js' ?>
    </script>
</body>
</html>
