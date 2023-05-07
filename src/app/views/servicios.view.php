<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $titulo = "Servicios | UNLu PAW";
        require __DIR__ . '/parts/head.view.php';
    ?>
    <style>
        h2 {
            text-align: center;
        }

        .servicios-list {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 1rem;
        }

        .servicios-list li {
            display: grid;
            grid-template-areas:    "img"
                                    "text";
        }

        .servicios-list li {
            display: grid;
            place-content: center;
            padding: 1rem;
            border:  0.1rem solid var(--ulh-green);
            border-radius: 1rem;
        }

        main li img {
            grid-area: img;
            display: block;
            width: 6rem;
            height: 6rem;
            border: 0.1rem solid var(--ulh-green);
            border-radius: 10rem;
        }

        li a {
            grid-area: text;
            display: block;
            text-align: center;
        }
    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h2>Servicios</h2>
        <ul class="servicios-list">
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio1">Servicio 1</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio2">Servicio 2</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio3">Servicio 3</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio4">Servicio 4</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio5">Servicio 5</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio6">Servicio 6</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio7">Servicio 7</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio8">Servicio 8</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio9">Servicio 9</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio10">Servicio 10</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio11">Servicio 11</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio12">Servicio 12</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio13">Servicio 13</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio14">Servicio 14</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"><a href="servicio15">Servicio 15</a></p>
            </li>
        </ul>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
