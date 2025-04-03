<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>

    <div class="main_body_barralateral">
        <div class="main_body_barralateral_iconos">
            <a class="icono_bl" href="#">
                <img id="OpenDash" src="/app/views/assets/Home.png" class="header_icono" alt="Home Icon" />
            </a>
            <a class="icono_bl" href="#">
                <img id="OpenDash" src="/app/views/assets/Search.png" class="header_icono" alt="Search Icon" />
            </a>
            <a class="icono_bl" href="#">
                <img id="OpenDash" src="/app/views/assets/usuarios-alt (3) 1.png" class="header_icono" alt="Users Icon" />
            </a>
            <a class="icono_bl" href="#">
                <img id="OpenDash" src="/app/views/assets/favorite.png" class="header_icono" alt="Favorite Icon" />
            </a>
            <a class="icono_bl" href="#">
                <img id="OpenDash" src="/app/views/assets/Plus square.png" class="header_icono" alt="Add Icon" />
            </a>
            <a class="icono_bl" href="#">
                <img id="OpenDash" src="/app/views/assets/Mask group.png" class="header_icono" alt="Mask Icon" />
            </a>
            <a href="#">
                <img id="OpenDash" src="/app/views/assets/More vertical.png" class="header_icono" alt="More Icon" />
            </a>
        </div>
    </div>
    <main class="main_body_index">
        <div class="main_body_pageUsu" style="margin-left: 130px;">
            <div class="pageUsu_datosUsu">
                <div class="foto_edit_Usu">
                    <img id="foto_perfil" src="/app/views/assets/selfie sin dedo de dami.png" alt="Foto de perfil">
                    <a href="/html/editar.html">Editar perfil</a>
                </div>
                <div class="datos_Usu">
                    <div class="nombre_usu">
                        <h1 id="Username" name="Username">NombreUsuario</h1>
                        <img src="/app/views/assets/Eye off.png" style="width: 25px; height: 25px; margin: 10px;" alt="Eye Icon">
                    </div>

                    <div class="numeros_usu">
                        <p class="numeros" id="publicaciones" name="publicaciones">#Publicaciones</p>
                        <p class="numeros" id="followers" name="followers">#Seguidores</p>
                        <p class="numeros" id="follows" name="follows">#Seguidos</p>
                    </div>
                    <a class="btn_tablero" id="btn_tablero" href="/html/tablero.html">Tableros</a>
                </div>
            </div>

            <div class="pageUsu_publics">
                <div class="publicaciones-grid">
                    <div class="publicacion">
                        <img src="/app/views/assets/golf.png" alt="Publicación 1">
                    </div>
                    <div class="publicacion">
                        <img src="/app/views/assets/natacion2.png" alt="Publicación 2">
                    </div>
                    <div class="publicacion">
                        <img src="/app/views/assets/basket.png" alt="Publicación 3">
                    </div>
                    <div class="publicacion">
                        <img src="/app/views/assets/bici.png" alt="Publicación 4">
                    </div>
                    <div class="publicacion">
                        <img src="/app/views/assets/esgrima.png" alt="Publicación 5">
                    </div>
                    <div class="publicacion">
                        <img src="/app/views/assets/running.png" alt="Publicación 6">
                    </div>
                    <div class="publicacion">
                        <img src="/app/views/assets/soccer.png" alt="Publicación 7">
                    </div>
                    <div class="publicacion">
                        <img src="/app/views/assets/run.png" alt="Publicación 8">
                    </div>
                    <div class="publicacion">
                        <img src="/app/views/assets/tennis.png" alt="Publicación 9">
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>