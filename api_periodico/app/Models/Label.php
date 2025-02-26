<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Label extends Model
{
    use HasFactory;

    protected $table = 'labels';
    protected $primaryKey = 'labelID';
    protected $fillable = ['name_label'];

    public function news()
    {
        return $this->belongsToMany(News::class, 'news_labels', 'labelID', 'noticiaID');
    }
}
