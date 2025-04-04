<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>
    <main class="main_body_index">
        <?php
        require_once __DIR__ . '/plantillas/menu_lateral.php';
        ?>

        <div class="main_body_pageEdit" style="margin-left: 70px;">
            <div class="pageUsu_datosUsu"> <!-- Divisor de la página del Usuario-->
                <div class="foto_edit_Usu">
                    <div class="foto_perfilUsu">
                        <img id="foto_perfil" src="/assets/selfie sin dedo de dami.png">
                    </div>
                    <div class="btn_edit">
                        <button class="btn_sesion" id="btn_cambiarFoto" style="font-size: 14px; padding: 5px;">Cambiar foto</button>
                    </div>
                </div>
                <div class="forms_label_reg">
                    <label class="label_reg">Nombre(s):</label>
                    <input type="text" id="input_name_edit" class="inputs_reg">
                    <label class="label_reg">Apellido Paterno:</label>
                    <input type="text" id="input_apeP_edit" class="inputs_reg">
                    <label class="label_reg">Apellido Materno:</label>
                    <input type="text" id="input_apeM_edit" class="inputs_reg">
                    <label class="label_reg">Fecha de Nacimiento:</label>
                    <input type="date" id="input_fecN_edit" class="inputs_reg">
                    <label class="label_reg">Sexo:</label>
                    <div style="display: flex; flex-direction: row; justify-content: space-between;">
                        <label class="label_reg"> <input type="radio" name="Masculino" id="radio_sexo" value="sexo1">Masculino</label>
                        <label class="label_reg"> <input type="radio" name="Femenino" id="radio_sexo" value="sexo2">Femenino</label>
                    </div>
                    <label class="label_reg">Nombre de Usuario:</label>
                    <input type="text" id="input_aka_edit" class="inputs_reg">
                    <label class="label_reg">Correo Electrónico:</label>
                    <input type="email" id="input_mail_edit" class="inputs_reg">
                    <label class="label_reg">Contraseña:</label>
                    <input type="password" id="input_pass_edit" class="inputs_reg">
                    <label class="label_reg">Privacidad:</label>
                    <div style="display: flex; flex-direction: row; justify-content: space-between;">
                        <label class="label_reg"> <input type="radio" name="Público" id="radio_privacidad0" value="privacidad1" style="margin-right: 8px;">Público</label>
                        <label class="label_reg"> <input type="radio" name="Privado" id="radio_privacidad1" value="privacidad2" style="margin-right: 8px;">Privado</label>
                    </div>


                </div>
                <div class="btn_label_reg">
                    <button class="btn_sesion" id="btn_guardarCambios" style="font-size: 15px; background-color: #FBBF24;margin-top: 0px;">Guardar cambios</button>

                </div>
            </div>


        </div>

    </main>
</body>

</html>