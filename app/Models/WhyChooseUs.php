<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseUs extends Model
{
    use HasFactory;

    public $table = 'why_choose_us';

    public $timestamps = false;

    public function descriptions()
    {
        return $this->hasMany(whyChooseUsData::class, 'why_choose_us_id', 'id');
    }
}
