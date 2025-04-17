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
            <div class="main_post">

                <div class="post_multimedia">
                    <?php
                    $tipoImg = $publicacion->getTipoImg();
                    $imagen = $publicacion->getImagen();
                    $rutaVideo = $publicacion->getRutaVideo();
                    if (!empty($imagen)) { ?>
                        <img class="post" id="post" name="post" src="data:<?php echo $tipoImg; ?>;base64,<?php echo base64_encode($imagen); ?>" alt="Publicación">
                    <?php } else if (!empty($rutaVideo) && file_exists(__DIR__ . '/assets/videos/' . basename($rutaVideo))) { ?>
                        <video autoplay loop muted class="post">
                            <source src="/app/views/assets/videos/<?php echo basename($rutaVideo); ?>" type="video/mp4">
                            Tu navegador no soporta la reproducción de videos.
                        </video>
                    <?php } else { ?>
                        <p>Contenido multimedia no disponible.</p>
                    <?php } ?>
                </div>

                <div class="post_datos">
                    <p class="datos_Usu" id="Username" name="Username"><?php
                                                                        echo $usuario->getUsername();
                                                                        ?></p>

                    <p class="comentario_post" id="compost" name="compost"><?php
                                                                            echo $publicacion->getDescripcion();
                                                                            ?></p>

                    <div class="actions_post">
                        <button id="like-button">
                            <img id="like-icon" src="/app/views/assets/like.png" /><!-- Ícono de like -->
                        </button>
                        <button id="save-button">
                            <img id="save-icon" src="/app/views/assets/save.png" /><!-- Ícono de save -->
                        </button>
                    </div>
                    <div class="section_coments">
                        <?php
                        foreach ($comentarios as $comentario) { ?>
                            <div class="contenido_comentarios">
                                <a id="name_usuarioCom"><?php echo $comentario['USERNAME']; ?></a>
                                <p id="comentarios"><?php echo $comentario['COMENTARIO']; ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <form class="post_coment" action="/publicacion/comentar" method="POST" id="form_comentar">
                        <input type="hidden" id="id_publicacion" name="id_publicacion" value="<?php echo $publicacion->getIdPublicacion(); ?>">
                        <input type="text" class="input_comentarPost" id="comentario_usu" name="comentario" placeholder="Comentar">
                        <input type="submit" class="btn_accion" id="btn_comentar" value="Comentar">
                    </form>
                </div>
            </div>
        </main>
    </div>
</body>

</html>