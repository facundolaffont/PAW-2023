<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        $titulo = "Noticias | UNLu PAW";
        require __DIR__ . '/parts/head.view.php';
    ?>
    <style>
        h1{
            text-align: center;
        }
        ul{
            display: grid;
            grid-auto-flow: row;
        }
        .noticia{
            display: grid;
            grid-template-areas:    "img    title"
                                    "img    text";
            grid-template-columns: auto 1fr;
            padding: 1rem;
        }
        
        .noticia:not(:last-child){
            border-bottom: 5px solid var(--ulh-green);
        }

        .noticia h2{
            grid-area: title;
            text-align: center;
        }  

        .noticia img{
            width: 10vw;
            grid-area: img;
        }

        .noticia p{
            grid-area: text;
        }
    </style>
</head>
<body>
    <?php require 'parts/header.view.php'; ?>
    <main>
        <h2>Noticias</h2>
        <ul>
            <li class="noticia">
                <h3><a href="noticia">Noticia 1</a></h3>
                <img src="images/placeholder-image.png" alt="Descripción de imagen.">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ullam ea perferendis ducimus quasi totam optio voluptatibus eligendi! Rerum minus provident dolorum pariatur quo facere cupiditate quae earum repudiandae qui?</p>
            </li>
            <li class="noticia">
                <h3><a href="noticia">Noticia 2</a></h3>
                <img src="images/placeholder-image.png" alt="Descripción de imagen.">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ullam ea perferendis ducimus quasi totam optio voluptatibus eligendi! Rerum minus provident dolorum pariatur quo facere cupiditate quae earum repudiandae qui?</p>
            </li>
            <li class="noticia">
                <h3><a href="noticia">Noticia 3</a></h3>
                <img src="images/placeholder-image.png" alt="Descripción de imagen.">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ullam ea perferendis ducimus quasi totam optio voluptatibus eligendi! Rerum minus provident dolorum pariatur quo facere cupiditate quae earum repudiandae qui?</p>
            </li>
            <li class="noticia">
                <h3><a href="noticia">Noticia 4</a></h3>
                <img src="images/placeholder-image.png" alt="Descripción de imagen.">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ullam ea perferendis ducimus quasi totam optio voluptatibus eligendi! Rerum minus provident dolorum pariatur quo facere cupiditate quae earum repudiandae qui?</p>
            </li>
            <li class="noticia">
                <h3><a href="noticia">Noticia 5</a></h3>
                <img src="images/placeholder-image.png" alt="Descripción de imagen.">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit ullam ea perferendis ducimus quasi totam optio voluptatibus eligendi! Rerum minus provident dolorum pariatur quo facere cupiditate quae earum repudiandae qui?</p>
            </li>
        </ul>
    </main>
    <?php require 'parts/footer.view.php'; ?>
</body>
</html>
