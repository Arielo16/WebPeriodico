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

    public function execute($notciaID, $title, $description, $views, $categoryID, $matricula)
    {
        $newsEntity = new NewsEntity($notciaID, $title, $description, $views, $categoryID, $matricula);
        $newsData = [
            'notciaID' => $newsEntity->notciaID,
            'title' => $newsEntity->title,
            'description' => $newsEntity->description,
            'views' => $newsEntity->views,
            'categoryID' => $newsEntity->categoryID,
            'matricula' => $newsEntity->matricula,
        ];
        
        return $this->newsRepository->create($newsData);
    }
}
