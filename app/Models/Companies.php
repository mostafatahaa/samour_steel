<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Companies extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'name'];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($record) {
            if ($record->isDirty('image')) {
                $oldImage = $record->getOriginal('image');

                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });

        static::deleting(function ($record) {
            // Get the image path
            $image = $record->image;

            // Delete the image from storage
            if (Storage::disk('public')->exists($image)) {
                Storage::disk('public')->delete($image);
            }
        });
    }
}
