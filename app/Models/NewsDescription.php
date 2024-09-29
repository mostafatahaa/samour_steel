<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class NewsDescription extends Model
{
    use HasFactory;
    protected $fillable = ['ar_title', 'en_title', 'description'];


    public function images()
    {
        return $this->hasMany(NewsImages::class, 'news_description_id', 'id');
    }

    public function getTitleAttribute()
    {
        $locale = App::getLocale();

        if ($locale === 'en' && !empty($this->attributes['en_title'])) {
            return $this->attributes['en_title'];
        } else {
            return $this->attributes['ar_title'];
        }
    }
}
