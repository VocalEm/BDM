<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>
    <?php
    require_once __DIR__ . '/plantillas/menu_lateral.php';
    ?>
    <main class="main_body_index">
        <div class="main_body_pageEdit" style="margin-left: 70px;">
            <form id="registerForm" class="pageUsu_datosUsu" action="/modificar/form" method="POST" enctype="multipart/form-data"> <!-- Divisor de la página del Usuario-->
                <div class="foto_edit_Usu">
                    <div class="foto_perfilUsu">
                        <img id="foto_perfil" src="data:<?php echo $usuarioSesion->getTipoImg(); ?>;base64,<?php echo base64_encode($usuarioSesion->getFotoPerfil()); ?>" alt="Foto de perfil">
                    </div>
                    <div class="btn_edit">
                        <input type="file" name="fotoPerfil" class="btn_accion" id="btn_cambiarFoto" style="font-size: 14px; padding: 5px;">
                        <div class="error-message" id="error_fotoPerfil"></div>
                    </div>
                </div>
                <div class="forms_label_reg">
                    <input type="hidden" name="ID_USUARIO" value="<?php echo $usuarioSesion->getIdUsuario(); ?>">
                    <label class="label_reg">Nombre(s):</label>
                    <input type="text" name="NOMBRE" id="input_name_reg" class="inputs_reg" value="<?php echo $usuarioSesion->getNombre() ?? ''; ?>">
                    <div class="error-message" id="error_nombre"></div>
                    <label class="label_reg">Apellido Paterno:</label>
                    <input type="text" name="APELLIDO_PATERNO" id="input_apeP_reg" class="inputs_reg" value="<?php echo $usuarioSesion->getApellidoPaterno() ?? ''; ?>">
                    <div class="error-message" id="error_apellidoPaterno"></div>
                    <label class="label_reg">Apellido Materno:</label>
                    <input type="text" name="APELLIDO_MATERNO" id="input_apeM_reg" class="inputs_reg" value="<?php echo $usuarioSesion->getApellidoMaterno() ?? ''; ?>">
                    <div class="error-message" id="error_apellidoMaterno"></div>
                    <label class="label_reg">Fecha de Nacimiento:</label>
                    <input type="date" name="FECHA_NACIMINENTO" id="input_fecN_reg" class="inputs_reg" value="<?php echo $usuarioSesion->getFechaNacimiento() ?? ''; ?>">
                    <div class="error-message" id="error_fechaNacimiento"></div>
                    <label class="label_reg">Sexo:</label>
                    <div style="display: flex; flex-direction: row; justify-content: space-between;">
                        <label class="label_reg">
                            <input type="radio" name="SEXO" id="radio_sexo_masculino" value="masculino" <?php echo ($usuarioSesion->getSexo() == 1) ? 'checked' : ''; ?>>Masculino
                        </label>
                        <label class="label_reg">
                            <input type="radio" name="SEXO" id="radio_sexo_femenino" value="femenino" <?php echo ($usuarioSesion->getSexo() == 0) ? 'checked' : ''; ?>>Femenino
                        </label>
                    </div>
                    <div class="error-message" id="error_sexo"></div>
                    <label class="label_reg">Nombre de Usuario:</label>
                    <input type="text" name="USERNAME" id="input_aka_reg" class="inputs_reg" value="<?php echo $usuarioSesion->getUsername() ?? ''; ?>">
                    <div class="error-message" id="error_username"></div>
                    <label class="label_reg">Correo Electrónico:</label>
                    <input type="email" name="CORREO" id="input_mail_reg" class="inputs_reg" value="<?php echo $usuarioSesion->getCorreo() ?? ''; ?>">
                    <div class="error-message" id="error_correo"></div>
                    <label class="label_reg">Contraseña:</label>
                    <input type="password" name="PASSWORD" id="input_pass_reg" class="inputs_reg" value="">
                    <div class="error-message" id="error_password"></div>
                    <label class="label_reg">Privacidad:</label>
                    <div style="display: flex; flex-direction: row; justify-content: space-between;">
                        <label class="label_reg">
                            <input type="radio" name="PRIVACIDAD" id="radio_privacidad_publico" value="1" <?php echo ($usuarioSesion->getPrivacidad() == 1) ? 'checked' : ''; ?>>Público
                        </label>
                        <label class="label_reg">
                            <input type="radio" name="PRIVACIDAD" id="radio_privacidad_privado" value="0" <?php echo ($usuarioSesion->getPrivacidad() == 0) ? 'checked' : ''; ?>>Privado
                        </label>
                    </div>
                    <div class="error-message" id="error_privacidad"></div>
                </div>
                <div class="btn_label_reg">
                    <input value="Modificar Usuario" name="enviar" type="submit" class="btn_accion" id="btn_guardarCambios" style="font-size: 15px; background-color: #FBBF24;margin-top: 0px;">
                </div>
                <div class="btn_label_reg">
                    <button type="button" class="btn_accion btn_darBaja" id="btn_darBaja">
                        Dar de Baja Perfil
                    </button>
                </div>
            </form>
        </div>
    </main>
    <script src="/app/views/js/validations.js"></script>
</body>

</html>