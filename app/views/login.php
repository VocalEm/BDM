<?php
require_once __DIR__ . '/plantillas/head.php';
?>

<body>
    <div class="main_register">
        <div class="contenedor_motion_reg">
            <h1 class="motion_reg">MOTION</h1>
        </div>

        <div class="contenido_form_reg">
            <p class="main_text_reg">Inicio de Sesión</p>
            <div class="forms_label_reg">
                <label class="label_reg">Nombre de usuario:</label>
                <input type="text" id="input_name_is" class="inputs_reg">
                <label class="label_reg">Contraseña:</label>
                <input type="password" id="input_pass_is" class="inputs_reg">
            </div>
            <div class="btn_label_reg">
                <button class="btn_sesion" id="btn_iniciar">Iniciar Sesión</button>
                <a href="/register" class="tengo_cuenta">No tengo cuenta.</a>
            </div>

        </div>

    </div>

</body>

</html>