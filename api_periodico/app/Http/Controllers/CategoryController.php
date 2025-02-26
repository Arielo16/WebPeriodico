<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return response()->json($categories);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $category = Category::create($request->all());
        return response()->json(['success' => 'Category created successfully', 'category' => $category], 201);
    }

    public function show($id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        return response()->json($category);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $category->update($request->all());
        return response()->json(['success' => 'Category updated successfully', 'category' => $category]);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (is_null($category)) {
            return response()->json(['error' => 'Category not found'], 404);
        }

        $category->delete();
        return response()->json(['success' => 'Category deleted successfully']);
    }
}




