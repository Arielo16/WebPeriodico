<?php


namespace App\Core\News\Repositories;

use App\Models\News;
use App\Core\News\Entities\NewsEntity;

class NewsRepository
{
    public function getAll(): array
    {
        return News::all()->map(function ($news) {
            return new NewsEntity($news->notciaID, $news->title, $news->description, $news->views, $news->categoryID, $news->matricula);
        })->toArray();
    }

    public function create(array $data): NewsEntity
    {
        $news = News::create($data);
        return new NewsEntity($news->notciaID, $news->title, $news->description, $news->views, $news->categoryID, $news->matricula);
    }
}
