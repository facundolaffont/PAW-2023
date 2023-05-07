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
    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <section>
            <ul class="carrusel">
                <li>
                    <figure class="carrusel-item">
                        <img src="images/placeholder-image.png" alt="Fotografía del edificio del hospital.">
                        <figcaption>Descripción.</figcaption>
                    </figure>
                </li>
                <li>
                    <figure class="carrusel-item">
                        <img src="images/placeholder-image.png" alt="Fotografía del interior del hospital.">
                        <figcaption>Descripción.</figcaption>
                    </figure>
                </li>
                <li>
                    <figure class="carrusel-item">
                        <img src="images/placeholder-image.png" alt="Fotografía tomógrafo.">
                        <figcaption>Descripción.</figcaption>
                    </figure>
                </li>
                <li>
                    <figure class="carrusel-item">
                        <img src="images/placeholder-image.png" alt="Fotografía tomógrafo.">
                        <figcaption>Descripción.</figcaption>
                    </figure>
                </li>
                <li>
                    <figure class="carrusel-item">
                        <img src="images/placeholder-image.png" alt="Fotografía tomógrafo.">
                        <figcaption>Descripción.</figcaption>
                    </figure>
                </li>
            </ul>
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
