<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $titulo = "404 | UNLu PAW";
        require __DIR__ . '/parts/head.view.php';
    ?>
</head>
<style>
        main{
            display: grid;
            grid-template-rows: auto auto;
            align-items: center;
        }
        
        h2{
           text-align: center;
        }
        .image404{
            width: 100%;
            height: 50vh;
            margin: auto;
        }
    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h2>Lo sentimos, esta página no está disponible.</h2>
        <p><img src="images/404-image.svg" class="image404"></p>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</html>
