<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LabelController extends Controller
{
    public function index()
    {
        $labels = Label::all();
        return response()->json($labels);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name_label' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $label = Label::create($request->all());
        return response()->json(['success' => 'Label created successfully', 'label' => $label], 201);
    }

    public function show($id)
    {
        $label = Label::find($id);

        if (is_null($label)) {
            return response()->json(['error' => 'Label not found'], 404);
        }

        return response()->json($label);
    }

    public function update(Request $request, $id)
    {
        $label = Label::find($id);

        if (is_null($label)) {
            return response()->json(['error' => 'Label not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name_label' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $label->update($request->all());
        return response()->json(['success' => 'Label updated successfully', 'label' => $label]);
    }

    public function destroy($id)
    {
        $label = Label::find($id);

        if (is_null($label)) {
            return response()->json(['error' => 'Label not found'], 404);
        }

        $label->delete();
        return response()->json(['success' => 'Label deleted successfully']);
    }
}
