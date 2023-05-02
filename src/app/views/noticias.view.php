<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $titulo = "PAW Medical - Noticias";
        require __DIR__ . '/parts/head.view.php';
    ?>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h1>Noticias</h1>
        <ul>
            <li>
                <h2>Noticia 1</h2>
                <img src="noticia1.jpeg" alt="Descripción de imagen.">
                <p>Descripción de noticia.</p>
            </li>
            <li>
                <h2>Noticia 2</h2>
                <img src="noticia2.jpeg" alt="Descripción de imagen.">
                <p>Descripción de noticia.</p>
            </li>
            <li>
                <h2>Noticia 3</h2>
                <img src="noticia3.jpeg" alt="Descripción de imagen.">
                <p>Descripción de noticia.</p>
            </li>
            <li>
                <h2>Noticia 4</h2>
                <img src="noticia4.jpeg" alt="Descripción de imagen.">
                <p>Descripción de noticia.</p>
            </li>
            <li>
                <h2>Noticia 5</h2>
                <img src="noticia5.jpeg" alt="Descripción de imagen.">
                <p>Descripción de noticia.</p>
            </li>
        </ul>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
