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

        <form class="contenido_form_reg" method="POST" action="/crearPublicacion/form" enctype="multipart/form-data" id="form_publicacion">
            <p class="main_text_reg">Crear publicacion</p>
            <div id="errorMessagesPub" class="error-messages"></div> <!-- Contenedor para errores -->
            <div class="forms_label_reg">

                <label class="label_reg">Título:</label>
                <input type="text" name="titulo" id="input_titulo_reg" class="inputs_reg" placeholder="Título de la publicación">
                <div class="error-message" id="error_titulo"></div>

                <label class="label_reg">Descripcion:</label>
                <textarea name="descripcion" id="input_name_reg" class="inputs_reg input-descripcion" placeholder="Describe tu publicacion"></textarea>
                <div class="error-message" id="error_descripcion"></div>

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
                <div class="error-message" id="error_imagen"></div>

                <label class="label_reg">Cargar Video:</label>
                <div class="input-group">
                    <input name="video" type="file" id="input_video" class="inputs_reg" accept="video/*">
                </div>
                <div class="error-message" id="error_video"></div>
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

        // Función para mostrar mensaje de error debajo del input
        function mostrarError(input, mensaje) {
            const errorDiv = document.getElementById('error_' + input.id.replace('input_', '').replace('_reg', ''));
            if (errorDiv) {
                errorDiv.innerHTML = '<p style="margin:0;text-align:center;color:red;">' + mensaje + '</p>';
            }
            input.classList.add('error');
        }

        // Limpiar mensajes de error previos
        function limpiarErrores() {
            document.querySelectorAll('.error-message').forEach(el => el.innerHTML = '');
            document.querySelectorAll('.inputs_reg').forEach(el => el.classList.remove('error'));
            document.getElementById('errorMessagesPub').style.display = 'none';
            document.getElementById('errorMessagesPub').innerHTML = '';
        }

        // Validación del formulario
        document.getElementById('form_publicacion').addEventListener('submit', function(e) {
            limpiarErrores();
            let hasErrors = false;

            const titulo = document.getElementById('input_titulo_reg');
            const descripcion = document.getElementById('input_name_reg');
            const imagen = inputImagen.files[0];
            const video = inputVideo.files[0];

            // Validar título
            if (!titulo.value.trim()) {
                mostrarError(titulo, 'Por favor ingresa un título.');
                hasErrors = true;
            } else if (titulo.value.trim().length < 4) {
                mostrarError(titulo, 'El título debe tener al menos 4 caracteres.');
                hasErrors = true;
            } else if (titulo.value.trim().length > 50) {
                mostrarError(titulo, 'El título no debe exceder 50 caracteres.');
                hasErrors = true;
            }

            // Validar descripción
            if (!descripcion.value.trim()) {
                mostrarError(descripcion, 'Por favor ingresa una descripción.');
                hasErrors = true;
            } else if (descripcion.value.trim().length > 100) {
                mostrarError(descripcion, 'La descripción no debe exceder 100 caracteres.');
                hasErrors = true;
            }

            // Validar que se suba una imagen válida o un video
            if (!imagen && !video) {
                document.getElementById('errorMessagesPub').innerHTML = 'Debes subir una imagen o un video.';
                document.getElementById('errorMessagesPub').style.display = 'block';
                hasErrors = true;
            }

            // Validar tipo de archivo imagen
            if (imagen) {
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (!validImageTypes.includes(imagen.type)) {
                    mostrarError(document.getElementById('input_imagen'), 'El archivo de imagen no es válido. Solo se permiten JPG, PNG, GIF o WEBP.');
                    hasErrors = true;
                }
            }

            // Validar tipo de archivo video
            if (video) {
                const validVideoTypes = ['video/mp4', 'video/webm', 'video/ogg'];
                if (!validVideoTypes.includes(video.type)) {
                    mostrarError(document.getElementById('input_video'), 'El archivo de video no es válido. Solo se permiten MP4, WEBM u OGG.');
                    hasErrors = true;
                }
            }

            if (hasErrors) {
                e.preventDefault();
            }
        });
    </script>
</body>

</html>