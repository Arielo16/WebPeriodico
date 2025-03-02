<?php

namespace App\Core\News\UseCases;

use App\Core\News\Entities\NewsEntity;
use App\Core\News\Repositories\NewsRepository;

class CreateNews
{
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function execute($noticiaID, $title, $description, $views, $categoryID, $writer_name)
    {
        $newsEntity = new NewsEntity($noticiaID, $title, $description, $views, $categoryID, $writer_name);
        $newsData = [
            'notciaID' => $newsEntity->noticiaID,
            'title' => $newsEntity->title,
            'description' => $newsEntity->description,
            'views' => $newsEntity->views,
            'categoryID' => $newsEntity->categoryID,
            'writer_name' => $newsEntity->writer_name,
        ];

        return $this->newsRepository->create($newsData);
    }
}
