<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>
    <?php
    require_once __DIR__ . '/plantillas/menu_lateral.php';
    ?>
    <main class="main_body_index">

        <div class="main_body_publicaciones">
            <div class="main_body_publicS">
                <div class="main_body_public_usu">
                    <img
                        id="img_public"
                        src="/app/views/assets/emi3.jpg">
                    <a id="name_usuario">emiliano_friass</a>
                </div>
                <div class="main_body_public_content">
                    <img id="multim_usuarios" src="/app/views/assets/jalenbby.png">
                    <div>
                        <button id="like-button">
                            <img id="like-icon" src="/app/views/assets/like.png" /><!-- Ícono de like -->
                        </button>
                        <button id="coment-button">
                            <img id="coment-icon" src="/app/views/assets/comentar.png" /><!-- Ícono de comentar -->
                        </button>
                        <button id="save-button">
                            <img id="save-icon" src="/app/views/assets/save.png" /><!-- Ícono de save -->
                        </button>
                    </div>

                </div>
                <div class="public_descrip">
                    <a id="name_usuario">emiliano_friass</a>
                    <p id="desc_public">Eagleas! Campeones de la NFL. Te amo Jaleeen!</p>
                </div>

            </div>
        </div>

    </main>
</body>

</html>