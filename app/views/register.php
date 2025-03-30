<?php
require_once __DIR__ . '/plantillas/head.php';
?>

<body>
    <div class="main_register">
        <div class="contenedor_motion_reg">
            <h1 class="motion_reg">MOTION</h1>
        </div>

        <form class="contenido_form_reg" action="/register/form" method="POST" enctype="multipart/form-data">
            <p class="main_text_reg">Registro de Usuarios</p>
            <div class="forms_label_reg">
                <label class="label_reg">Nombre(s):</label>
                <input type="text" id="input_name_reg" name="nombre" class="inputs_reg" required>
                <label class="label_reg">Apellido Paterno:</label>
                <input type="text" id="input_apeP_reg" name="apellidoPaterno" class="inputs_reg" required>
                <label class="label_reg">Apellido Materno:</label>
                <input type="text" id="input_apeM_reg" name="apellidoMaterno" class="inputs_reg" required>
                <label class="label_reg">Fecha de Nacimiento:</label>
                <input type="date" id="input_fecN_reg" name="fechaNacimiento" class="inputs_reg" required>
                <label class="label_reg">Sexo:</label>
                <div style="display: flex; flex-direction: row; justify-content: space-between;">
                    <label class="label_reg"> <input type="radio" name="sexo" value="masculino" required>Masculino</label>
                    <label class="label_reg"> <input type="radio" name="sexo" value="femenino" required>Femenino</label>
                </div>
                <label class="label_reg">Nombre de Usuario:</label>
                <input type="text" id="input_aka_reg" name="username" class="inputs_reg" required>
                <label class="label_reg">Correo Electrónico:</label>
                <input type="email" id="input_mail_reg" name="correo" class="inputs_reg" required>
                <label class="label_reg">Contraseña:</label>
                <input type="password" id="input_pass_reg" name="password" class="inputs_reg" required>
                <label class="label_reg">Cargar Imagen:</label>
                <input type="file" id="input_fotoPerfil_reg" name="fotoPerfil" class="inputs_reg" accept="image/*" required>
            </div>
            <div class="btn_label_reg">
                <input type="submit" value="Registrarse" class="btn_sesion" id="btn_registrarse">
                <a class="tengo_cuenta">Ya tengo cuenta.</a>
            </div>
        </form>

    </div>

</body>

</html>