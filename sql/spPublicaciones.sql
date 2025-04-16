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
            
        -- Manejo de error: Opción no válida
        ELSE
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Opción no válida en el procedimiento';
    END CASE;
END