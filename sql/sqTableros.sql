CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_tablero`(
	IN p_opcion INT,
    IN p_ID_TABLERO INT,
    IN p_TITULO VARCHAR(80),
    IN p_ID_USUARIO INT,
    IN p_PORTADA LONGBLOB,
    IN p_ID_PUBLICACION INT,
    IN p_DESCRIPCION VARCHAR(200),
    IN p_TIPO_IMG VARCHAR(50)
)
BEGIN
CASE p_opcion
        -- Opción 1: Registrar una publicación
        WHEN 1 THEN
            INSERT INTO tableros (
                ID_USUARIO, TITULO, PORTADA, DESCRIPCION, TIPO_IMG
            ) VALUES (
				p_ID_USUARIO, p_TITULO, p_PORTADA, p_DESCRIPCION, p_TIPO_IMG
            );
            SELECT TRUE AS correcto;
		
        -- obtener todos los tableros de un usuario
        WHEN 2 THEN
			SELECT
				ID_TABLERO,
				ID_USUARIO, 
                TITULO,
                PORTADA,
                DESCRIPCION,
                TIPO_IMG
			FROM tableros
            WHERE ID_USUARIO = p_ID_USUARIO;
            
            
            -- guardar publicacion en tablero
		WHEN 3 THEN
            INSERT INTO tablero_detalle (
                ID_TABLERO, ID_PUBLICACION
            ) VALUES (
				p_ID_TABLERO, p_ID_PUBLICACION
            );
            SELECT TRUE AS correcto;
            
            -- obtener publicaciones del tablero
		WHEN 4 THEN
			SELECT 
				a.ID_TABLERO,
                b.ID_PUBLICACION,
                b.DESCRIPCION,
                b.ID_USUARIO,
                b.CATEGORIA,
                b.ESTATUS,
                b.FECHA_CREACION,
                b.CONTADOR_LIKES,
                b.RUTA_VIDEO,
                b.TIPO_IMG,
                b.IMAGEN
			FROM tablero_detalle a
            JOIN publicaciones b
            ON a.ID_PUBLICACION = b.ID_PUBLICACION
            WHERE a.ID_TABLERO = p_ID_TABLERO;
            
            -- verifica si una publicacion esta guardada por el usuario
		WHEN 5 THEN
			SELECT
				a.ID_PUBLICACION,
                b.ID_USUARIO
			FROM tablero_detalle a
            JOIN tableros b
            ON a.ID_TABLERO = b.ID_TABLERO
            WHERE a.ID_PUBLICACION = p_ID_PUBLICACION
            AND b.ID_USUARIO = p_ID_USUARIO;
        
		ELSE
            SIGNAL SQLSTATE '45000'
            SET MESSAGE_TEXT = 'Opción no válida en el procedimiento';
    END CASE;

END