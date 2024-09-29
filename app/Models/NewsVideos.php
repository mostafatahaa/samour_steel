<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class NewsVideos extends Model
{
    use HasFactory;

    protected $fillable = ['video'];

    public function product()
    {
        return $this->belongsTo(News::class, 'news_id', 'id');
    }
}
