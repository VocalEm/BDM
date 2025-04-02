<?php
require_once __DIR__ . '/plantillas/head.php';
?>

<body>
    <header class="main_header" style="position: static;">
        <div class="main_header_elements">
            <div class="main_header_nameapp">
                <h1 class="motion">MOTION</h1>
            </div>
            <form class="main_header_search">
                <!--<input type="text" id="input_search_mp" placeholder="Buscar" class="input_search_mp" />
                <img src="/app/views/assets/Search.png" alt="">-->
            </form>
            <nav class="main_header_ri">
                <a class="main_headers" href="/html/register.html">Registrarse</a>
                <a class="main_headers" href="/html/login.html">Iniciar Sesión</a>
            </nav>
        </div>
    </header>
    <aside class="main_body_barralateral">
        <nav class="main_body_barralateral_iconos">
            <a class="icono_bl" href="/html/index.html">
                <img
                    id="OpenDash"
                    src="/app/views/assets/Home.png"
                    class="header_icono"
                    alt="Inicio" />
            </a>
            <a class="icono_bl">
                <img
                    id="OpenDash"
                    src="/app/views/assets/Search.png"
                    class="header_icono"
                    alt="Buscar" />
            </a>
            <a class="icono_bl">
                <img
                    id="OpenDash"
                    src="/app/views/assets/usuarios-alt (3) 1.png"
                    class="header_icono"
                    alt="Usuarios" />
            </a>
            <a class="icono_bl">
                <img
                    id="OpenDash"
                    src="/app/views/assets/favorite.png"
                    class="header_icono"
                    alt="Favoritos" />
            </a>
            <a class="icono_bl">
                <img
                    id="OpenDash"
                    src="/app/views/assets/Plus square.png"
                    class="header_icono"
                    alt="Agregar" />
            </a>
            <a class="icono_bl">
                <img
                    id="OpenDash"
                    src="/app/views/assets/Mask group.png"
                    class="header_icono"
                    style="visibility: hidden"
                    alt="Oculto" />
            </a>
            <a>
                <img
                    id="OpenDash"
                    src="/app/views/assets/More vertical.png"
                    class="header_icono"
                    alt="Más opciones" />
            </a>
        </nav>
    </aside>
    <main class="main_body_index">

        <section class="main_body_public">
            <nav class="main_body_publi_cat">
                <a class="icono_cat" href="#">Basketball</a>
                <a class="icono_cat" href="#">Fútbol Soccer</a>
                <a class="icono_cat" href="#">Natación</a>
                <a class="icono_cat" href="#">Tennis</a>
                <a class="icono_cat" href="#">Fútbol Americano</a>
                <a class="icono_cat" href="#">Voleibol</a>
                <a class="icono_cat" href="#">Flag Football</a>
                <a class="icono_cat" href="#">Atletismo</a>
                <a class="icono_cat" href="#">Gimnasia</a>
                <a class="icono_cat" href="#">Surf</a>
                <a class="icono_cat" href="#">Golf</a>
            </nav>
            <!--
            <div class="main_body_public_fotos">
                <div class="main_body_public_fotos1">
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/soccer.png"
                            class="header_icono"
                            alt="Soccer" />
                    </a>
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/soccer.png"
                            class="header_icono"
                            alt="Esgrima" />
                    </a>
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/natacion.png"
                            class="header_icono"
                            alt="Natación" />
                    </a>
                </div>
                <div class="main_body_public_fotos1">
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/natacion2.png"
                            class="header_icono"
                            alt="Natación 2" />
                    </a>
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/tennis.png"
                            class="header_icono"
                            alt="Tennis" />
                    </a>
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/basket.png"
                            class="header_icono"
                            alt="Basketball" />
                    </a>
                </div>
                <div class="main_body_public_fotos1">
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/run.png"
                            class="header_icono"
                            alt="Running" />
                    </a>
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/autenticos.png"
                            class="header_icono"
                            alt="Auténticos" />
                    </a>
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/kobey.png"
                            class="header_icono"
                            alt="Kobe Bryant" />
                    </a>
                </div>
                <div class="main_body_public_fotos1">
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/saquon.png"
                            class="header_icono"
                            alt="Saquon Barkley" />
                    </a>
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/simone.png"
                            class="header_icono"
                            alt="Simone Biles" />
                    </a>
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/running.png"
                            class="header_icono"
                            alt="Running 2" />
                    </a>
                </div>
                <div class="main_body_public_fotos1">
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/surf.png"
                            class="header_icono"
                            alt="Surf" />
                    </a>
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/bici.png"
                            class="header_icono"
                            alt="Ciclismo" />
                    </a>
                    <a href="#">
                        <img
                            id="public_img"
                            src="/app/views/assets/golf.png"
                            class="header_icono"
                            alt="Golf" />
                    </a>
                </div>
            </div>
            -->

            <div class="gallery">

            </div>

        </section>

    </main>
</body>

</html>