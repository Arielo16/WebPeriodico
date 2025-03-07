<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $primaryKey = 'imagenID'; // Ensure this is correct
    protected $fillable = ['name', 'url_imagen', 'noticiaID'];

    public function news()
    {
        return $this->belongsToMany(News::class, 'image_news', 'image_id', 'news_id');
    }
}
