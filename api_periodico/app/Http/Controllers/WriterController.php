<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Writers\UseCases\CreateWriter;
use App\Core\Writers\Repositories\WriterRepository;
use Illuminate\Support\Facades\Validator;

class WriterController extends Controller
{
    protected $createWriter;
    protected $writerRepository;

    public function __construct(CreateWriter $createWriter, WriterRepository $writerRepository)
    {
        $this->createWriter = $createWriter;
        $this->writerRepository = $writerRepository;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'matricula' => 'required|string',
            'name' => 'required|string',
            'last_name' => 'required|string',
            'secund_last_name' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $writerData = $this->createWriter->execute(
            $request->matricula,
            $request->name,
            $request->last_name,
            $request->secund_last_name
        );

        return response()->json($writerData, 201);
    }

    public function index()
    {
        $writers = $this->writerRepository->getAll();
        return response()->json($writers);
    }
}

