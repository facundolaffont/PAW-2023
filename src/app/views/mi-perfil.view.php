<!DOCTYPE html>
<html lang=es>
<head>
    <?php
        $titulo = "PAW Medical - Mi perfil";
        require __DIR__ . '/parts/head.view.php';
    ?>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h1>Mi perfil</h1>
        <section>
            <figure>
                <img src="avatar1.jpeg" alt="Avatar de usuario">
                <figcaption>Nombre Apellido</figcaption>
            </figure>
        </section>
        <section>
            <nav>
                <ul>
                    <li>
                        <p><a href="editar-perfil">Editar perfil</a></p>
                    </li>
                    <li>
                        <p><a href="pedir-turno">Solicitar turno</a></p>
                    </li>
                    <li>
                        <p><a href="mis-turnos">Mis turnos</a></p>
                    </li>
                    <li>
                        <p><a href="familia">Familiar</a></p>
                    </li>
                </ul>
            </nav>
        </section>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
