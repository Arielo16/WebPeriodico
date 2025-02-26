<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class NewsLabel extends Pivot
{
    protected $table = 'news_labels';
    public $incrementing = false;
    protected $primaryKey = ['labelID', 'noticiaID'];
    protected $fillable = ['labelID', 'noticiaID'];
}
