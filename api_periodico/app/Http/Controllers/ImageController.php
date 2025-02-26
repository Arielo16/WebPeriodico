<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        return response()->json($images);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'url_imagen' => 'required|string|max:255',
            'noticiaID' => 'required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $image = Image::create($request->all());
        return response()->json(['success' => 'Image created successfully', 'image' => $image], 201);
    }

    public function show($id)
    {
        $image = Image::find($id);

        if (is_null($image)) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        return response()->json($image);
    }

    public function update(Request $request, $id)
    {
        $image = Image::find($id);

        if (is_null($image)) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'sometimes|required|string|max:255',
            'url_imagen' => 'sometimes|required|string|max:255',
            'noticiaID' => 'sometimes|required|integer',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $image->update($request->all());
        return response()->json(['success' => 'Image updated successfully', 'image' => $image]);
    }

    public function destroy($id)
    {
        $image = Image::find($id);

        if (is_null($image)) {
            return response()->json(['error' => 'Image not found'], 404);
        }

        $image->delete();
        return response()->json(['success' => 'Image deleted successfully']);
    }
}
