<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>
    <?php
    require_once __DIR__ . '/plantillas/menu_lateral.php';
    ?>
    <main class="main_body_index">
        <div class="main_post">
            <div class="post_multimedia">
                <img class="post" id="post" name="post" src="/app/views/assets/jalenbby.png">
            </div>
            <div class="post_datos">
                <p class="datos_Usu" id="Username" name="Username">emiliano_friass</p>
                <p class="comentario_post" id="compost" name="compost">Eagles! Campeones de la NFL. Te amo Jaleeen!</p>
                <div class="actions_post">
                    <button id="like-button">
                        <img id="like-icon" src="/app/views/assets/like.png" /><!-- Ícono de like -->
                    </button>
                    <button id="save-button">
                        <img id="save-icon" src="/app/views/assets/save.png" /><!-- Ícono de save -->
                    </button>
                </div>
                <div class="section_coments">
                    <div class="contenido_comentarios">
                        <a id="name_usuarioCom">jazmin_cch</a>
                        <p id="comentarios">Arriba Jalen Hurt, mi más UuU</p>
                    </div>
                    <div class="contenido_comentarios">
                        <a id="name_usuarioCom">mercyy_toms</a>
                        <p id="comentarios">Eagles, para toda la eternidad!!</p>
                    </div>
                    <div class="contenido_comentarios">
                        <a id="name_usuarioCom">sebas_montomoto</a>
                        <p id="comentarios">Yo lo inivitaría a salir uwu</p>
                    </div>

                </div>
                <div class="post_coment">
                    <input type="text" class="input_comentarPost" id="comentario_usu" name="comentario" placeholder="Comentar">
                    <button class="btn_accion" id="btn_comentar">Comentar</button>
                </div>
            </div>

        </div>

    </main>
</body>

</html>