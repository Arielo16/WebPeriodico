<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\Writers\UseCases\CreateWriter;
use Illuminate\Support\Facades\Validator;

class WriterController extends Controller
{
    protected $createWriter;

    public function __construct(CreateWriter $createWriter)
    {
        $this->createWriter = $createWriter;
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
}

