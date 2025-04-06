<?php

namespace App\Models;


class Usuarios
{
    private $idUsuario;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $correo;
    private $fechaNacimiento;
    private $sexo;
    private $username;
    private $password;
    private $fotoPerfil;
    private $privacidad;
    private $tipoImg;

    public function __construct(
        $idUsuario = null,
        $nombre = null,
        $apellidoPaterno = null,
        $apellidoMaterno = null,
        $correo = null,
        $fechaNacimiento = null,
        $sexo = null,
        $username = null,
        $password = null,
        $fotoPerfil = null,
        $privacidad = 1,
        $tipoImg = null
    ) {
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->correo = $correo;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->sexo = $sexo;
        $this->username = $username;
        $this->password = $password;
        $this->fotoPerfil = $fotoPerfil;
        $this->privacidad = $privacidad;
        $this->tipoImg = $tipoImg;
    }

    // Getters y Setters
    public function getIdUsuario()
    {
        return $this->idUsuario;
    }
    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function getTipoImg()
    {
        return $this->tipoImg;
    }
    public function setTipoImg($tipoImg)
    {
        $this->tipoImg = $tipoImg;
    }


    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }
    public function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    public function getApellidoMaterno()
    {
        return $this->apellidoMaterno;
    }
    public function setApellidoMaterno($apellidoMaterno)
    {
        $this->apellidoMaterno = $apellidoMaterno;
    }

    public function getCorreo()
    {
        return $this->correo;
    }
    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }
    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function getSexo()
    {
        return $this->sexo;
    }
    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function getUsername()
    {
        return $this->username;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }

    public function getPassword()
    {
        return $this->password;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function getFotoPerfil()
    {
        return $this->fotoPerfil;
    }
    public function setFotoPerfil($fotoPerfil)
    {
        $this->fotoPerfil = $fotoPerfil;
    }

    public function getPrivacidad()
    {
        return $this->privacidad;
    }
    public function setPrivacidad($privacidad)
    {
        $this->privacidad = $privacidad;
    }
}
