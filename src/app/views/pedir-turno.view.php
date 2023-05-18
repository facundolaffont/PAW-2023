<!DOCTYPE html>
<html lang=es>
<head>
    <?php
        $titulo = "Solicitar turno | UNLu PAW";
        require __DIR__ . '/parts/head.view.php';
    ?>
    <style>
        @media screen and (min-width: 450px) {
            .formulario {
                outline: var(--form-border);
                outline-offset: 1rem;
                border-radius: 1px;
            }
        }

        .formulario {
            width: 50vw;                       
            margin: 3rem auto;                  
            padding: 2rem 2rem;                 
            background-color: var(--form-background-color);
            display: grid;
            grid-template-areas:    "title  title"
                                    "form   form"
                                    "reset  submit";
            grid-template-columns: 1fr 1fr;
            grid-template-rows: auto;
        }

        .mensaje-form-enviado {
            display: block;
            margin: 0 auto 1rem auto;
            width: 5.5rem;
            border: solid 1px;
            border-radius: 8px;
            padding: 0.5rem;
            background-color: var(--ulh-yellow);
            box-shadow: var(--sombra);
            cursor: default;
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

        form label select,
        form label input {
            width: 100%;
            margin: 0 0 1rem 0;
            box-sizing: border-box;
        }  

        form {
            grid-area: form;
        }

        .title {
            grid-area: title;
            text-align: center;
        }

        .service {
            grid-area: service;
            grid-column: span 2;
            width: 100%;
        }

        input[type="reset"] {
            background-color: var(--form-button-reset-background-color);
            color: var(--form-button-reset-color);
            width: 100%;
        }

        input[type="submit"] {
            background-color: var(--form-button-submit-background-color);
            color: var(--form-button-submit-color);
        }

        .buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            font-size: var(--p-font-size);
            color: var(--p-color-hover-2);
        }

        .file-input {
            outline-style: none;
            padding-left: 0;
            padding-top: 0.1rem;
        }

    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <section class="formulario">
            <div class="title">
                <h2>Solicitar un turno</h2>
                <?php switch ($processed) { case 0: break; case 1: ?>
                    <div class="mensaje-form-enviado">Enviado ✓</div>
                <?php break; default:?>
                    <div class="mensaje-form-invalido">Datos incorrectos</div>
                <?php break; } ?>
            </div>
            <form
                accept-charset=utf-8
                name=form-pedir-turno
                action=pedir-turno
                method=post
                enctype="multipart/form-data"
                target=_self
                autocomplete=on
            >
                <fieldset name=fs-profesional-servicio>
                <p class="service">
                    <label>Servicio
                        <select class="campo-form-animado " size=1 name=servicio id=servicio autofocus required>
                            <option value=0>---</option>
                            <option value=1>Alergología e inmunología</option>
                            <option value=2>Anestesiología</option>
                            <option value=3>Angiología y cirugía vascular</option>
                            <option value=4>Bioquímica clínica</option>
                            <option value=5>Cardiología</option>
                            <option value=6>Cirugía cardiovascular</option>
                            <option value=7>Cirugía de la mano</option>
                            <option value=8>Cirugía general</option>
                            <option value=9>Cirugía maxilofacial</option>
                            <option value=10>Cirugía pediátrica</option>
                            <option value=11>Cirugía plástica y reconstructiva</option>
                            <option value=12>Cirugía torácica</option>
                            <option value=13>Citopatología</option>
                            <option value=14>Dermatología</option>
                            <option value=15>Dermatología pediátrica</option>
                            <option value=16>Diagnóstico por imagen</option>
                            <option value=17>Endocrinología</option>
                            <option value=18>Endoscopia</option>
                            <option value=19>Epidemiología</option>
                            <option value=20>Farmacología clínica</option>
                            <option value=21>Gastroenterología</option>
                            <option value=22>Genética médica</option>
                            <option value=23>Geriatría</option>
                            <option value=24>Ginecología oncológica</option>
                            <option value=25>Hematología</option>
                            <option value=26>Hematología y oncología pediátrica</option>
                            <option value=27>Infectología</option>
                            <option value=28>Inmunohematología y transfusión</option>
                            <option value=29>Medicina crítica y cuidados intensivos</option>
                            <option value=30>Medicina de emergencia</option>
                            <option value=31>Medicina del deporte</option>
                            <option value=32>Medicina del sueño</option>
                            <option value=33>Medicina del trabajo</option>
                            <option value=34>Medicina del viajero</option>
                            <option value=35>Medicina familiar y comunitaria</option>
                            <option value=36>Medicina interna</option>
                            <option value=37>Medicina nuclear</option>
                            <option value=38>Medicina paliativa</option>
                            <option value=39>Nefrología</option>
                            <option value=40>Neumología</option>
                            <option value=41>Neurocirugía</option>
                            <option value=42>Neurofisiología clínica</option>
                            <option value=43>Neurología</option>
                            <option value=44>Neuropsicología</option>
                            <option value=45>Nutrición clínica</option>
                            <option value=46>Obstetricia y ginecología</option>
                            <option value=47>Odontología</option>
                            <option value=48>Oftalmología</option>
                            <option value=49>Oncología</option>
                            <option value=50>Ortopedia y traumatología</option>
                            <option value=51>Otorrinolaringología</option>
                            <option value=52>Patología</option>
                            <option value=53>Patología forense</option>
                            <option value=54>Pediatría</option>
                            <option value=55>Psicología clínica</option>
                            <option value=56>Psiquiatría</option>
                            <option value=57>Radiología</option>
                            <option value=58>Rehabilitación</option>
                            <option value=59>Reumatología</option>
                            <option value=60>Toxicología médica</option>
                            <option value=61>Traumatología deportiva</option>
                            <option value=62>Urgencias médicas</option>
                            <option value=63>Urología</option>
                            <option value=64>Venereología</option>
                        </select>
                    </label>
                </p>
                <p>
                    <label>Profesional
                        <select class="campo-form-animado" size=1 name=profesional id=profesional required>
                            <option value=0>---</option>
                            <option value=1>Alejandro Medina</option>
                            <option value=2>Ana López</option>
                            <option value=3>Ana Martínez</option>
                            <option value=4>Andrea Morales</option>
                            <option value=5>Antonio García</option>
                            <option value=6>Carlos Pérez</option>
                            <option value=7>Carmen Pérez</option>
                            <option value=8>Daniel Hernández</option>
                            <option value=9>David Vargas</option>
                            <option value=10>Diego Rodríguez</option>
                            <option value=11>Elena Sánchez</option>
                            <option value=12>Isabel Díaz</option>
                            <option value=13>Javier Rodríguez</option>
                            <option value=14>Juan Jiménez</option>
                            <option value=15>Laura Ruiz</option>
                            <option value=16>Lucía Castro</option>
                            <option value=17>Luis Gómez</option>
                            <option value=18>Manuel Ortiz</option>
                            <option value=19>Maria Ramos</option>
                            <option value=20>Pablo García</option>
                            <option value=21>Paula Torres</option>
                            <option value=22>Sara Núñez</option>
                            <option value=23>Sergio Flores</option>
                            <option value=24>Sofia García</option>
                        </select>
                    </label>
                </p>
            </fieldset>
            <fieldset name=fechahora-turno>
                <p><label>Fecha del turno <input class="campo-form-animado" type=date name=fecha-turno id=fecha-turno required></label></p>
                <p><label>Horario del turno <input class="campo-form-animado" type=time name=hora-turno id=hora-turno required></label></p>
            </fieldset>
            <fieldset name=fs-paciente>
                <p>
                    <label>Paciente
                        <select class="campo-form-animado" size=1 name=paciente id=paciente>
                            <option value=0>---</option>
                            <option value=1>Lautaro Pérez</option>
                            <option value=2>Juan Pérez</option>
                            <option value=3>Emilia Pérez</option>
                            <option value=4>Estefanía Pérez</option>
                            <option value="+">NUEVO PACIENTE...</option>
                        </select>
                    </label>
                </p>
                <fieldset name=fs-datos-nuevo-paciente hidden=hidden>
                    <fieldset name=fs-nombre-apellido>
                        <p><label>Nombre <input class="campo-form-animado" type=text name=nombre id=nombre maxlength=30 placeholder=Nombre></label></p>
                        <p><label>Apellido <input class="campo-form-animado" type=text name=apellido id=apellido maxlength=30 placeholder=Apellido></label></p>
                    </fieldset>
                    <p><label>Fecha de nacimiento <input class="campo-form-animado" type=date name=fecha-nac id=fecha-nac></label></p>
                    <p><label>Edad <input class="campo-form-animado" type=number name=edad id=edad min=0 max=200 placeholder=Edad></label></p>
                    <fieldset name=fs-formas-de-contacto>
                        <p><label>Teléfono <input class="campo-form-animado" name=telefono id=telefono type=tel autocomplete="home tel" maxlength=20 placeholder=Teléfono></label></p>
                        <p><label>Correo electrónico <input class="campo-form-animado" name=mail id=mail type=email autocomplete="home email" maxlength=40 placeholder="Correo electrónico"></label></p>
                    </fieldset>
                </fieldset>
            </fieldset>
            <p>
                <label>Imagen de estudio
                    <input class="file-input" type="file" name="file" id="file" accept="image/jpeg, images/png" />
                </label>
            </p>
            <section class="buttons">
                <input class="campo-form-animado" type=reset value=Limpiar>
                <input class="boton-destacado campo-form-animado" type=submit value=Solicitar>
            </section>
            </form>
        </section>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
