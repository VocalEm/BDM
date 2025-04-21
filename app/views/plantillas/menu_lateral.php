<?php
// Asegurarse de que la variable global esté disponible
global $usuarioSesion;
?>
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
                                                                    $this->middleware->cerrarSesion();
                                                                }
                                                                ?>">
            <?php if (isset($usuarioSesion) && $usuarioSesion !== null): ?>
                <img
                    id="OpenDash"
                    src="data:<?php echo $usuarioSesion->getTipoImg(); ?>;base64,<?php echo base64_encode($usuarioSesion->getFotoPerfil()); ?>"
                    class="header_icono foto_usuario"
                    alt="Oculto" />
            <?php else: ?>
                <img
                    id="OpenDash"
                    src="/path/to/default/image.png"
                    class="header_icono foto_usuario"
                    alt="Imagen por defecto" />
            <?php endif; ?>
        </a>
        <a class="icono_bl" href="/home/cerrarSesion">
            <i class="fa-solid fa-right-from-bracket fa-6x"></i>
        </a>
    </nav>
</aside>