<!DOCTYPE html>
<html lang=es>
<head>
    <title>PAW Medical - Obras sociales</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <style>
        main h1 {
            text-align: center;
        }

        main ul {
            margin-top: 2rem;
        }

        main ul p {
            width: 16rem;
        }

        main li {
            display: inline-block;
            padding: 0.5rem 1rem;
            margin: 0.5rem;
        }

        main li img {
            width: 6rem;
            height: 6rem;
            border: 0.1rem solid /* COLOR */;
            border-radius: 10rem;
            /* background-color: COLOR */
        }

        main li a {
            position: relative;
            top: -2.5rem;
            margin-left: 0.8rem;
        }
    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h1>Obras sociales</h1>
        <ul>
            <li>
                <p><img src="images/placeholder-image.png"> <a href="https://www.osde.com.ar/index">OSDE</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"> <a href="https://www.swissmedical.com.ar/">Swiss Medical</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"> <a href="https://www.ioma.gba.gob.ar/">IOMA</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"> <a href="https://www.medife.com.ar/">Medifé</a></p>
            </li>
            <li>
                <p><img src="images/placeholder-image.png"> <a href="https://www.pami.org.ar/">PAMI</a></p>
            </li>
        </ul>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
