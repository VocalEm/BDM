<?php

class RegisterController
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function index() {}

    public function render()
    {
        require_once __DIR__ . '/../views/register.php';
    }
}
