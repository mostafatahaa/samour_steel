<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AboutUsMoreDetails extends Model
{
    use HasFactory;

    protected $fillable = ['ar_title', 'description', 'en_title', 'image'];
}
