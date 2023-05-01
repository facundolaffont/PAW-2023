<!DOCTYPE html>
<html lang=es>
<head>
    <title>PAW Medical - Crear cuenta</title>
    <meta charset=utf-8>
    <link rel="stylesheet" type="text/css" href="css/reset.css">
    <link rel="stylesheet" type="text/css" href="css/general.css">
    <style>
        @media screen and (min-width: 450px) {
            main {
                padding: 1rem;
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

        form > p {
            text-align: center;
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

        input[type="submit"] {
            width: 35%;
        }
        
        input[type="button"] {
            width: 65%;
            margin-top: 1.2rem;
        }

        #pass {
            margin: 0 0 0.2rem 0;
        }
    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h2>Ingresar</h2>
        <form accept-charset=utf-8 name=form-ingresar action=ingresar method=post target=_self autocomplete=on>
            <fieldset name="credenciales">
                <p><label>Usuario <input class="campo-form-animado" name=usuario id=usuario type=text autocomplete=username maxlength=30 tabindex=1 placeholder=Usuario autofocus required></label></p>
                <p>
                    <label>Contraseña 
                        <input class="campo-form-animado" name=pass id=pass type=password minlength=10 tabindex=2 placeholder=Contraseña required>
                        <small><a href="renovar-pass">¿Olvidó su contraseña?</a></small>
                    </label>
                </p>
            </fieldset>
            <p><input class="campo-form-animado boton" type=submit name=boton-ingresar value="Ingresar" tabindex=3></p>
            <p><input class="campo-form-animado boton" type=button name=boton-ingresar-google value="Ingresar con Google" tabindex=4></p>
        </form>
        <p><a href="/crear-cuenta">Crear cuenta</a></p>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
