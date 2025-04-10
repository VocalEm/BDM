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

        <div class="contenido_form_reg">
            <p class="main_text_reg">Crear publicacion</p>
            <div class="forms_label_reg">
                <label class="label_reg">Descripcion:</label>
                <textarea type="" id="input_name_reg" class="inputs_reg input-descripcion">
                </textarea>

                <label class="label_reg">Cargar Imagen:</label>
                <input type="file" id="input_pass_reg" class="inputs_reg">
            </div>
            <div class="btn_label_reg">
                <button class="btn_accion" id="btn_crearPubli">Crear publicacion</button>

            </div>

        </div>

    </main>
</body>

</html>