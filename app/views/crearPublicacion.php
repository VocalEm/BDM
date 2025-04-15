<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>
    <?php
    require_once __DIR__ . '/plantillas/menu_lateral.php';
    ?>
    <main class="main_register">
        <div class="contenedor_motion_reg">
            <h1 class="motion_reg">MOTION</h1>
        </div>

        <form class="contenido_form_reg" method="POST" action="/crearPublicacion/form" enctype="multipart/form-data">
            <p class="main_text_reg">Crear publicacion</p>
            <div class="forms_label_reg">
                <label class="label_reg">Descripcion:</label>
                <textarea type="" name="descripcion" id="input_name_reg" class="inputs_reg input-descripcion">
                </textarea>

                <label class="label_reg">Cargar Imagen:</label>
                <input name="imagen" type="file" id="input_pass_reg" class="inputs_reg">
            </div>
            <div class="btn_label_reg">
                <input class="btn_accion" id="btn_crearPubli" type="submit" value="Crear Publicacion">
            </div>

        </form>

    </main>
</body>

</html>