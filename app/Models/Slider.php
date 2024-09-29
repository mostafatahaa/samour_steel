<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Slider extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($record) {
            if ($record->isDirty('images')) {
                $oldImage = $record->getOriginal('images');

                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });

        static::deleting(function ($record) {
            // Get the image path
            $image = $record->images;

            // Delete the image from storage
            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        });
    }
}
