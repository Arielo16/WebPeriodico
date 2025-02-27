<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\News\UseCases\CreateNews;
use Illuminate\Support\Facades\Validator;

class NewsController extends Controller
{
    protected $createNews;

    public function __construct(CreateNews $createNews)
    {
        $this->createNews = $createNews;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'notciaID' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'views' => 'required|string',
            'categoryID' => 'required|string',
            'matricula' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        $newsData = $this->createNews->execute(
            $request->notciaID,
            $request->title,
            $request->description,
            $request->views,
            $request->categoryID,
            $request->matricula
        );

        return response()->json($newsData, 201);
    }
}
