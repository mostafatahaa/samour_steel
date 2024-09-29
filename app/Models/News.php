<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class News extends Model
{
    use HasFactory;
    protected $fillable = ['ar_title',  'en_title', 'description', 'image', 'slug', 'views'];

    public function images()
    {
        return $this->hasMany(NewsImages::class, 'news_id', 'id');
    }

    public function descriptions()
    {
        return $this->hasMany(NewsDescription::class, 'news_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($new) {
            $new->slug = Str::slug($new->en_title . '-' . now()->timestamp);
        });

        static::updating(function ($new) {
            $new->slug = Str::slug($new->en_title . '-' . now()->timestamp);
        });

        static::updating(function ($news) {
            if ($news->isDirty('image')) {
                $oldImage = $news->getOriginal('image');

                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });

        static::deleting(function ($news) {
            // Get the image path
            $image = $news->image;

            // Delete the image from storage
            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        });
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
