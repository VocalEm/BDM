<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>
    <?php
    require_once __DIR__ . '/plantillas/header.php';
    ?>
    <div class="body_grid">
        <?php
        require_once __DIR__ . '/plantillas/menu_lateral.php';
        ?>
        <main class="main_body_index">

            <section class="main_body_public">
                <nav class="main_body_publi_cat">
                    <div class="slider-container">
                        <?php foreach ($categorias as $categoria) { ?>
                            <a class="icono_cat" href="#"><?php echo $categoria['NOMBRE']; ?></a>
                        <?php } ?>
                    </div>

                </nav>


                <div class="gallery">
                    <a href="/publicacion"><img src="/app/views/assets/deporte6.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte5.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deportefeed2.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte4.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/basket.png" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte2.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte1.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte6.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deportefeed2.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte5.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte4.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte1.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/basket.png" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte2.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte6.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte5.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deportefeed2.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte4.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte1.jpeg" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/basket.png" alt=""></a>
                    <a href="/publicacion"><img src="/app/views/assets/deporte2.jpeg" alt=""></a>
                </div>

            </section>

        </main>
        <script src="/app/views/js/slider.js"></script>
    </div>
</body>

</html>