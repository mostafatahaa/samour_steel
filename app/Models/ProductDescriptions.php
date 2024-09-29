<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductDescriptions extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'image', 'description'];
    protected $table = 'product_descriptions';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        // Handle file deletion when an video record is deleted
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
