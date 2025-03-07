<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'noticiaID'; // Ensure this is correct
    protected $fillable = ['title', 'description', 'views', 'categoryID', 'matricula'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class, 'matricula', 'matricula');
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'image_news', 'news_id', 'image_id');
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'news_labels', 'noticiaID', 'labelID');
    }
}
