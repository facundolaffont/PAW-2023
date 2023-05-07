<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $titulo = "Mis turnos | UNLu PAW";
        require __DIR__ . '/parts/head.view.php';
    ?>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h1>Mis turnos</h1>
        <ul>
            <li>
                <div>
                    <p>Turno de NOMBRE-APELLIDO</p>
                    <p><time datetime="2023-03-30">30 de marzo de 2023</time></p>
                    <p>SERVICIO<p>
                    <p>PROFESIONAL</p>
                </div>
            </li>
            <li>
                <div>
                    <p>Turno de NOMBRE-APELLIDO</p>
                    <p><time datetime="2023-03-30">30 de marzo de 2023</time></p>
                    <p>SERVICIO<p>
                    <p>PROFESIONAL</p>
                </div>
            </li>
            <li>
                <div>
                    <p>Turno de NOMBRE-APELLIDO</p>
                    <p><time datetime="2023-03-30">30 de marzo de 2023</time></p>
                    <p>SERVICIO<p>
                    <p>PROFESIONAL</p>
                </div>
            </li>
            <li>
                <div>
                    <p>Turno de NOMBRE-APELLIDO-FAMILIAR</p>
                    <p><time datetime="2023-03-30">30 de marzo de 2023</time></p>
                    <p>SERVICIO<p>
                    <p>PROFESIONAL</p>
                </div>
            </li>
        </ul>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
