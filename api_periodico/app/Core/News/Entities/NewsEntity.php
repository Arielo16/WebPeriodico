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
    public $images;

    public function __construct($noticiaID, $title, $description, $views, $categoryID, $writer_name, $images = [])
    {
        $this->noticiaID = $noticiaID;
        $this->title = $title;
        $this->description = $description;
        $this->views = $views;
        $this->categoryID = $categoryID;
        $this->writer_name = $writer_name;
        $this->images = $images;
    }

    public function toArray()
    {
        return [
            'noticiaID' => $this->noticiaID,
            'title' => $this->title,
            'description' => $this->description,
            'views' => $this->views,
            'categoryID' => $this->categoryID,
            'writer_name' => $this->writer_name,
            'images' => $this->images,
        ];
    }
}
