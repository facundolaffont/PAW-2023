<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $titulo = "Radiología | UNLu PAW";
        require __DIR__ . '/parts/head.view.php';
    ?>
    <style>
        h2 {
            text-align: center;
        }

        .button {
            text-align: center;
        }

        main picture img {
            width: 100%;
            height: 50vh;
        }

        h3 {
            text-align: left;
        }

        .profesionales-list {
            display: grid;
            grid-template-rows: repeat(autocomplete, 1fr);
        }

        .profesionales-list li {
            display: grid;
            grid-template-columns: auto 1fr;
            align-items: center;
        }

        .profesionales-list li img {
            width: 6rem;
            height: 6rem;
        }
    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h2>Radiología</h2>
        <p class="button"><a href="pedir-turno?servicio=Radiología">Solicitar Turno de Radiología</a></p>
        <picture>
            <source srcset="images/placeholder-image.png">
            <img src="images/placeholder-image.png" alt="Imagen de un médico sosteniendo una radiografía de tórax">
        </picture>
        <h3>Profesionales</h3>
        <ul class="profesionales-list">
            <li>
                <img src="images/placeholder-image.png" alt="Foto de perfil del profesional Alejandro Medina">
                <p>Alejandro Medina</p>
            </li>
            <li>
                <img src="images/placeholder-image.png" alt="Foto de perfil de la profesional Ana López">
                <p>Ana López</p>
            </li>
            <li>
                <img src="images/placeholder-image.png" alt="Foto de perfil de la profesional Ana Martínez">
                <p>Ana Martínez</p>
            </li>
            <li>
                <img src="images/placeholder-image.png" alt="Foto de perfil de la profesional Andrea Morales">
                <p>Andrea Morales</p>
            </li>
        </ul>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>