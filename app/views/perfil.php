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
                        <p class="numeros" id="publicaciones" name="publicaciones">#Publicaciones</p>
                        <p class="numeros" id="followers" name="followers">#Seguidores</p>
                        <p class="numeros" id="follows" name="follows">#Seguidos</p>
                    </div>
                    <div class="botones_perfil"> <a class="btn_tablero" id="btn_tablero" href="/tableros">Tableros</a>
                        <a class="btn_tablero" id="btn_reportes" href="/reportes">Reportes</a>
                    </div>

                </div>
            </div>

            <div class="pageUsu_publics">
                <div class="publicaciones-grid">
                    <div class="publicacion">
                        <a href="/publicacion"><img src="/app/views/assets/golf.png" alt="Publicación 1"></a>
                    </div>
                    <div class="publicacion">
                        <a href="/publicacion"><img src="/app/views/assets/natacion2.png" alt="Publicación 2"></a>
                    </div>
                    <div class="publicacion">
                        <a href="/publicacion"><img src="/app/views/assets/basket.png" alt="Publicación 3"></a>
                    </div>
                    <div class="publicacion">
                        <a href="/publicacion"><img src="/app/views/assets/bici.png" alt="Publicación 4"></a>
                    </div>
                    <div class="publicacion">
                        <a href="/publicacion"><img src="/app/views/assets/esgrima.png" alt="Publicación 5"></a>
                    </div>
                    <div class="publicacion">
                        <a href="/publicacion"><img src="/app/views/assets/running.png" alt="Publicación 6"></a>
                    </div>
                    <div class="publicacion">
                        <a href="/publicacion"><img src="/app/views/assets/soccer.png" alt="Publicación 7"></a>
                    </div>
                    <div class="publicacion">
                        <a href="/publicacion"><img src="/app/views/assets/run.png" alt="Publicación 8"></a>
                    </div>
                    <div class="publicacion">
                        <a href="/publicacion"><img src="/app/views/assets/tennis.png" alt="Publicación 9"></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>