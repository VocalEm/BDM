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
                    <a href="/perfil/render/<?php echo $usuario->getIdUsuario(); ?>" class="datos_usuario">
                        <img src="data:<?php echo $usuario->getTipoImg(); ?>;base64,<?php echo base64_encode($usuario->getFotoPerfil()); ?>" alt="Foto de perfil">
                        <p class="datos_Usu" id="Username" name="Username"><?php
                                                                            echo $usuario->getUsername();
                                                                            ?></p>
                    </a>


                    <p class="comentario_post" id="compost" name="compost"><?php
                                                                            echo $publicacion->getDescripcion();
                                                                            ?></p>

                    <form class="actions_post" action="/publicacion/interaccion/<?php echo $publicacion->getIdPublicacion(); ?>/<?php echo $reacciono ? 'true' : 'false'; ?>" method="POST" id="form_like">
                        <button name="like" type="submit" id="like-button">
                            <p class="conteo-likes"><?php echo $publicacion->getContadorLikes(); ?></p>
                            <i class="fa-regular fa-heart fa-3x <?php if ($reacciono) echo 'activo'; ?>"></i>
                        </button>
                        <a id="save-button" <?php if ($isGuardado) echo ('href="' . '/tableros/eliminar/' . $publicacion->getIdPublicacion() . '/' . $usuario->getIdUsuario() . '""'); ?>>
                            <i id="saveIcon" class="fa-regular fa-bookmark fa-2x <?php if ($isGuardado) echo 'guardado' ?>"></i>
                        </a>
                        <?php
                        if ($publicacion->getIdUsuario() == $usuarioSesion->getIdUsuario()) { ?>
                            <a class="delete-button" href="/publicacion/desactivar/<?php echo $publicacion->getIdPublicacion() ?>"><i class="fa-solid fa-trash fa-2x"></i></a>
                        <?php  } ?>

                    </form>


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
                        <div class="error-message" id="error_comentario"></div>
                        <input type="submit" class="btn_accion" id="btn_comentar" value="Comentar">
                    </form>
                </div>
            </div>
        </main>
    </div>
    <!-- Ventana emergente -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <button class="close-button" aria-label="Cerrar ventana emergente">&times;</button>
            <h2>Selecciona un tablero</h2>
            <ul>
                <?php
                foreach ($tableros as $tablero) { ?>
                    <a href="/tableros/guardar/<?php echo $tablero['ID_TABLERO'] ?>/<?php echo $publicacion->getIdPublicacion() ?>">
                        <li class="tablero-item">
                            <img src="data:<?php echo $tablero['TIPO_IMG']; ?>;base64,<?php echo base64_encode($tablero['PORTADA']); ?>" alt="">
                            <h3><?php echo $tablero['TITULO']; ?></h3>
                        </li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>
    <script src="/app/views/js/popup.js"></script>
    <script>
        // Validación para evitar comentarios vacíos
        document.getElementById('form_comentar').addEventListener('submit', function(e) {
            const comentario = document.getElementById('comentario_usu');
            const errorDiv = document.getElementById('error_comentario');
            errorDiv.innerHTML = '';
            comentario.classList.remove('error');
            if (!comentario.value.trim()) {
                errorDiv.innerHTML = '<p style="margin:0;text-align:center;color:red;">Por favor ingresa un comentario.</p>';
                comentario.classList.add('error');
                e.preventDefault();
            }
        });
    </script>
</body>

</html>