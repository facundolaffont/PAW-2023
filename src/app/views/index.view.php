<!DOCTYPE html>
<html lang=es>
<head>
    <title>PAW Medical</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <link rel="stylesheet" type="text/css" href="css/carrusel.css">
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <section>
            <ul class="carrusel">
                <li>
                    <figure class="carrusel-item">
                        <img src="images/noticia1.jpeg" alt="Fotografía del edificio del hospital.">
                        <figcaption>Descripción.</figcaption>
                    </figure>
                </li>
                <li>
                    <figure class="carrusel-item">
                        <img src="images/noticia2.jpeg" alt="Fotografía del interior del hospital.">
                        <figcaption>Descripción.</figcaption>
                    </figure>
                </li>
                <li>
                    <figure class="carrusel-item">
                        <img src="images/noticia3.jpeg" alt="Fotografía tomógrafo.">
                        <figcaption>Descripción.</figcaption>
                    </figure>
                </li>
                <li>
                    <figure class="carrusel-item">
                        <img src="images/noticia4.jpeg" alt="Fotografía tomógrafo.">
                        <figcaption>Descripción.</figcaption>
                    </figure>
                </li>
                <li>
                    <figure class="carrusel-item">
                        <img src="images/noticia5.jpeg" alt="Fotografía tomógrafo.">
                        <figcaption>Descripción.</figcaption>
                    </figure>
                </li>
            </ul>
        </section>
        <section>
            <nav>
                <ul>
                    <li><p><a href=servicios class="enlace-boton">Servicios</a></p></li>
                    <li><p><a href=pedir-turno class="enlace-boton">Solicitar turno</a></p></li>
                    <li><p><a href=mis-turnos class="enlace-boton">Mis turnos</a></p></li>
                    <li><p><a href=quienes-somos class="enlace-boton">¿Quiénes somos?</a></p></li>
                    <li><p><a href=contacto class="enlace-boton">Contacto</a></p></li>
                    <li><p><a href=noticias class="enlace-boton">Noticias</a></p></li>
                </ul>
            </nav>
        </section>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
