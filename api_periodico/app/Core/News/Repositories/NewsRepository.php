<?php

namespace App\Core\News\Repositories;

use App\Models\News;
use App\Core\News\Entities\NewsEntity;

class NewsRepository
{
    public function getAll(): array
    {
        return News::all()->map(function ($news) {
            return new NewsEntity($news->noticiaID, $news->title, $news->description, $news->views, $news->categoryID, $news->matricula);
        })->toArray();
    }

    public function create(array $data): NewsEntity
    {
        $news = News::create($data);
        return new NewsEntity($news->noticiaID, $news->title, $news->description, $news->views, $news->categoryID, $news->matricula);
    }

    public function findById($id): ?NewsEntity
    {
        $news = News::with(['writer:name,matricula', 'images:url_imagen'])->find($id);
        if ($news) {
            return new NewsEntity(
                $news->noticiaID,
                $news->title,
                $news->description,
                $news->views,
                $news->categoryID,
                $news->writer->name,
                $news->images->pluck('url_imagen')->toArray()
            );
        }
        return null;
    }
}
