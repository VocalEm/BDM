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

        <div class="contenido_form_reg">
            <p class="main_text_reg">Crear Tablero</p>
            <div class="forms_label_reg">
                <label class="label_reg">Nombre tablero:</label>
                <input type="text" id="input_name_reg" name="nombre" class="inputs_reg" required>
                <label class="label_reg">Descripcion:</label>
                <textarea type="" id="input_name_reg" class="inputs_reg input-descripcion">
                </textarea>
            </div>
            <div class="btn_label_reg">
                <button class="btn_accion" id="btn_crearPubli">Crear Tablero</button>

            </div>

        </div>

    </div>

</body>

</html>