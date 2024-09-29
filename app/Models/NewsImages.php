<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class NewsImages extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'news_description_id'];

    public function description()
    {
        return $this->belongsTo(NewsDescription::class, 'news_description_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        // Handle file deletion when an Image record is deleted
        static::deleting(function ($image) {
            if ($image->image) {
                Storage::disk('public')->delete($image->image);
            }
        });

        // Handle file cleanup on update
        static::updating(function ($image) {
            // This is to manage when an image file is updated
            $original = $image->getOriginal('image');
            if ($original && $original !== $image->image) {
                Storage::disk('public')->delete($original);
            }
        });
    }
}
