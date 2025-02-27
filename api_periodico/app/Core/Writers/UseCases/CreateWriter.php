<?php

namespace App\Core\Writers\UseCases;

use App\Core\Writers\Entities\WriterEntity;
use App\Core\Writers\Repositories\WriterRepository;

class CreateWriter
{
    protected $writerRepository;

    public function __construct(WriterRepository $writerRepository)
    {
        $this->writerRepository = $writerRepository;
    }

    public function execute($matricula, $name, $last_name, $secund_last_name)
    {
        $writerEntity = new WriterEntity($matricula, $name, $last_name, $secund_last_name);
        $writerData = [
            'matricula' => $writerEntity->matricula,
            'name' => $writerEntity->name,
            'last_name' => $writerEntity->last_name,
            'secund_last_name' => $writerEntity->secund_last_name,
        ];

        return $this->writerRepository->create($writerData);
    }
}
