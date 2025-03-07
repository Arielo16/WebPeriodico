<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Core\News\UseCases\CreateNews;
use App\Core\News\UseCases\GetNewsById;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\News;
use App\Models\Image;
use Cloudinary\Configuration\Configuration;
use Cloudinary\Api\Upload\UploadApi;

class NewsController extends Controller
{
    protected $createNews;
    protected $getNewsById;

    public function __construct(CreateNews $createNews, GetNewsById $getNewsById)
    {
        $this->createNews = $createNews;
        $this->getNewsById = $getNewsById;
        Configuration::instance(getenv('CLOUDINARY_URL'));
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
            'images' => 'array', // Add validation for images
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Ensure each file is an image
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 400);
        }

        DB::beginTransaction();

        try {
            $newsData = $this->createNews->execute(
                $request->notciaID,
                $request->title,
                $request->description,
                $request->views,
                $request->categoryID,
                $request->matricula
            );

            // Convert NewsEntity to array
            $newsArray = $newsData->toArray();

            $news = News::create($newsArray);

            if ($request->has('images')) {
                $imageUrls = [];
                foreach ($request->file('images') as $imageFile) {
                    $uploadedFile = (new UploadApi())->upload($imageFile->getRealPath());
                    $imageUrls[] = $uploadedFile['secure_url'];
                }

                foreach ($imageUrls as $url) {
                    $image = Image::create([
                        'name' => basename($url),
                        'url_imagen' => $url,
                        'noticiaID' => $news->noticiaID,
                    ]);
                    $news->images()->attach($image->imagenID);
                }
            }

            DB::commit();

            return response()->json($news, 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Failed to create news', 'message' => $e->getMessage()], 500);
        }
    }

    public function testRegister()
    {
        return response()->json([
            'notciaID' => 'testID',
            'title' => 'Test Title',
            'description' => 'Test Description',
            'views' => '0',
            'categoryID' => 'testCategoryID',
            'matricula' => 'testMatricula'
        ], 200);
    }

    public function index()
    {
        $news = News::with(['writer:name,matricula', 'images:url_imagen'])->get()->map(function ($item) {
            return [
                'noticiaID' => $item->noticiaID,
                'title' => $item->title,
                'description' => $item->description,
                'views' => $item->views,
                'categoryID' => $item->categoryID,
                'writer_name' => $item->writer->name,
                'images' => $item->images->pluck('url_imagen'), // Include image URLs
                'created_at' => $item->created_at,
                'updated_at' => $item->updated_at,
            ];
        });

        return response()->json($news, 200);
    }

    public function show($id)
    {
        $news = $this->getNewsById->execute($id);
        if ($news) {
            return response()->json($news->toArray(), 200);
        }
        return response()->json(['error' => 'News not found'], 404);
    }
}
