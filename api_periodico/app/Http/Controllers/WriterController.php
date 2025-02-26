<?php

namespace App\Http\Controllers;

use App\Models\Writer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class WriterController extends Controller
{
    public function index()
    {
        $writers = Writer::all();
        return response()->json($writers);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'matricula' => 'required|string|unique:writers',
            'name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'secund_last_name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $writer = Writer::create($request->all());
        return response()->json(['success' => 'Writer created successfully', 'writer' => $writer], 201);
    }

    public function show($id)
    {
        $writer = Writer::find($id);

        if (is_null($writer)) {
            return response()->json(['error' => 'Writer not found'], 404);
        }

        return response()->json($writer);
    }

    public function update(Request $request, $id)
    {
        $writer = Writer::find($id);

        if (is_null($writer)) {
            return response()->json(['error' => 'Writer not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'secund_last_name' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if ($request->isDirty()) {
            $writer->update($request->all());
            return response()->json(['success' => 'Writer updated successfully', 'writer' => $writer]);
        }

        return response()->json(['message' => 'No changes detected'], 200);
    }

    public function destroy($id)
    {
        $writer = Writer::find($id);

        if (is_null($writer)) {
            return response()->json(['error' => 'Writer not found'], 404);
        }

        $writer->delete();
        return response()->json(['success' => 'Writer deleted successfully']);
    }
}
