CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_publicacion`(
    IN p_opcion INT,
    IN p_ID_PUBLICACION INT,
    IN p_DESCRIPCION VARCHAR(200),
    IN p_ID_USUARIO INT,
    IN p_CATEGORIA VARCHAR(50),
    IN p_ESTATUS TINYINT,
    IN p_FECHA_CREACION DATETIME,
    IN p_CONTADOR_LIKES INT,
    IN p_RUTA_VIDEO VARCHAR(255),
    IN p_TIPO_IMG VARCHAR(50),
    IN p_IMAGEN LONGBLOB
)
BEGIN
    CASE p_opcion
        -- Opción 1: Registrar una publicación
        WHEN 1 THEN
            INSERT INTO publicaciones (
                DESCRIPCION, ID_USUARIO, CATEGORIA, ESTATUS, FECHA_CREACION, 
                CONTADOR_LIKES, RUTA_VIDEO, TIPO_IMG, IMAGEN
            ) VALUES (
                p_DESCRIPCION, p_ID_USUARIO, p_CATEGORIA, p_ESTATUS, NOW(), 
                p_CONTADOR_LIKES, p_RUTA_VIDEO, p_TIPO_IMG, p_IMAGEN
            );
            SELECT TRUE AS correcto;

        -- Opción 2: Desactivar una publicación
        WHEN 2 THEN
            UPDATE publicaciones
            SET ESTATUS = 0
            WHERE ID_PUBLICACION = p_ID_PUBLICACION;
            SELECT TRUE AS correcto;

        -- Opción 3: Modificar una publicación
        WHEN 3 THEN
            UPDATE publicaciones
            SET 
                DESCRIPCION = p_DESCRIPCION,
                ID_USUARIO = p_ID_USUARIO,
                CATEGORIA = p_CATEGORIA,
                ESTATUS = p_ESTATUS,
                FECHA_CREACION = p_FECHA_CREACION,
                CONTADOR_LIKES = p_CONTADOR_LIKES,
                RUTA_VIDEO = p_RUTA_VIDEO,
                TIPO_IMG = p_TIPO_IMG,
                IMAGEN = p_IMAGEN
            WHERE ID_PUBLICACION = p_ID_PUBLICACION;
            SELECT TRUE AS correcto;

        -- Opción 4: Mostrar una publicación específica
        WHEN 4 THEN
            SELECT 
                ID_PUBLICACION,
                DESCRIPCION,
                ID_USUARIO,
                CATEGORIA,
                ESTATUS,
                FECHA_CREACION,
                CONTADOR_LIKES,
                RUTA_VIDEO,
                TIPO_IMG,
                IMAGEN
            FROM publicaciones
            WHERE ID_PUBLICACION = p_ID_PUBLICACION;

        -- Opción 5: Obtener todas las publicaciones
        WHEN 5 THEN
            SELECT 
                ID_PUBLICACION,
                DESCRIPCION,
                ID_USUARIO,
                CATEGORIA,
                ESTATUS,
                FECHA_CREACION,
                CONTADOR_LIKES,
                RUTA_VIDEO,
                TIPO_IMG,
                IMAGEN
            FROM publicaciones;
        
        -- opcion 6 obtener todas las categorias
		WHEN 6 THEN 
			SELECT
            ID_CATEGORIA,
            NOMBRE
            FROM categoria;
		
        -- opcion 7 obtiene publicaciones de un usuario en especifico
		WHEN 7 THEN
			SELECT
				ID_PUBLICACION,
                DESCRIPCION,
                ID_USUARIO,
                CATEGORIA,
                ESTATUS,
                FECHA_CREACION,
                CONTADOR_LIKES,
                RUTA_VIDEO,
                TIPO_IMG,
                IMAGEN
			FROM publicaciones
            WHERE ID_USUARIO = p_ID_USUARIO;
            
		WHEN 8 THEN -- opcion 8 crea un comentario
			INSERT INTO comentarios
            (
                ID_USUARIO, COMENTARIO, ID_PUBLICACION
            ) VALUES (
                p_ID_USUARIO, p_DESCRIPCION, p_ID_PUBLICACION
            );
            SELECT TRUE AS correcto;
		
        WHEN 9 THEN -- opcion 9 crea un comentario
			SELECT
				a.ID_COMENTARIO,
                a.ID_USUARIO,
                a.COMENTARIO,
                a.ID_PUBLICACION, 
                b.FOTO_PERFIL,
                b.TIPO_IMG,
                b.USERNAME
			FROM comentarios a
            JOIN usuarios b
            ON a.ID_USUARIO = b.ID_USUARIO
            WHERE a.ID_PUBLICACION = p_ID_PUBLICACION;
			
        -- Manejo de error: Opción no válida
        ELSE
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Opción no válida en el procedimiento';
    END CASE;
END