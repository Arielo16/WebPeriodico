<?php

namespace App\Core\News\Entities;

class NewsEntity
{
    public $noticiaID;
    public $title;
    public $description;
    public $views;
    public $categoryID;
    public $writer_name;

    public function __construct($noticiaID, $title, $description, $views, $categoryID, $writer_name)
    {
        $this->noticiaID = $noticiaID;
        $this->title = $title;
        $this->description = $description;
        $this->views = $views;
        $this->categoryID = $categoryID;
        $this->writer_name = $writer_name;
    }

}
