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
                <h1 class="titulo_tablero"><?php
                                            echo $tablero['TITULO'];
                                            ?></h1>
                <p style="font-size:2rem; color:white;"><?php
                                                        echo $tablero['DESCRIPCION'];
                                                        ?></p>

            </div>

            <div class="pageUsu_publics">
                <div class="publicaciones-grid">
                    <?php
                    foreach ($publicaciones as $publicacion) {
                        $tipoImg = $publicacion->getTipoImg();
                        $imagen = $publicacion->getImagen();
                        $rutaVideo = $publicacion->getRutaVideo();
                        $descripcion = $publicacion->getDescripcion();
                        $idPublicacion = $publicacion->getIdPublicacion();
                    ?>
                        <div class="publicacion">
                            <a href="/publicacion/post/<?php echo $idPublicacion; ?>">
                                <?php if (!empty($imagen)) { ?>
                                    <img src="data:<?php echo htmlspecialchars($tipoImg); ?>;base64,<?php echo base64_encode($imagen); ?>" alt="<?php echo htmlspecialchars($descripcion); ?>">
                                <?php } else if (!empty($rutaVideo) && file_exists(__DIR__ . '/assets/videos/' . basename($rutaVideo))) { ?>
                                    <video loop muted>
                                        <source src="/app/views/assets/videos/<?php echo basename($rutaVideo); ?>" type="video/mp4">
                                        Tu navegador no soporta la reproducción de videos.
                                    </video>
                                <?php } else { ?>
                                    <p>Contenido multimedia no disponible.</p>
                                <?php } ?>
                            </a>
                            <p class="titulo-publicacion"><?php echo htmlspecialchars($descripcion); ?></p>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>

    </main>
</body>

</html>