<!DOCTYPE html>
<html lang=es>
<head>
    <title>PAW Medical - Contacto</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/general.css">
</head>
<style>
    @media screen and (min-width: 450px) {
        main {
            padding: 1.5rem 3rem 1rem 3rem;
            border: 1px solid;
            border-radius: 1rem;
        }
    }

    main {
        text-align: center;
        width: 22rem;
        justify-self: center;
        margin: 3rem auto 1rem auto;
    }

    main > * {
        display: inline-block;
        margin: 0 0 1.5rem 0;
    }
    
    .telefonos {
        margin-top: 1.5rem;
        text-align: left;
    }

    hr {
        width: 80%;
    }

    form {
        margin-top: 1rem;
    }

    form p {
        margin: auto;
        inline-size: fit-content;
    }

    form input {
        width: 15rem;
        box-sizing: border-box;
    }

    form label {
        display: block;
        margin: 0 0 1rem 0;
        box-sizing: border-box;
    }

    form label > * {
        display: block;
        width: 20rem;
        margin: 0 0 1rem 0;
        box-sizing: border-box;
    }

    .form-botones-reset-limpiar {
        text-align: center;
        width: 100%;
        margin-top: 1.5rem;
    }

    input[type="submit"], input[type="reset"]
    {
        width: 47%;
    }

    textarea {
        height: 7rem;
        resize: none;
    }
</style>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h1>Contacto</h1>
        <section>
            <p>Las consultas telefónicas se realizan a los siguientes números:</p>
            <ul class="telefonos">
                <li><p><a href=tel:0800-235-3856>0800-235-3856</a> (Urgencias).</p></li>
                <li><p><a href=tel:0800-333-2548>0800-333-2548</a> (Turnos).</p></li>
                <li><p><a href=tel:0800-233-5869>0800-233-5869</a> (Administración).</p></li>
                <li><p><a href=tel:0800-223-8468>0800-223-8468</a> (Proveedores).</p></li>
            </ul>
        </section>
        <hr>
        <section>
            <p>También puede consultarnos utilizando el siguiente formulario:</p>
            <form accept-charset=utf-8 name=form-contacto action=contacto method=post target=_self autocomplete=on>
                <fieldset name=nombre-apellido>
                    <p><label>Nombre <input class="campo-form-animado" name=nombre id=nombre type=text autocomplete=name maxlength=30 tabindex=1 placeholder=Nombre autofocus required></label></p>
                    <p><label>Apellido <input class="campo-form-animado" name=apellido id=apellido type=text autocomplete=family-name maxlength=30 tabindex=2 placeholder=Apellido required></label></p>
                </fieldset>
                <fieldset name=formas-de-contacto>
                    <p><label>Teléfono <input class="campo-form-animado" name=telefono id=telefono type=tel autocomplete="home tel" maxlength=20 tabindex=3 placeholder=Teléfono required></label></p>
                    <p><label>Mail <input class="campo-form-animado" name=mail id=mail type=email autocomplete="home email" maxlength=40 tabindex=4 placeholder=Mail required></label></p>
                </fieldset>
                <p><label>Consulta <textarea class="campo-form-animado" name=consulta id=consulta maxlength=250 tabindex=5 placeholder=Consulta required></textarea></label></p>
                <p class="form-botones-reset-limpiar">
                    <input class="campo-form-animado" type=reset name="limpiar" id="limpiar" tabindex=6 value="Limpiar">
                    <input class="boton-destacado campo-form-animado" type=submit name=boton-crear-cuenta id="limpiar" tabindex=6 value="Crear cuenta">
                </p>
            </form>
        </section>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
