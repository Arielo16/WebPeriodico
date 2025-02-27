<?php

namespace App\Core\Writers\Entities;

class WriterEntity
{
    public $matricula;
    public $name;
    public $last_name;
    public $secund_last_name;

    public function __construct($matricula, $name, $last_name, $secund_last_name)
    {
        $this->matricula = $matricula;
        $this->name = $name;
        $this->last_name = $last_name;
        $this->secund_last_name = $secund_last_name;
    }
}
