<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>
    <?php
    require_once __DIR__ . '/plantillas/menu_lateral.php';
    ?>
    <main class="main_body_indexRep">

        <div class="main_body_pageReporte">
            <div class="pageRep_datos"> <!-- Divisor de la página del Usuario-->
                <div class="foto_edit_Usu">
                    <div class="foto_edit_Usu">
                        <img id="foto_perfil" src="data:<?php echo $usuarioSesion->getTipoImg(); ?>;base64,<?php echo base64_encode($usuarioSesion->getFotoPerfil()); ?>" alt="Foto de perfil">
                    </div>
                    <h1 class="reporte-titulo">Lista de seguidores</h1>
                </div>

                <!-- Buttons for toggling lists -->
                <div class="toggle-buttons">
                    <a href="/reportes" class="toggle-button <?php if (!$seguidosActivo) echo "active" ?>">Lista de Seguidores</a>
                    <a href="/reportes/seguidos" class="toggle-button <?php if ($seguidosActivo) echo "active" ?>">Lista de Seguidos</a>
                </div>

                <!-- Followers list -->
                <div class="followers-grid">
                    <?php
                    foreach ($dataSeguidores as $seguidor) {
                        $usuario = $this->usuarioDao->obtenerUsuarioPorId($seguidor['ID_USUARIO']);
                    ?>
                        <div class="tarjeta-userRep">
                            <img src="data:<?php echo $usuario['TIPO_IMG']; ?>;base64,<?php echo base64_encode($usuario['FOTO_PERFIL']); ?>" alt="Foto de perfil">
                            <p id="name_follower" name="name_follower"><?php
                                                                        echo $usuario['USERNAME'];
                                                                        ?></p>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>

    </main>
</body>

</html>