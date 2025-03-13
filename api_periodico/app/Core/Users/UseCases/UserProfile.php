<?php

namespace App\Core\Users\UseCases;

use App\Core\Users\Repositories\UserRepository;
use App\Core\Writers\Repositories\WriterRepository;

class UserProfile
{
    protected $userRepository;
    protected $writerRepository;

    public function __construct(UserRepository $userRepository, WriterRepository $writerRepository)
    {
        $this->userRepository = $userRepository;
        $this->writerRepository = $writerRepository;
    }

    public function execute($userName)
    {
        $user = $this->userRepository->getByName($userName);
        if (!$user) {
            return null;
        }

        $writer = $this->writerRepository->getByUserName($userName);
        return [
            'user_name' => $user->name,
            'writer' => $writer
        ];
    }

    public function getProfileById($userId)
    {
        $user = $this->userRepository->getById($userId);
        if (!$user) {
            return null;
        }

        $writer = $this->writerRepository->getByUserId($userId);
        return [
            'user_name' => $user->name,
            'writer' => $writer
        ];
    }
}
