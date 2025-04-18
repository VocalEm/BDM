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
                            <a class="icono_cat" href="/home/categoria/<?php echo $categoria['NOMBRE']; ?>"><?php echo $categoria['NOMBRE']; ?></a>
                        <?php } ?>
                    </div>

                </nav>

                <div class="gallery">
                    <?php foreach ($publicaciones as $publicacion) {
                        $tipoImg = $publicacion['TIPO_IMG'];
                        $imagen = $publicacion['IMAGEN'];
                        $rutaVideo = $publicacion['RUTA_VIDEO'];
                        $idPublicacion = $publicacion['ID_PUBLICACION'];
                    ?>
                        <a href="/publicacion/post/<?php echo $idPublicacion; ?>">
                            <?php if (!empty($imagen)) { ?>
                                <img src="data:<?php echo $tipoImg; ?>;base64,<?php echo base64_encode($imagen); ?>" alt="Publicación">
                            <?php } else if (!empty($rutaVideo)) { ?>
                                <video class="reel-video" autoplay muted>
                                    <source src="/app/views/assets/videos/<?php echo basename($rutaVideo); ?>" type="video/mp4">
                                    Tu navegador no soporta la reproducción de videos.
                                </video>
                            <?php } ?>
                        </a>
                    <?php } ?>
                </div>

                <script>
                    // Seleccionar todos los videos con la clase "reel-video"
                    const videos = document.querySelectorAll('.reel-video');

                    // Tiempo máximo de reproducción en segundos
                    const maxTime = 1.5; // Cambia este valor si necesitas otro límite

                    videos.forEach(video => {
                        video.addEventListener('timeupdate', () => {
                            if (video.currentTime >= maxTime) {
                                video.currentTime = 0; // Reinicia el video al inicio
                                video.play(); // Asegura que el video continúe reproduciéndose
                            }
                        });
                    });
                </script>

            </section>

        </main>
        <script src="/app/views/js/slider.js"></script>
    </div>
</body>

</html>