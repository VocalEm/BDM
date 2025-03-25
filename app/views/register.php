<?php
require_once __DIR__ . '/plantillas/head.php';
?>

<body>
    <div class="main_register">
        <div class="contenedor_motion_reg">
            <h1 class="motion_reg">MOTION</h1>
        </div>

        <div class="contenido_form_reg">
            <p class="main_text_reg">Registro de Usuarios</p>
            <div class="forms_label_reg">
                <label class="label_reg">Nombre(s):</label>
                <input type="text" id="input_name_reg" class="inputs_reg">
                <label class="label_reg">Apellido Paterno:</label>
                <input type="text" id="input_apeP_reg" class="inputs_reg">
                <label class="label_reg">Apellido Materno:</label>
                <input type="text" id="input_apeM_reg" class="inputs_reg">
                <label class="label_reg">Fecha de Nacimiento:</label>
                <input type="date" id="input_fecN_reg" class="inputs_reg">
                <label class="label_reg">Sexo:</label>
                <div style="display: flex; flex-direction: row; justify-content: space-between;">
                    <label class="label_reg"> <input type="radio" name="Masculino" id="radio_sexo" value="sexo1">Masculino</label>
                    <label class="label_reg"> <input type="radio" name="Femenino" id="radio_sexo" value="sexo2">Femenino</label>
                </div>
                <label class="label_reg">Nombre de Usuario:</label>
                <input type="text" id="input_aka_reg" class="inputs_reg">
                <label class="label_reg">Correo Electrónico:</label>
                <input type="email" id="input_mail_reg" class="inputs_reg">
                <label class="label_reg">Contraseña:</label>
                <input type="password" id="input_pass_reg" class="inputs_reg">
                <label class="label_reg">Cargar Imagen:</label>
                <input type="file" id="input_pass_reg" class="inputs_reg">
            </div>
            <div class="btn_label_reg">
                <button class="btn_sesion" id="btn_registrarse">Registrarse</button>
                <a class="tengo_cuenta">Ya tengo cuenta.</a>
            </div>

        </div>

    </div>

</body>

</html>