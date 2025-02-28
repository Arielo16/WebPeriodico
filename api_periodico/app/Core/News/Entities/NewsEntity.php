<?php

namespace App\Core\News\Entities;

class NewsEntity
{
    public $noticiaID;
    public $title;
    public $description;
    public $views;
    public $categoryID;
    public $matricula;

    public function __construct($noticiaID, $title, $description, $views, $categoryID, $matricula)
    {
        $this->noticiaID = $noticiaID;
        $this->title = $title;
        $this->description = $description;
        $this->views = $views;
        $this->categoryID = $categoryID;
        $this->matricula = $matricula;
    }

}
