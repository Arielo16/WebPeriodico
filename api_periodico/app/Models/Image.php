<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = 'images';
    protected $primaryKey = 'imagenID';
    protected $fillable = ['name', 'url_imagen', 'noticiaID'];

    public function news()
    {
        return $this->belongsTo(News::class, 'noticiaID');
    }
}
