<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;

class Features extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'ar_title',
        'en_title'
    ];

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
