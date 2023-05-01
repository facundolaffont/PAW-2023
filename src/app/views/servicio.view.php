<!DOCTYPE html>
<html lang="es">
<head>
    <title>PAW Medical - Radiología</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/general.css">
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h1>Radiología</h1>
        <picture>
            <source srcset="images/servicio-radiología-mobile.jpeg">
            <img src="images/servicio-radiología-desktop.jpeg" alt="Imagen de un médico sosteniendo una radiografía de tórax">
        </picture>
        <p><a href="pedir-turno?servicio=Radiología">Solicitar Turno de Radiología</a></p>
        <h2>Profesionales</h2>
        <ul>
            <li>
                <img src="images/profesional-Medina-Alejandro.jpeg" alt="Foto de perfil del profesional Alejandro Medina">
                <p>Alejandro Medina</p>
            </li>
            <li>
                <img src="images/profesional-López-Ana.jpeg" alt="Foto de perfil de la profesional Ana López">
                <p>Ana López</p>
            </li>
            <li>
                <img src="images/profesional-Martínez-Ana.jpeg" alt="Foto de perfil de la profesional Ana Martínez">
                <p>Ana Martínez</p>
            </li>
            <li>
                <img src="images/profesional-Morales-Andrea.jpeg" alt="Foto de perfil de la profesional Andrea Morales">
                <p>Andrea Morales</p>
            </li>
        </ul>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>