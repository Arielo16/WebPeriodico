<?php

namespace App\Core\Entities;

use Illuminate\Support\Facades\Hash;

class User
{
    private $id;
    private $name;
    private $email;
    private $password;

    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
    
    public static function create(array $data): self
    {
        $data['password'] = Hash::make($data['password']);
        return new self(null, $data['name'], $data['email'], $data['password']);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
    }

    public static function login(array $credentials)
    {
        // Implementar lógica de autenticación aquí si es necesario
    }
}
