<?php

namespace App\Core\News\UseCases;

use App\Core\News\Repositories\NewsRepository;

class GetNewsById
{
    protected $newsRepository;

    public function __construct(NewsRepository $newsRepository)
    {
        $this->newsRepository = $newsRepository;
    }

    public function execute($id)
    {
        return $this->newsRepository->findById($id);
    }
}
