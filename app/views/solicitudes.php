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
                        <div class="tarjeta-userRep">
                            <img src="/app/views/assets/emi3.jpg" alt="Foto de perfil">
                            <p id="name_user" name="name_user">Usuario 1</p>
                            <div class="action-buttons">
                                <button class="btn_accept">Aceptar</button>
                                <button class="btn_reject">Rechazar</button>
                            </div>
                        </div>
                        <div class="tarjeta-userRep">
                            <img src="/app/views/assets/emi3.jpg" alt="Foto de perfil">
                            <p id="name_user" name="name_user">Usuario 2</p>
                            <div class="action-buttons">
                                <button class="btn_accept">Aceptar</button>
                                <button class="btn_reject">Rechazar</button>
                            </div>
                        </div>
                        <div class="tarjeta-userRep">
                            <img src="/app/views/assets/emi3.jpg" alt="Foto de perfil">
                            <p id="name_user" name="name_user">Usuario 3</p>
                            <div class="action-buttons">
                                <button class="btn_accept">Aceptar</button>
                                <button class="btn_reject">Rechazar</button>
                            </div>
                        </div>

                        <div class="tarjeta-userRep">
                            <img src="/app/views/assets/emi3.jpg" alt="Foto de perfil">
                            <p id="name_user" name="name_user">Usuario 1</p>
                            <div class="action-buttons">
                                <button class="btn_accept">Aceptar</button>
                                <button class="btn_reject">Rechazar</button>
                            </div>
                        </div>
                        <div class="tarjeta-userRep">
                            <img src="/app/views/assets/emi3.jpg" alt="Foto de perfil">
                            <p id="name_user" name="name_user">Usuario 2</p>
                            <div class="action-buttons">
                                <button class="btn_accept">Aceptar</button>
                                <button class="btn_reject">Rechazar</button>
                            </div>
                        </div>
                        <div class="tarjeta-userRep">
                            <img src="/app/views/assets/emi3.jpg" alt="Foto de perfil">
                            <p id="name_user" name="name_user">Usuario 3</p>
                            <div class="action-buttons">
                                <button class="btn_accept">Aceptar</button>
                                <button class="btn_reject">Rechazar</button>
                            </div>
                        </div>
                        <div class="tarjeta-userRep">
                            <img src="/app/views/assets/emi3.jpg" alt="Foto de perfil">
                            <p id="name_user" name="name_user">Usuario 1</p>
                            <div class="action-buttons">
                                <button class="btn_accept">Aceptar</button>
                                <button class="btn_reject">Rechazar</button>
                            </div>
                        </div>
                        <div class="tarjeta-userRep">
                            <img src="/app/views/assets/emi3.jpg" alt="Foto de perfil">
                            <p id="name_user" name="name_user">Usuario 2</p>
                            <div class="action-buttons">
                                <button class="btn_accept">Aceptar</button>
                                <button class="btn_reject">Rechazar</button>
                            </div>
                        </div>
                        <div class="tarjeta-userRep">
                            <img src="/app/views/assets/emi3.jpg" alt="Foto de perfil">
                            <p id="name_user" name="name_user">Usuario 3</p>
                            <div class="action-buttons">
                                <button class="btn_accept">Aceptar</button>
                                <button class="btn_reject">Rechazar</button>
                            </div>
                        </div>
                        <!-- Add more user cards as needed -->
                    </div>
                </div>
            </div>

        </main>
    </div>


</body>

</html>