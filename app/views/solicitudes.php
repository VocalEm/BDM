<?php
require_once __DIR__ . '/plantillas/head.php';
?>

<body>
    <?php
    require_once __DIR__ . '/plantillas/header.php';
    ?>


    <div class="body_grid">
        <?php
        require_once __DIR__ . '/plantillas/menu_lateral.php';
        ?>
        <main class="main_body_indexRep main_grid">

            <div class="main_body_pageReporte">
                <div class="pageRep_datos"> <!-- Divisor de la página del Usuario-->
                    <div class="foto_edit_Usu">
                        <div class="foto_edit_Usu">
                            <img id="foto_perfil" src="data:<?php echo $usuarioSesion->getTipoImg(); ?>;base64,<?php echo base64_encode($usuarioSesion->getFotoPerfil()); ?>" alt="Foto de perfil">
                        </div>
                        <h1 class="reporte-titulo">Solicitudes de Usuarios</h1>
                    </div>

                    <!-- User requests list -->
                    <div class="requests-grid">
                        <?php

                        foreach ($dataSolicitudes as $solicitud) {
                            $usuario = $this->usuarioDao->obtenerUsuarioPorId($solicitud['ID_USUARIO']);
                        ?>
                            <div class="tarjeta-userRep">
                                <img src="data:<?php echo $usuario['TIPO_IMG']; ?>;base64,<?php echo base64_encode($usuario['FOTO_PERFIL']); ?>" alt="Foto de perfil">
                                <p id="name_user" name="name_user"><?php
                                                                    echo $usuario['USERNAME'];
                                                                    ?></p>
                                </p>
                                <div class="action-buttons">
                                    <a href="/solicitudes/aceptar/<?php echo $usuario["ID_USUARIO"]; ?>" class="btn_accept">Aceptar</a>
                                    <a href="/solicitudes/rechazar/<?php echo $usuario["ID_USUARIO"]; ?>" class="btn_reject">Rechazar</a>
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>

        </main>
    </div>


</body>

</html>