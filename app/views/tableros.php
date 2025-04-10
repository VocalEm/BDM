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
                <h1 class="titulo_tablero">Tableros</h1>
                <a href="/tableros/crear" class="btn_accion">Crear Tablero</a>
                <p>Descripcion tablero</p>
            </div>

            <div class="pageUsu_publics">
                <div class="publicaciones-grid">
                    <a class="tableros" href="/tableros/detalle">
                        <img src="/app/views/assets/golf.png" alt="Publicación 1">
                        <p class="titulo-publicacion">Golf</p>
                    </a>
                    <a class="tableros" href="/tableros/detalle">
                        <img src="/app/views/assets/natacion2.png" alt="Publicación 2">
                        <p class="titulo-publicacion">Swiming</p>
                    </a>
                    <a class="tableros" href="/tableros/detalle">
                        <img src="/app/views/assets/basket.png" alt="Publicación 3">
                        <p class="titulo-publicacion">Basket</p>
                    </a>
                    <a class="tableros" href="/tableros/detalle">
                        <img src="/app/views/assets/bici.png" alt="Publicación 4">
                        <p class="titulo-publicacion">Mountain</p>
                    </a>
                    <a class="tableros" href="/tableros/detalle">
                        <img src="/app/views/assets/esgrima.png" alt="Publicación 5">
                        <p class="titulo-publicacion">Olimpiadas</p>
                    </a>
                    <a class="tableros" href="/tableros/detalle">
                        <img src="/app/views/assets/running.png" alt="Publicación 6">
                        <p class="titulo-publicacion">Run</p>
                    </a>
                    <a class="tableros" href="/tableros/detalle">
                        <img src="/app/views/assets/soccer.png" alt="Publicación 7">
                        <p class="titulo-publicacion">Ballers</p>
                    </a>
                    <a class="tableros" href="/tableros/detalle">
                        <img src="/app/views/assets/run.png" alt="Publicación 8">
                        <p class="titulo-publicacion">Trainig</p>
                    </a>
                    <a class="tableros" href="/tableros/detalle">
                        <img src="/app/views/assets/tennis.png" alt="Publicación 9">
                        <p class="titulo-publicacion">Sports</p>
                    </a>
                    <!-- Añade más publicaciones según sea necesario -->
                </div>
            </div>
        </div>

    </main>
</body>

</html>