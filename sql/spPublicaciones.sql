CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_usuario`(
    IN p_opcion INT,
    IN p_ID_USUARIO INT,
    IN p_NOMBRE VARCHAR(50),
    IN p_APELLIDO_PATERNO VARCHAR(50),
    IN p_APELLIDO_MATERNO VARCHAR(50),
    IN p_CORREO VARCHAR(80),
    IN p_FECHA_NACIMIENTO DATE,
    IN p_SEXO TINYINT,
    IN p_USERNAME VARCHAR(50),
    IN p_PASSWORD VARCHAR(60),
    IN p_FOTO_PERFIL LONGBLOB,
    IN p_PRIVACIDAD TINYINT,
    IN P_TIPO_IMG VARCHAR(50)
)
BEGIN
    CASE p_opcion
        -- Opción 1: Registrar un usuario
        WHEN 1 THEN
            -- Validar si el correo ya existe
            IF EXISTS (
                SELECT 1 FROM usuarios WHERE CORREO = p_CORREO
            ) THEN
                SELECT TRUE AS correo;
            
            -- Validar si el nombre de usuario ya existe
            ELSEIF EXISTS (
                SELECT 1 FROM usuarios WHERE USERNAME = p_USERNAME
            ) THEN
                SELECT TRUE AS username;

            ELSE
                -- Registrar usuario si no hay conflictos
                INSERT INTO usuarios (
                    NOMBRE, APELLIDO_PATERNO, APELLIDO_MATERNO, CORREO, FECHA_NACIMINENTO,
                    SEXO, USERNAME, `PASSWORD`, FOTO_PERFIL, ESTATUS, PRIVACIDAD, FECHA_REGISTRO,TIPO_IMG
                ) VALUES (
                    p_NOMBRE, p_APELLIDO_PATERNO, p_APELLIDO_MATERNO, p_CORREO, p_FECHA_NACIMIENTO,
                    p_SEXO, p_USERNAME, p_PASSWORD, p_FOTO_PERFIL, 1, p_PRIVACIDAD, NOW(), P_TIPO_IMG
                );
                SELECT TRUE AS output;
            END IF;


        -- Opción 2: Desactivar un usuario
        WHEN 2 THEN
            UPDATE usuarios
            SET ESTATUS = 0
            WHERE ID_USUARIO = p_ID_USUARIO;
            SELECT TRUE AS correcto;

        -- Opción 3: Modificar un usuario
		WHEN 3 THEN
            UPDATE usuarios
            SET 
                NOMBRE = p_NOMBRE,
                APELLIDO_PATERNO = p_APELLIDO_PATERNO,
                APELLIDO_MATERNO = p_APELLIDO_MATERNO,
                CORREO = p_CORREO,
                FECHA_NACIMINENTO = p_FECHA_NACIMIENTO,
                SEXO = p_SEXO,
                USERNAME = p_USERNAME,
                `PASSWORD` = p_PASSWORD,
                FOTO_PERFIL = p_FOTO_PERFIL,
                PRIVACIDAD = p_PRIVACIDAD,
                TIPO_IMG = P_TIPO_IMG
            WHERE ID_USUARIO = p_ID_USUARIO;
            SELECT TRUE AS correcto;

        -- Opción 4: Mostrar un usuario específico
        WHEN 4 THEN
            SELECT 
                ID_USUARIO,
                NOMBRE,
                APELLIDO_PATERNO,
                APELLIDO_MATERNO,
                CORREO,
                FECHA_NACIMINENTO,
                SEXO,
                USERNAME,
                `PASSWORD`,
                FOTO_PERFIL,
                ESTATUS,
                PRIVACIDAD,
                FECHA_REGISTRO,
				TIPO_IMG,
                SEGUIDORES,
                SEGUIDOS,
                PUBLICACIONES
            FROM usuarios
            WHERE ID_USUARIO = p_ID_USUARIO;

        -- Opción 5: Obtener todos los usuarios
        WHEN 5 THEN
            SELECT 
                ID_USUARIO,
                NOMBRE,
                APELLIDO_PATERNO,
                APELLIDO_MATERNO,
                CORREO,
                FECHA_NACIMINENTO,
                SEXO,
                USERNAME,
                `PASSWORD`,
                FOTO_PERFIL,
                ESTATUS,
                PRIVACIDAD,
                FECHA_REGISTRO,
                TIPO_IMG
            FROM usuarios;

        -- Opción 6: Login - Retornar información del usuario
        WHEN 6 THEN
            SELECT 
                ID_USUARIO,
                NOMBRE,
                APELLIDO_PATERNO,
                APELLIDO_MATERNO,
                CORREO,
                `PASSWORD`,
                USERNAME,
                ESTATUS
            FROM usuarios
            WHERE CORREO = p_CORREO  AND ESTATUS = 1;

        -- Manejo de error: Opción no válida
        ELSE
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Opción no válida en el procedimiento';
    END CASE;
END