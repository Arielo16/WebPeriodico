<?php

namespace App\Core\Writers\Entities;

class NewsEntity
{
    public $notciaID;
    public $title;
    public $description;
    public $views;
    public $categoryID;
    public $matricula;

    public function __construct($notciaID, $title, $description, $views, $categoryID, $matricula)
    {
        $this->notciaID = $notciaID;
        $this->title = $title;
        $this->description = $description;
        $this->views = $views;
        $this->categoryID = $categoryID;
        $this->matricula = $matricula;
    }

}
