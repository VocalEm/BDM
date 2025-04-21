<?php
require_once __DIR__ . '/plantillas/head.php';
require_once __DIR__ . '/plantillas/header.php';
?>

<body>
    <?php
    require_once __DIR__ . '/plantillas/menu_lateral.php';
    ?>
    <main class="main_body_index">

        <div class="main_body_pageTab" style="margin-left: 120px;">
            <div class="tablero"> <!-- Divisor de la página del Tablero-->
                <h1 class="titulo_tablero">Tableros</h1>
                <?php
                if ($usuarioEnSesion) {
                ?>
                    <a href="/tableros/crear" class="btn_accion">Crear Tablero</a>
                <?php
                }
                ?>

            </div>

            <div class="pageUsu_publics">
                <div class="publicaciones-grid">
                    <?php
                    foreach ($tablerosData as $tablero) {
                    ?>
                        <a class="tableros" href="/tableros/detalle/<?php echo $tablero['ID_TABLERO']; ?>">
                            <img
                                src="data:<?php echo htmlspecialchars($tablero['TIPO_IMG']); ?>;base64,<?php echo base64_encode($tablero['PORTADA']); ?>"
                                alt="<?php echo htmlspecialchars($tablero['TITULO']); ?>">
                            <p class="titulo-publicacion"><?php echo htmlspecialchars($tablero['TITULO']); ?></p>
                        </a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

    </main>
</body>

</html>