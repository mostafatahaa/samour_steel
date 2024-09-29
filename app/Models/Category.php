<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['ar_name', 'slug', 'image', 'en_name'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($category) {
            $category->slug = Str::slug($category->en_name . '-' . now()->timestamp);
        });

        static::updating(function ($category) {
            $category->slug = Str::slug($category->en_name . '-' . now()->timestamp);
        });

        static::updating(function ($category) {
            if ($category->isDirty('image')) {
                $oldImage = $category->getOriginal('image');

                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });

        static::deleting(function ($category) {
            $image = $category->image;

            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        });
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function getNameAttribute()
    {
        $locale = App::getLocale();

        if ($locale === 'en' && !empty($this->attributes['en_name'])) {
            return $this->attributes['en_name'];
        } else {
            return $this->attributes['ar_name'];
        }
    }
}
