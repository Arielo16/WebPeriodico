<?php

namespace App\Http\Controllers;

use App\Models\NewsLabel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsLabelController extends Controller
{
    public function index()
    {
        $newsLabels = NewsLabel::all();
        return response()->json($newsLabels);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'labelID' => 'required|integer',
            'noticiaID' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $newsLabel = NewsLabel::create($request->all());
        return response()->json(['success' => 'NewsLabel created successfully', 'newsLabel' => $newsLabel], 201);
    }

    public function show($id)
    {
        $newsLabel = NewsLabel::find($id);

        if (is_null($newsLabel)) {
            return response()->json(['error' => 'NewsLabel not found'], 404);
        }

        return response()->json($newsLabel);
    }

    public function update(Request $request, $id)
    {
        $newsLabel = NewsLabel::find($id);

        if (is_null($newsLabel)) {
            return response()->json(['error' => 'NewsLabel not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'labelID' => 'sometimes|required|integer',
            'noticiaID' => 'sometimes|required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if ($request->isDirty()) {
            $newsLabel->update($request->all());
            return response()->json(['success' => 'NewsLabel updated successfully', 'newsLabel' => $newsLabel]);
        }

        return response()->json(['message' => 'No changes detected'], 200);
    }

    public function destroy($id)
    {
        $newsLabel = NewsLabel::find($id);

        if (is_null($newsLabel)) {
            return response()->json(['error' => 'NewsLabel not found'], 404);
        }

        $newsLabel->delete();
        return response()->json(['success' => 'NewsLabel deleted successfully']);
    }
}
