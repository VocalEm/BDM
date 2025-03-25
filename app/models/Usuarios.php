<?php

class Usuarios
{
    private $idUsuario;
    private $nombre;
    private $apellidoPaterno;
    private $apellidoMaterno;
    private $correo;
    private $fechaNacimiento;
    private $sexo;
    private $password;
    private $fotoPerfil;
    private $estatus;
    private $privacidad;
    private $fechaRegistro;

    public function __construct($idUsuario, $nombre, $apellidoPaterno, $apellidoMaterno, $correo, $fechaNacimiento, $sexo, $password, $fotoPerfil, $estatus, $privacidad, $fechaRegistro)
    {
        $this->idUsuario = $idUsuario;
        $this->nombre = $nombre;
        $this->apellidoPaterno = $apellidoPaterno;
        $this->apellidoMaterno = $apellidoMaterno;
        $this->correo = $correo;
        $this->fechaNacimiento = $fechaNacimiento;
        $this->sexo = $sexo;
        $this->password = $password;
        $this->fotoPerfil = $fotoPerfil;
        $this->estatus = $estatus;
        $this->privacidad = $privacidad;
        $this->fechaRegistro = $fechaRegistro;
    }

    public function getIdUsuario()
    {
        return $this->idUsuario;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getApellidoPaterno()
    {
        return $this->apellidoPaterno;
    }

    public function getApellidoMaterno()
    {
        return $this->apellidoMaterno;
    }

    public function getCorreo()
    {
        return $this->correo;
    }

    public function getFechaNacimiento()
    {
        return $this->fechaNacimiento;
    }

    public function getSexo()
    {
        return $this->sexo;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function getFotoPerfil()
    {
        return $this->fotoPerfil;
    }

    public function getEstatus()
    {
        return $this->estatus;
    }

    public function getPrivacidad()
    {
        return $this->privacidad;
    }

    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    public function setIdUsuario($idUsuario)
    {
        $this->idUsuario = $idUsuario;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setApellidoPaterno($apellidoPaterno)
    {
        $this->apellidoPaterno = $apellidoPaterno;
    }

    public function setApellidoMaterno($apellidoMaterno)
    {
        $this->apellidoMaterno = $apellidoMaterno;
    }

    public function setCorreo($correo)
    {
        $this->correo = $correo;
    }

    public function setFechaNacimiento($fechaNacimiento)
    {
        $this->fechaNacimiento = $fechaNacimiento;
    }

    public function setSexo($sexo)
    {
        $this->sexo = $sexo;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public function setFotoPerfil($fotoPerfil)
    {
        $this->fotoPerfil = $fotoPerfil;
    }

    public function setEstatus($estatus)
    {
        $this->estatus = $estatus;
    }

    public function setPrivacidad($privacidad)
    {
        $this->privacidad = $privacidad;
    }

    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;
    }
}
