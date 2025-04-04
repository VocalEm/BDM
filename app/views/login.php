<?php
require_once __DIR__ . '/plantillas/head.php';

?>

<body>
    <div class="main_register">
        <div class="contenedor_motion_reg">
            <h1 class="motion_reg">MOTION</h1>
        </div>

        <form class="contenido_form_reg" action="/login/form" method="POST">
            <p class="main_text_reg">Inicio de Sesión</p>
            <div class="forms_label_reg">
                <label class="label_reg">Correo Electronico:</label>
                <input type="text" id="input_name_is" class="inputs_reg" name="correo" required>
                <label class="label_reg">Contraseña:</label>
                <input type="password" id="input_pass_is" class="inputs_reg" name="password" required>
                <div><input class="checkbox" type="checkbox" id="recordarSesion" name="recordarSesion" value="1">
                    <span for="">Recordar sesion</span>
                </div>
                <?php
                if (isset($error)) {
                ?>
                    <div class="error-message" id="error_correo">
                        <p style="color: red;"><?php echo $error; ?></p>
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="btn_label_reg">
                <input type="submit" class="btn_accion" id="btn_iniciar" value="Iniciar Sesión">
                <a href="/register" class="tengo_cuenta">No tengo cuenta.</a>
            </div>

        </form>

    </div>

</body>

</html>