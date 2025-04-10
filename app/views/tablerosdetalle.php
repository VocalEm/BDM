<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>
    <?php
    require_once __DIR__ . '/plantillas/menu_lateral.php';
    ?>
    <main class="main_body_index">

        <div class="main_body_pageTab" style="margin-left: 120px;">
            <div class="tablero"> <!-- Divisor de la página del Tablero-->
                <h1 class="titulo_tablero">Nombre Tablero</h1>
                <p style="font-size:2rem; color:white;">Descripcion tablero</p>

            </div>

            <div class="pageUsu_publics">
                <div class="publicaciones-grid">
                    <a class="tableros" href="/publicacion">
                        <img src="/app/views/assets/golf.png" alt="Publicación 1">
                    </a>
                    <a class="tableros" href="/publicacion">
                        <img src="/app/views/assets/natacion2.png" alt="Publicación 2">
                    </a>
                    <a class="tableros" href="/publicacion">
                        <img src="/app/views/assets/basket.png" alt="Publicación 3">
                    </a>
                    <a class="tableros" href="/publicacion">
                        <img src="/app/views/assets/bici.png" alt="Publicación 4">
                    </a>
                    <a class="tableros" href="/publicacion">
                        <img src="/app/views/assets/esgrima.png" alt="Publicación 5">
                    </a>
                    <a class="tableros" href="/publicacion">
                        <img src="/app/views/assets/running.png" alt="Publicación 6">
                    </a>
                    <a class="tableros" href="/publicacion">
                        <img src="/app/views/assets/soccer.png" alt="Publicación 7">
                    </a>
                    <a class="tableros" href="/publicacion">
                        <img src="/app/views/assets/run.png" alt="Publicación 8">
                    </a>
                    <a class="tableros" href="/publicacion">
                        <img src="/app/views/assets/tennis.png" alt="Publicación 9">
                    </a>
                    <!-- Añade más publicaciones según sea necesario -->
                </div>
            </div>
        </div>

    </main>
</body>

</html>