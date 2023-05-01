<!DOCTYPE html>
<html lang=es>
<head>
    <title>PAW Medical - Mi perfil</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/general.css">
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
                        <p><a href="editar-perfil.html">Editar perfil</a></p>
                    </li>
                    <li>
                        <p><a href="pedir-turno.html">Solicitar turno</a></p>
                    </li>
                    <li>
                        <p><a href="mis-turnos.html">Mis turnos</a></p>
                    </li>
                    <li>
                        <p><a href="familia.html">Familiar</a></p>
                    </li>
                </ul>
            </nav>
        </section>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
