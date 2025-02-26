<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = 'news';
    protected $primaryKey = 'noticiaID';
    protected $fillable = ['title', 'description', 'views', 'categoryID', 'matricula'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryID');
    }

    public function writer()
    {
        return $this->belongsTo(Writer::class, 'matricula');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'noticiaID');
    }

    public function labels()
    {
        return $this->belongsToMany(Label::class, 'news_labels', 'noticiaID', 'labelID');
    }
}
