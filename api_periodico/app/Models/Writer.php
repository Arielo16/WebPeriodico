<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Writer extends Model
{
    use HasFactory;

    protected $table = 'writers';
    protected $primaryKey = 'matricula';
    protected $fillable = ['name', 'last_name', 'secund_last_name'];
    public $incrementing = false;
    protected $keyType = 'string';

    public function news()
    {
        return $this->hasMany(News::class, 'matricula');
    }
}
