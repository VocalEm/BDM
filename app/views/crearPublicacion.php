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
                <textarea name="descripcion" id="input_name_reg" class="inputs_reg input-descripcion" placeholder="Describe tu publicacion"></textarea>

                <label class="label_reg">Categoría:</label>
                <select name="categoria" id="categoria" class="inputs_reg">
                    <?php foreach ($categorias as $categoria): ?>
                        <option value="<?= $categoria['NOMBRE'] ?>">
                            <?= $categoria['NOMBRE'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>

                <label class="label_reg">Cargar Imagen:</label>
                <div class="input-group">
                    <input name="imagen" type="file" id="input_imagen" class="inputs_reg" accept="image/*">
                </div>

                <label class="label_reg">Cargar Video:</label>
                <div class="input-group">
                    <input name="video" type="file" id="input_video" class="inputs_reg" accept="video/*">

                </div>
            </div>
            <div class="btn_label_reg">
                <button type="button" id="cancel_imagen" class="btn_cancel">Cancelar carga de archivos</button>
                <input class=" btn_accion" id="btn_crearPubli" type="submit" value="Crear Publicacion">
            </div>
        </form>
    </main>

    <script>
        // JavaScript para permitir solo una carga (imagen o video)
        const inputImagen = document.getElementById('input_imagen');
        const inputVideo = document.getElementById('input_video');
        const cancelImagen = document.getElementById('cancel_imagen');
        const cancelVideo = document.getElementById('cancel_video');

        inputImagen.addEventListener('change', () => {
            if (inputImagen.files.length > 0) {
                inputVideo.value = '';
                inputVideo.disabled = true;
            } else {
                inputVideo.disabled = false;
            }
        });

        inputVideo.addEventListener('change', () => {
            if (inputVideo.files.length > 0) {
                inputImagen.value = '';
                inputImagen.disabled = true;
            } else {
                inputImagen.disabled = false;
            }
        });

        // Cancelar carga de imagen
        cancelImagen.addEventListener('click', () => {
            inputImagen.value = '';
            inputImagen.disabled = false;
            inputVideo.disabled = false;
        });

        // Cancelar carga de video
        cancelVideo.addEventListener('click', () => {
            inputVideo.value = '';
            inputVideo.disabled = false;
            inputImagen.disabled = false;
        });
    </script>
</body>

</html>