<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use App\Models\ProductVideo;
use App\Models\ProductImage;
use App\Models\Category;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['ar_name', 'en_name', 'slug', 'top_description_text', 'end_description_tex', 'image', 'is_special', 'category_id', 'status'];
    protected $casts = [
        'is_special' => 'boolean',
    ];
    public function images()
    {
        return $this->hasMany(ProductImage::class, 'product_id', 'id');
    }

    public function descriptions()
    {
        return $this->hasMany(ProductDescriptions::class, 'product_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            $product->slug = Str::slug($product->en_name . '-' . now()->timestamp);
        });

        static::updating(function ($product) {
            $product->slug = Str::slug($product->en_name . '-' . now()->timestamp);
        });


        static::updating(function ($product) {
            if ($product->isDirty('image')) {
                $oldImage = $product->getOriginal('image');

                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });

        static::deleting(function ($product) {
            // Get the image path
            $image = $product->image;

            // Delete the image from storage
            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        });
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
