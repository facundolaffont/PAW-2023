<!DOCTYPE html>
<html lang=es>
<head>
    <?php
        $titulo = "Crear cuenta | UNLu PAW";
        require __DIR__ . '/parts/head.view.php';
    ?>
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
            margin: 3rem auto 2rem auto;
        }
    
        main > h1, main > form {
            display: inline-block;
            margin: 0 0 1.5rem 0;
        }

        .mensaje-form-invalido {
            display: block;
            margin: 0 auto 1rem auto;
            width: 9.5rem;
            border-radius: 8px;
            padding: 0.5rem;
            color: white;
            background-color: var(--ulh-red);
            box-shadow: 2px 2px black;
            cursor: default;
        }

        h2 {
            text-align: center;
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

        form ~ p {
            display: block;
            inline-size: fit-content;
            margin: auto;
        }

        .form-botones-reset-limpiar {
            text-align: center;
            width: 100%;
        }

        input[type="submit"], input[type="reset"]
        {
            width: 47%;
        }

        input[type="checkbox"]:not(.nav_input) {
            width: auto;
            height: auto;
            display: inline;
            margin-right: 0.5rem;
        }

        .terminos-condiciones-y-politicas {
            margin: 0.8rem 0;
        }

        .terminos-condiciones-y-politicas label {
            margin: 0;
        }

        textarea {
            height: 7rem;
            resize: none;
        }
    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h2>Crear cuenta</h2>
        <?php switch ($processed) { case 0: case 1: break; default: ?>
            <div class="mensaje-form-invalido">Datos incorrectos</div>
        <?php break; } ?>
        <form accept-charset=utf-8 name=form-crear-cuenta action=crear-cuenta method=post target=_self autocomplete=on>
            <fieldset name=nombre-apellido>
                <p><label>Nombre <input class="campo-form-animado" name=nombre id=nombre type=text autocomplete=name maxlength=30 tabindex=1 placeholder=Nombre autofocus required></label></p>
                <p><label>Apellido <input class="campo-form-animado" name=apellido id=apellido type=text autocomplete=family-name maxlength=30 tabindex=2 placeholder=Apellido required></label></p>
            </fieldset>
            <p><label>DNI <input class="campo-form-animado" type=number name=dni id=dni min=1 max=999999999 tabindex=3 placeholder=DNI required></label></p>
            <p><label>Fecha de nacimiento <input class="campo-form-animado" type=date name=fecha-nac id=fecha-nac tabindex=4 required></label></p>
            <fieldset name=formas-de-contacto>
                <p><label>Teléfono <input class="campo-form-animado" name=telefono id=telefono type=tel autocomplete="home tel" maxlength=20 tabindex=5 placeholder=Teléfono required></label></p>
                <p><label>Correo electrónico <input class="campo-form-animado" name=mail id=mail type=email autocomplete="home email" maxlength=40 tabindex=6 placeholder="Correo electrónico" required></label></p>
                <p><label>Reingrese su correo <input class="campo-form-animado" name=mail2 id=mail2 type=email maxlength=40 tabindex=7 placeholder="Correo electrónico" required></label></p>
            </fieldset>
            <fieldset name=pass-y-verif>
                <p><label>Contraseña <input class="campo-form-animado" name=pass id=pass type=password minlength=10 tabindex=8 autocomplete=off placeholder="Contraseña" required></label></p>
                <p><label>Reingrese su contraseña <input class="campo-form-animado" name=pass2 id=pass2 type=password minlength=10 tabindex=9 autocomplete=off placeholder="Contraseña" required></label></p>
            </fieldset>
            <fieldset class="terminos-condiciones-y-politicas">
                <p><label class="checkbox"><input class="campo-form-animado" type="checkbox" name="term-y-cond"> Acepto los términos y condiciones.</label></p>
                <p><label class="checkbox"><input class="campo-form-animado" type="checkbox" name="polit-y-priv"> Acepto las políticas de privacidad.</label></p>
            </fieldset>
            <p class="form-botones-reset-limpiar">
                <input class="campo-form-animado" type=reset value=Limpiar>
                <input class="boton-destacado campo-form-animado" type=submit name=boton-crear-cuenta value="Crear cuenta">
            </p>
        </form>
        <p>¿Ya tiene su cuenta?</p>
        <p><a href="ingresar">Ingresar</a></p>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
