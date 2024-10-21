<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;
use App\Models\AboutUsMoreDetails;

class AboutUs extends Model
{
    use HasFactory;

    protected $fillable = ['ar_title', 'description'];

    public function images()
    {
        return $this->hasMany(AboutUsData::class, 'about_us_id', 'id');
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
