<!DOCTYPE html>
<html lang=es>
<head>
    <?php
        $titulo = "Obras sociales | UNLu PAW";
        require __DIR__ . '/parts/head.view.php';
    ?>
    <style>
        h2 {
            text-align: center;
        }

        .ooss-list {
            margin-top: 2rem;
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            row-gap: 1rem;
        }

        .ooss-elem {
            display: grid;
            grid-template-areas: "img   link";
            grid-template-columns: auto 1fr;
        }
        
        .ooss-elem img {
            grid-area: img;  
            width: 6rem;
            height: 6rem;
            border: 0.1rem solid var(--ulh-green);
            border-radius: 10rem;
        }
        
        .ooss-elem a {
            grid-area: link;
            position: relative;
            top: -2.5rem;
            margin-left: 0.8rem;
        }
    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h2>Obras sociales</h2>
        <ul class="ooss-list">
            <li class="ooss-elem">
                <p><img src="images/placeholder-image.png"> <a href="https://www.osde.com.ar/index.html">OSDE</a></p>
            </li>
            <li class="ooss-elem">
                <p><img src="images/placeholder-image.png"> <a href="https://www.swissmedical.com.ar/">Swiss Medical</a></p>
            </li>
            <li class="ooss-elem">
                <p><img src="images/placeholder-image.png"> <a href="https://www.ioma.gba.gob.ar/">IOMA</a></p>
            </li>
            <li class="ooss-elem">
                <p><img src="images/placeholder-image.png"> <a href="https://www.medife.com.ar/">Medifé</a></p>
            </li>
            <li class="ooss-elem">
                <p><img src="images/placeholder-image.png"> <a href="https://www.pami.org.ar/">PAMI</a></p>
            </li>
        </ul>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
