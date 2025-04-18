<?php

namespace App\Models;

class Tableros
{
    // Attributes
    private $id_tablero;
    private $id_usuario;
    private $titulo;
    private $portada;
    private $detalle;
    private $descripcion;
    private $tipo_img;

    // Constructor
    public function __construct(
        int $id_tablero = 0,
        int $id_usuario = 0,
        string $titulo = '',
        $portada = null,
        array $detalle = [],
        string $descripcion = '',
        $tipo_img = null
    ) {
        $this->id_tablero = $id_tablero;
        $this->id_usuario = $id_usuario;
        $this->titulo = $titulo;
        $this->portada = $portada;
        $this->detalle = $detalle;
        $this->descripcion = $descripcion;
        $this->tipo_img = $tipo_img;
    }

    // Getters and Setters
    public function getIdTablero(): int
    {
        return $this->id_tablero;
    }

    public function setIdTablero(int $id_tablero): void
    {
        $this->id_tablero = $id_tablero;
    }

    public function getIdUsuario(): int
    {
        return $this->id_usuario;
    }

    public function setIdUsuario(int $id_usuario): void
    {
        $this->id_usuario = $id_usuario;
    }

    public function getTitulo(): string
    {
        return $this->titulo;
    }

    public function setTitulo(string $titulo): void
    {
        $this->titulo = $titulo;
    }

    public function getPortada(): string
    {
        return $this->portada;
    }

    public function setPortada(string $portada): void
    {
        $this->portada = $portada;
    }

    public function getDetalle(): array
    {
        return $this->detalle;
    }

    public function setDetalle(array $detalle): void
    {
        $this->detalle = $detalle;
    }

    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): void
    {
        $this->descripcion = $descripcion;
    }

    public function getTipoImg()
    {
        return $this->tipo_img;
    }

    public function setTipoImg($tipo_img)
    {
        $this->tipo_img = $tipo_img;
    }
}
