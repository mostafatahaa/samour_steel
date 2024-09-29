<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Settings extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $casts = [
        'meta_keywords' => 'array',
    ];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($record) {
            if ($record->isDirty('logo')) {
                $oldImage = $record->getOriginal('logo');

                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }
        });

        static::deleting(function ($record) {
            $logo = $record->logo;

            if (Storage::disk('public')->exists($logo)) {
                Storage::disk('public')->delete($logo);
            }
        });
    }
}
