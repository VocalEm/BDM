<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>
    <?php
    require_once __DIR__ . '/plantillas/menu_lateral.php';
    ?>
    <main class="main_body_index">
        <div class="main_body_pageUsu" style="margin-left: 130px;">
            <div class="pageUsu_datosUsu">
                <div class="foto_edit_Usu">
                    <img id="foto_perfil" src="data:<?php echo $usuario->getTipoImg(); ?>;base64,<?php echo base64_encode($usuario->getFotoPerfil()); ?>" alt="Foto de perfil">
                    <?php
                    if ($usuarioEnSesion) {
                    ?>
                        <a class="btn_accion" href="/modificar">Editar perfil</a>
                    <?php
                    }
                    ?>

                </div>
                <div class="datos_Usu">
                    <div class="nombre_usu">
                        <h1 id="Username" name="Username"><?php
                                                            echo $usuario->getUsername();
                                                            ?></h1>
                        <img src="/app/views/assets/Eye off.png" style="width: 25px; height: 25px; margin: 10px;" alt="Eye Icon">
                    </div>

                    <div class="numeros_usu">
                        <p class="numeros" id="publicaciones" name="publicaciones"> <?php
                                                                                    echo strval($usuario->getContadorPublicaciones());
                                                                                    ?> Publicaciones </p>
                        <p class="numeros" id="followers" name="followers">#Seguidores</p>
                        <p class="numeros" id="follows" name="follows">#Seguidos</p>
                    </div>
                    <div class="botones_perfil"> <a class="btn_tablero" id="btn_tablero" href="/tableros/render/<?php
                                                                                                                echo $usuario->getIdUsuario();
                                                                                                                ?>">Tableros</a>
                        <a class="btn_tablero" id="btn_reportes" href="/reportes">Reportes</a>
                    </div>

                </div>
            </div>

            <div class="pageUsu_publics">
                <div class="publicaciones-grid">
                    <?php
                    foreach ($publicaciones as $publicacion) {
                        $tipoImg = $publicacion['TIPO_IMG'];
                        $imagen = $publicacion['IMAGEN'];
                        $rutaVideo = $publicacion['RUTA_VIDEO'];
                        $descripcion = $publicacion['DESCRIPCION'];
                        $idPublicacion = $publicacion['ID_PUBLICACION'];
                    ?>
                        <div class="publicacion">
                            <a href="/publicacion/post/<?php echo $idPublicacion; ?>">
                                <?php if (!empty($imagen)) { ?>
                                    <img src="data:<?php echo $tipoImg; ?>;base64,<?php echo base64_encode($imagen); ?>" alt="Publicación">
                                <?php } else if (!empty($rutaVideo) && file_exists(__DIR__ . '/assets/videos/' . basename($rutaVideo))) { ?>
                                    <video loop muted>
                                        <source src="/app/views/assets/videos/<?php echo basename($rutaVideo); ?>" type="video/mp4">
                                        Tu navegador no soporta la reproducción de videos.
                                    </video>
                                <?php } else { ?>
                                    <p>Video no disponible.</p>
                                <?php } ?>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </main>
</body>

</html>