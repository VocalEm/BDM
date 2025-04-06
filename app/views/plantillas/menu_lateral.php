<aside class="main_body_barralateral">
    <nav class="main_body_barralateral_iconos">
        <a class="icono_bl" href="/home">
            <img
                id="OpenDash"
                src="/app/views/assets/Home.png"
                class="header_icono"
                alt="Inicio" />
        </a>

        <a class="icono_bl">
            <img
                id="OpenDash"
                src="/app/views/assets/Plus square.png"
                class="header_icono"
                alt="Agregar" />
        </a>
        <a class="icono_bl icono_bl_foto" href="/perfil/render/<?php
                                                                if (isset($_SESSION['id_user'])) {
                                                                    echo $_SESSION['id_user'];
                                                                } else {
                                                                    session_start();
                                                                    session_unset(); // Eliminar todas las variables de sesión
                                                                    session_destroy(); // Destruir la sesión
                                                                    setcookie('id_user', '', time() - 3600, "/"); // Eliminar la cookie
                                                                    $this->redirigir('/login'); // Redirigir al inicio de sesión
                                                                }
                                                                ?>">


            <img
                id="OpenDash"
                src="data:<?php echo $usuario->getTipoImg(); ?>;base64,<?php echo base64_encode($usuario->getFotoPerfil()); ?>"
                class="header_icono foto_usuario"
                alt="Oculto" />
        </a>
    </nav>
</aside>