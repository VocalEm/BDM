<?php

namespace App\Models;

class Publicaciones
{
    // Attributes
    private int $id_publicacion;
    private string $descripcion;
    private int $id_usuario;
    private string $categoria;
    private int $estatus;
    private string $fecha_creacion;
    private int $contador_likes;
    private string $ruta_video;
    private string $tipo_img;
    private $imagen; // longblob

    // Constructor
    public function __construct(
        int $id_publicacion,
        string $descripcion,
        int $id_usuario,
        string $categoria,
        int $estatus,
        string $fecha_creacion,
        int $contador_likes,
        string $ruta_video,
        string $tipo_img,
        $imagen
    ) {
        $this->id_publicacion = $id_publicacion;
        $this->descripcion = $descripcion;
        $this->id_usuario = $id_usuario;
        $this->categoria = $categoria;
        $this->estatus = $estatus;
        $this->fecha_creacion = $fecha_creacion;
        $this->contador_likes = $contador_likes;
        $this->ruta_video = $ruta_video;
        $this->tipo_img = $tipo_img;
        $this->imagen = $imagen;
    }

    // Getters and Setters
    public function getIdPublicacion(): int
    {
        return $this->id_publicacion;
    }

    public function setIdPublicacion(int $id_publicacion): void
    {
        $this->id_publicacion = $id_publicacion;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getIdUsuario(): int
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    public function getCategoria(): string
    {
        return $this->categoria;
    }

    public function setCategoria(string $categoria): void
    {
        $this->categoria = $categoria;
    }

    public function getEstatus(): int
    {
        return $this->estatus;
    }

    public function setEstatus(int $estatus): void
    {
        $this->estatus = $estatus;
    }

    public function getFechaCreacion(): string
    {
        return $this->fecha_creacion;
    }

    public function setFechaCreacion(string $fecha_creacion): void
    {
        $this->fecha_creacion = $fecha_creacion;
    }

    public function getContadorLikes(): int
    {
        return $this->contador_likes;
    }

    public function setContadorLikes(int $contador_likes): void
    {
        $this->contador_likes = $contador_likes;
    }

    public function getRutaVideo(): string
    {
        return $this->ruta_video;
    }

    public function setRutaVideo(string $ruta_video): void
    {
        $this->ruta_video = $ruta_video;
    }

    public function getTipoImg(): string
    {
        return $this->tipo_img;
    }

    public function setTipoImg(string $tipo_img): void
    {
        $this->tipo_img = $tipo_img;
    }

    public function getImagen()
    {
        return $this->imagen;
    }

    public function setImagen($imagen): void
    {
        $this->imagen = $imagen;
    }
}
