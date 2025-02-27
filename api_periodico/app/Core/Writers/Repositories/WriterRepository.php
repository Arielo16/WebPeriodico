<?php

namespace App\Core\Writers\Repositories;

use App\Models\Writer;
use App\Core\Writers\Entities\WriterEntity;

class WriterRepository 
{
    public function getAll(): array
    {
        return Writer::all()->map(function ($writer) {
            return new WriterEntity($writer->matricula, $writer->name, $writer->last_name, $writer->secund_last_name);
        })->toArray();
    }

    public function create(array $data): WriterEntity
    {
        $writer = Writer::create($data);
        return new WriterEntity($writer->matricula, $writer->name, $writer->last_name, $writer->secund_last_name);
    }
}
