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
                        <img id="foto_perfil" src="data:<?php echo $usuario->getTipoImg(); ?>;base64,<?php echo base64_encode($usuario->getFotoPerfil()); ?>" alt="Foto de perfil">
                    </div>
                    <h1 class="reporte-titulo">Lista de seguidores</h1>
                </div>

                <!-- Buttons for toggling lists -->
                <div class="toggle-buttons">
                    <button class="toggle-button active">Lista de Seguidores</button>
                    <button class="toggle-button">Lista de Seguidos</button>
                </div>

                <!-- Followers list -->
                <div class="followers-grid">
                    <div class="tarjeta-userRep">
                        <img src="/app/views/assets/emi3.jpg" alt="">
                        <p id="name_follower" name="name_follower">Emiliano Frias Felix</p>
                    </div>
                    <div class="tarjeta-userRep">
                        <img src="/app/views/assets/emi3.jpg" alt="">
                        <p id="name_follower" name="name_follower">Emiliano Frias Felix</p>
                    </div>
                    <div class="tarjeta-userRep">
                        <img src="/app/views/assets/emi3.jpg" alt="">
                        <p id="name_follower" name="name_follower">Emiliano Frias Felix</p>
                    </div>
                    <div class="tarjeta-userRep">
                        <img src="/app/views/assets/emi3.jpg" alt="">
                        <p id="name_follower" name="name_follower">Emiliano Frias Felix</p>
                    </div>
                </div>
            </div>
        </div>

    </main>
</body>

</html>