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

        <form class="contenido_form_reg" action="/tableros/form" method="POST" enctype="multipart/form-data" id="form_tablero">
            <p class="main_text_reg">Crear Tablero</p>
            <div id="errorMessagesTablero" class="error-messages"></div>
            <div class="forms_label_reg">
                <label class="label_reg">Nombre tablero:</label>
                <input type="text" id="input_titulo_tablero" name="titulo" class="inputs_reg">
                <div class="error-message" id="error_titulo"></div>
                <label class="label_reg">Descripcion:</label>
                <textarea id="input_descripcion_tablero" name="descripcion" class="inputs_reg input-descripcion"></textarea>
                <div class="error-message" id="error_descripcion"></div>
                <label class="label_reg">Cargar Imagen:</label>
                <div class="input-group">
                    <input name="imagen" type="file" id="input_imagen" class="inputs_reg" accept="image/*">
                </div>
                <div class="error-message" id="error_imagen"></div>
            </div>
            <div class="btn_label_reg">
                <input type="submit" class="btn_accion" id="btn_crearPubli" value="Crear Tablero">
            </div>
        </form>
    </div>

    <script>
        function mostrarError(input, mensaje) {
            const errorDiv = document.getElementById('error_' + input.id.split('_')[1]);
            if (errorDiv) {
                errorDiv.innerHTML = '<p style="margin:0;text-align:center;color:red;">' + mensaje + '</p>';
            }
            input.classList.add('error');
        }

        function limpiarErrores() {
            document.querySelectorAll('.error-message').forEach(el => el.innerHTML = '');
            document.querySelectorAll('.inputs_reg').forEach(el => el.classList.remove('error'));
            document.getElementById('errorMessagesTablero').style.display = 'none';
            document.getElementById('errorMessagesTablero').innerHTML = '';
        }

        document.getElementById('form_tablero').addEventListener('submit', function(e) {
            limpiarErrores();
            let hasErrors = false;

            const titulo = document.getElementById('input_titulo_tablero');
            const descripcion = document.getElementById('input_descripcion_tablero');
            const imagen = document.getElementById('input_imagen').files[0];

            if (!titulo.value.trim()) {
                mostrarError(titulo, 'Por favor ingresa un nombre para el tablero.');
                hasErrors = true;
            }

            if (!descripcion.value.trim()) {
                mostrarError(descripcion, 'Por favor ingresa una descripción.');
                hasErrors = true;
            }

            if (!imagen) {
                document.getElementById('errorMessagesTablero').innerHTML = 'Debes subir una imagen para el tablero.';
                document.getElementById('errorMessagesTablero').style.display = 'block';
                hasErrors = true;
            } else {
                const validImageTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
                if (!validImageTypes.includes(imagen.type)) {
                    mostrarError(document.getElementById('input_imagen'), 'El archivo de imagen no es válido. Solo se permiten JPG, PNG, GIF o WEBP.');
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