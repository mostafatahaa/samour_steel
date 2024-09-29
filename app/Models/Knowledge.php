<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Knowledge extends Model
{
    use HasFactory;

    protected $fillable = ['ar_title', 'en_title', 'image', 'views', 'description', 'slug'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($knowledge) {
            $knowledge->slug = Str::slug($knowledge->en_name . '-' . now()->timestamp);
        });

        static::updating(function ($knowledge) {
            $knowledge->slug = Str::slug($knowledge->en_name . '-' . now()->timestamp);
        });

        static::updating(function ($record) {
            if ($record->isDirty('image')) {
                $oldImage = $record->getOriginal('image');

                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });

        static::deleting(function ($record) {
            $image = $record->image;

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
