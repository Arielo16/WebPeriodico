<?php

namespace App\Core\Users\Entities;

class UserEntity
{
    public $id;
    public $name;
    public $email;
    public $password;

    public function __construct($id, $name, $email, $password)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
    }
}
