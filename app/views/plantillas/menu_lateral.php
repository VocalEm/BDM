<aside class="main_body_barralateral">
    <nav class="main_body_barralateral_iconos">
        <a class="icono_bl" href="/home">
            <i class="fa-solid fa-house fa-6x"></i>
        </a>

        <a class="icono_bl" href="/crearpublicacion">
            <i class=" fa-regular fa-square-plus fa-6x"></i>
        </a>
        <a class="icono_bl" href="/solicitudes">
            <i class="fa-solid fa-user-plus fa-6x"></i>
        </a>
        <a class="icono_bl icono_bl_foto" href="/perfil/render/<?php
                                                                if (isset($_SESSION['id_user'])) {
                                                                    echo $_SESSION['id_user'];
                                                                } else {
                                                                    session_start();
                                                                    session_unset(); // Eliminar todas las variables de sesión
                                                                    session_destroy(); // Destruir la sesión
                                                                    if (isset($_COOKIE['id_user'])) {
                                                                        // Configurar la cookie con parámetros más específicos y un tiempo pasado
                                                                        setcookie('id_user', '', time() - 3600, "/", "", false, true);
                                                                    }
                                                                    $this->redirigir('/login'); // Redirigir al inicio de sesión
                                                                }
                                                                ?>">


            <img
                id="OpenDash"
                src="data:<?php echo $usuario->getTipoImg(); ?>;base64,<?php echo base64_encode($usuario->getFotoPerfil()); ?>"
                class="header_icono foto_usuario"
                alt="Oculto" />
        </a>
        <a class="icono_bl">
            <i class="fa-solid fa-right-from-bracket fa-6x"></i>
        </a>
    </nav>
</aside>