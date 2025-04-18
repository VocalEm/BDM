<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>
    <?php
    require_once __DIR__ . '/plantillas/menu_lateral.php';
    ?>
    <div class="main_register">
        <div class="contenedor_motion_reg">
            <h1 class="motion_reg">MOTION</h1>
        </div>

        <form class="contenido_form_reg" action="/tableros/form" method="POST" enctype="multipart/form-data">
            <p class="main_text_reg">Crear Tablero</p>
            <div class="forms_label_reg">
                <label class="label_reg">Nombre tablero:</label>
                <input type="text" id="input_name_reg" name="titulo" class="inputs_reg" required>
                <label class="label_reg">Descripcion:</label>
                <textarea type="" id="input_name_reg" name="descripcion" class="inputs_reg input-descripcion"></textarea>
                <label class="label_reg">Cargar Imagen:</label>
                <div class="input-group">
                    <input name="imagen" type="file" id="input_imagen" class="inputs_reg" accept="image/*" required>
                </div>

            </div>
            <div class="btn_label_reg">
                <input type="submit" class="btn_accion" id="btn_crearPubli" value="Crear Tablero">
            </div>

        </form>

    </div>

</body>

</html>