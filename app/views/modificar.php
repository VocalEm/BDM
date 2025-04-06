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
            <form class="pageUsu_datosUsu" action="/modificar/form" method="POST" enctype="multipart/form-data"> <!-- Divisor de la página del Usuario-->
                <div class="foto_edit_Usu">
                    <div class="foto_perfilUsu">
                        <img id="foto_perfil" src="data:<?php echo $usuario->getTipoImg(); ?>;base64,<?php echo base64_encode($usuario->getFotoPerfil()); ?>" alt="Foto de perfil">
                    </div>
                    <div class="btn_edit">
                        <input type="file" name="fotoPerfil" class="btn_accion" id="btn_cambiarFoto" style="font-size: 14px; padding: 5px;">
                    </div>
                </div>
                <div class="forms_label_reg">
                    <input type="hidden" name="ID_USUARIO" value="<?php echo $usuario->getIdUsuario(); ?>">
                    <label class="label_reg">Nombre(s):</label>
                    <input type="text" name="NOMBRE" id="input_name_edit" class="inputs_reg" value="<?php echo $usuario->getNombre() ?? ''; ?>">
                    <label class="label_reg">Apellido Paterno:</label>
                    <input type="text" name="APELLIDO_PATERNO" id="input_apeP_edit" class="inputs_reg" value="<?php echo $usuario->getApellidoPaterno() ?? ''; ?>">
                    <label class="label_reg">Apellido Materno:</label>
                    <input type="text" name="APELLIDO_MATERNO" id="input_apeM_edit" class="inputs_reg" value="<?php echo $usuario->getApellidoMaterno() ?? ''; ?>">
                    <label class="label_reg">Fecha de Nacimiento:</label>
                    <input type="date" name="FECHA_NACIMINENTO" id="input_fecN_edit" class="inputs_reg" value="<?php echo $usuario->getFechaNacimiento() ?? ''; ?>">
                    <label class="label_reg">Sexo:</label>
                    <div style="display: flex; flex-direction: row; justify-content: space-between;">
                        <label class="label_reg">
                            <input type="radio" name="SEXO" id="radio_sexo" value="masculino" <?php echo ($usuario->getSexo() == 1) ? 'checked' : ''; ?>>Masculino
                        </label>
                        <label class="label_reg">
                            <input type="radio" name="SEXO" id="radio_sexo" value="femenino" <?php echo ($usuario->getSexo() == 0) ? 'checked' : ''; ?>>Femenino
                        </label>
                    </div>
                    <label class="label_reg">Nombre de Usuario:</label>
                    <input type="text" name="USERNAME" id="input_aka_edit" class="inputs_reg" value="<?php echo $usuario->getUsername() ?? ''; ?>">
                    <label class="label_reg">Correo Electrónico:</label>
                    <input type="email" name="CORREO" id="input_mail_edit" class="inputs_reg" value="<?php echo $usuario->getCorreo() ?? ''; ?>">
                    <label class="label_reg">Contraseña:</label>
                    <input type="password" name="PASSWORD" id="input_pass_edit" class="inputs_reg" value="">
                    <label class="label_reg">Privacidad:</label>
                    <div style="display: flex; flex-direction: row; justify-content: space-between;">
                        <label class="label_reg">
                            <input type="radio" name="PRIVACIDAD" id="radio_privacidad0" value="1" <?php echo ($usuario->getPrivacidad() == 1) ? 'checked' : ''; ?>>Público
                        </label>
                        <label class="label_reg">
                            <input type="radio" name="PRIVACIDAD" id="radio_privacidad1" value="2" <?php echo ($usuario->getPrivacidad() == 2) ? 'checked' : ''; ?>>Privado
                        </label>
                    </div>
                </div>
                <div class="btn_label_reg">
                    <input value="Modificar Usuario" name="enviar" type="submit" class="btn_accion" id="btn_guardarCambios" style="font-size: 15px; background-color: #FBBF24;margin-top: 0px;">
                </div>
            </form>
        </div>
    </main>
</body>

</html>