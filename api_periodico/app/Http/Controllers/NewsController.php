<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return response()->json($news);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'views' => 'required|integer',
            'categoryID' => 'required|integer',
            'matricula' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $news = News::create($request->all());
        return response()->json(['success' => 'News created successfully', 'news' => $news], 201);
    }

    public function show($id)
    {
        $news = News::find($id);

        if (is_null($news)) {
            return response()->json(['error' => 'News not found'], 404);
        }

        return response()->json($news);
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);

        if (is_null($news)) {
            return response()->json(['error' => 'News not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'title' => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'views' => 'sometimes|required|integer',
            'categoryID' => 'sometimes|required|integer',
            'matricula' => 'sometimes|required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        if ($request->isDirty()) {
            $news->update($request->all());
            return response()->json(['success' => 'News updated successfully', 'news' => $news]);
        }

        return response()->json(['message' => 'No changes detected'], 200);
    }

    public function destroy($id)
    {
        $news = News::find($id);

        if (is_null($news)) {
            return response()->json(['error' => 'News not found'], 404);
        }

        $news->delete();
        return response()->json(['success' => 'News deleted successfully']);
    }
}
